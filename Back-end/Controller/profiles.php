<?php
require __DIR__ . '/../Model/profiles.php';

$profils = getAllProfil($pdo);

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    deleteProfil($pdo, $id);
    header('Location: /app-loove/index.php?component=profiles');
    exit;
}


if (isset($_POST['modify_profil'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $os = $_POST['os'];
    $bio = $_POST['bio'];
    $movie_id_1 = $_POST['movie_id_1'];
    $movie_id_2 = $_POST['movie_id_2'];
    $movie_id_3 = $_POST['movie_id_3'];
    modifyProfil($pdo, $id, $username, $age, $name, $prenom, $sexe, $os, $bio, $movie_id_1, $movie_id_2, $movie_id_3);
    header('Location: /app-loove/index.php?component=profiles');
    exit;
}


require __DIR__ . '/../../Front-end/View/profiles.php';