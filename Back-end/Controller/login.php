<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../Model/login.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';


    $user = getUser($pdo, $username);

    if ($user && password_verify($password, $user['password']) && $user['enabled']) {
        // Authentification réussie
        $_SESSION['authentication'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_username'] = $user['username'];
        header("Location: index.php?component=home");
        exit();
    } else {
        $errors[] = "Identifiants incorrects ou compte désactivé.";
    }
}

require_once __DIR__ . '/../../Front-end/View/login.php';