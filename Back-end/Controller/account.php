<?php

require __DIR__ . '/../Model/account.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?component=login');
    exit();
}

$image = '';
$prenom = '';
$name = '';
$age = '';
$bio = '';
$sex = '';
$os = '';

    $profil = getProfil($pdo, $_SESSION['user_username']);
    
    if ($profil) {
        $age = $profil['age'];
        $image = $profil['img'];
        $bio = $profil['bio'];
        $name = $profil['name'];
        $prenom = $profil['prenom'];
        if ($profil['sex'] == 0) {
            $sex = 'homme';
        } elseif ($profil['sex'] == 1) {
            $sex = 'femme';
        } else {
            $sex = 'autre';
        }
        if ($profil['os'] == 0) {
            $os = 'hétéro';
        } elseif ($profil['os'] == 1) {
            $os = 'homo';
        } elseif ($profil['os'] == 2) {
            $os = 'bi';
        } else {
            $os = 'autre';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $name = $_POST['name'];
    $age = intval($_POST['age']);
    $bio = $_POST['bio'];
    $sex = intval($_POST['sex']);
    $os = intval($_POST['os']);
    
    $imagePath = null;
    
    if (!empty($_FILES['profile_image']['name'])) {
        $uploadDir = __DIR__ . '/../../uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $imageFile = $_FILES['profile_image'];
        $imageFileName = time() . '_' . basename($imageFile['name']);
        $uploadPath = $uploadDir . $imageFileName;
        
        if (move_uploaded_file($imageFile['tmp_name'], $uploadPath)) {
            $imagePath = '/uploads/' . $imageFileName;
        }
    }
    
    $result = updateProfil(
        $pdo,
        $_SESSION['user_username'],
        $prenom,
        $name,
        $age,
        $bio,
        $sex,
        $os,
        $imagePath
    );
    
    if ($result) {
        header('Location: index.php?component=account');
        exit();
    } else {
        $_SESSION['error'] = "Erreur lors de la mise à jour du profil.";
    }
}

require __DIR__ . '/../../Front-end/View/account.php';