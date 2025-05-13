<?php

require __DIR__ . '/../Model/create_user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $errors = [];

    if (empty($username) || empty($password)) {
        $errors[] = "Veuillez remplir tous les champs.";
    } else {
        if (isUsernameTaken($pdo, $username)) {
            $errors[] = "Le pseudo est déjà pris.";
        } else {
            if (addUser($pdo, $username, $password)) {
                header("Location: index.php?component=login");
                exit();
            } else {
                $errors[] = "Une erreur est survenue lors de la création de l'utilisateur.";
            }
        }
    }
}


require __DIR__ . '/../../Front-end/View/create_user.php';