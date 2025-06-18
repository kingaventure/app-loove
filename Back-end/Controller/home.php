<?php
require_once __DIR__ . '/../Model/home.php'; 
require_once __DIR__ . '/../Model/movie.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?component=login');
    exit();
}

$hasProfile = checkUserProfile($pdo, $_SESSION['user_username']);
$showProfileModal = !$hasProfile;

if ($hasProfile && !hasThreeMovies($pdo, $_SESSION['user_username'])) {
    header('Location: index.php?component=movie&force=1');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $name = $_POST['name'];
    $age = intval($_POST['age']);
    $bio = $_POST['bio'];
    $sex = intval($_POST['sex']);
    $os = intval($_POST['os']);
    $city = $_POST['city'];
    
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
            $os,
            $city
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

$image = '';
$prenom = '';
$name = '';
$age = '';
$bio = '';
$sex = '';
$os = '';
$city = '';
$noMoreProfiles = false;

if ($hasProfile) {
    $profilId = $_SESSION['user_id'];
    $date = date('Y-m-d H:i:s');

    $ids_possibles = getAllExceptPrivateAccount($pdo);
    if (in_array($profilId, $ids_possibles)) {
        $index = array_search($profilId, $ids_possibles);
        unset($ids_possibles[$index]);
        $ids_possibles = array_values($ids_possibles);
    }
    $ids_possibles = getProfilsFromUserIds($pdo, $ids_possibles);

    if (!empty($ids_possibles)) {
        $matchedId = getMatchingProfilId($pdo, $_SESSION['user_username']);

        if ($matchedId && in_array($matchedId, array_column($ids_possibles, 'id'))) {
            $profil = getProfil($pdo, $matchedId);
        } else {
            $randomId = $ids_possibles[array_rand($ids_possibles)];
            $profil = getProfil($pdo, $randomId);
        }

        $user_id = getIdUser($pdo, $profil['user_name']);
        $settingsId = checkSettings($pdo, $user_id);

        if ($profil) {
            if ($settingsId['Real_name'] != 1) {
                if ($settingsId['Pic_priv'] != 1){
                    $age = $profil['age'];
                    $image = $profil['img'];
                    $bio = $profil['bio'];
                    $name = $profil['name'];
                    $prenom = $profil['prenom'];
                } else {
                    $age = $profil['age'];
                    $image = "/uploads/1750157115_blank-profile-picture-973460_960_720.webp";
                    $bio = $profil['bio'];
                    $name = $profil['name'];
                    $prenom = $profil['prenom'];
                }
            } else {
                if ($settingsId['Pic_priv'] != 1){
                    $age = $profil['age'];
                    $image = $profil['img'];
                    $bio = $profil['bio'];
                    $name = "";
                    $prenom = $profil['user_name'];
                } else {
                    $age = $profil['age'];
                    $image = "/uploads/1750157115_blank-profile-picture-973460_960_720.webp";
                    $bio = $profil['bio'];
                    $name = "";
                    $prenom = $profil['user_name'];
                }
            }

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

            $city = $profil['city'];
        } else {
            $noMoreProfiles = true;
        }
    } else {
        $noMoreProfiles = true;
    }

    $profilId = getUsername($pdo, $profilId);
    $profilId = getIdProfil($pdo, $profilId); 
}

require_once __DIR__ . '/../../Front-end/View/home.php';
