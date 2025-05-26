<?php
require_once __DIR__ . '/../Back-end/Model/home.php';
require './database.php';

header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['id_liker'], $data['id_liked'], $data['date'])) {
        echo json_encode(['success' => false, 'message' => 'Données manquantes']);
        exit;
    }

    try {
        $id_liker = intval($data['id_liker']);
        $id_liked = intval($data['id_liked']);
        $date = $data['date'];
if (!likeExists($pdo, $id_liker, $id_liked)) {
    addLike($pdo, $id_liker, $id_liked, $date);
} else if(checkmatch($pdo, $id_liker, $id_liked)){
    echo json_encode(['success' => false, 'message' => 'Match trouvé']);
    exit;

} else{
    echo json_encode(['success' => false, 'message' => 'Déjà liké']);
    exit;
}

        echo json_encode(['success' => true]);
        exit;
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}
