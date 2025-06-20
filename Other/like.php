<?php
require_once __DIR__ . '/../Back-end/Model/home.php';
require './database.php';

header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

// Vérification détaillée des données
if ($data === null) {
    echo json_encode(['success' => false, 'message' => 'JSON invalide']);
    exit;
}

if (!isset($data['id_liker'])) {
    echo json_encode(['success' => false, 'message' => 'ID du likeur manquant']);
    exit;
}

if (!isset($data['id_liked'])) {
    echo json_encode(['success' => false, 'message' => 'ID du profil liké manquant']);
    exit;
}

if (!isset($data['date'])) {
    echo json_encode(['success' => false, 'message' => 'Date manquante']);
    exit;
}

try {
    $id_liker = intval($data['id_liker']);
    $id_liked = intval($data['id_liked']);
    $date = $data['date'];
    
    // Vérifications supplémentaires
    if ($id_liker <= 0) {
        echo json_encode(['success' => false, 'message' => 'ID du likeur invalide']);
        exit;
    }
    
    if ($id_liked <= 0) {
        echo json_encode(['success' => false, 'message' => 'ID du profil liké invalide']);
        exit;
    }
    
    if ($id_liker === $id_liked) {
        echo json_encode(['success' => false, 'message' => 'Vous ne pouvez pas vous liker vous-même']);
        exit;
    }

    // Vérifier si le like existe déjà
    if (likeExists($pdo, $id_liker, $id_liked)) {
        if (checkmatch($pdo, $id_liker, $id_liked)) {
            echo json_encode(['success' => false, 'message' => 'Match déjà existant']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Profil déjà liké']);
        }
        exit;
    }
    
    // Ajouter le like
    addLike($pdo, $id_liker, $id_liked, $date);
    
    // Vérifier s'il y a un match
    if (checkmatch($pdo, $id_liker, $id_liked)) {
        echo json_encode(['success' => true, 'match' => true]);
    } else {
        echo json_encode(['success' => true, 'match' => false]);
    }
    
} catch (Exception $e) {
    error_log("Erreur dans like.php: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
}