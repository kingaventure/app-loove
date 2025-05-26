<?php
require_once __DIR__ . '/../Model/home.php'; 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?component=login');
    exit();
}

$hasProfile = checkUserProfile($pdo, $_SESSION['user_username']);
$showProfileModal = !$hasProfile;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $prenom = $_POST['prenom'];
    $name = $_POST['name'];
    $age = intval($_POST['age']);
    $bio = $_POST['bio'];
    $sex = intval($_POST['sex']);
    $os = intval($_POST['os']);
    
    $uploadDir = __DIR__ . '/../../uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $imageFile = $_FILES['profile_image'];
    $imageFileName = time() . '_' . basename($imageFile['name']);
    $imagePath = $uploadDir . $imageFileName;
    
    if (move_uploaded_file($imageFile['tmp_name'], $imagePath)) {
        $result = addProfil($pdo, 
            $_SESSION['user_username'],
            $prenom,
            $name,
            $age,
            $bio,
            '/uploads/' . $imageFileName,
            $sex,
            $os
        );
        
        if ($result) {
            header('Location: index.php?component=home');
            exit();
        } else {
            $_SESSION['error'] = "Erreur lors de la création du profil.";
            header('Location: index.php?component=home');
            exit();
        }
    } else {
        $_SESSION['error'] = "Erreur lors de l'upload de l'image.";
        header('Location: index.php?component=home');
        exit();
    }
}

$image = $imageFileName;
$prenom = '';
$name = '';
$age = '';
$bio = '';
$sex = '';
$os = '';

if ($hasProfile) {
    $profilId = getIdUser($pdo, $_SESSION['user_username']);
    $date = date('Y-m-d H:i:s');
    $ids_possibles = getAllProfilIdsExceptUser($pdo, $profilId);
    if (!empty($ids_possibles)) {
        $randomId = $ids_possibles[array_rand($ids_possibles)];
        $profil = getProfil($pdo, $randomId);
        if ($profil) {
            $age = $profil['age'];
            $image = $profil['img'];
            $bio = $profil['bio'];
            $name = $profil['name'];
            $prenom = $profil['prenom'];

            $sex = match($profil['sex']) {
                0 => 'homme',
                1 => 'femme',
                default => 'autre'
            };

            $os = match($profil['os']) {
                0 => 'hétéro',
                1 => 'homo',
                2 => 'bi',
                default => 'autre'
            };
        }
    }
}
require_once __DIR__ . '/../../Front-end/View/home.php';