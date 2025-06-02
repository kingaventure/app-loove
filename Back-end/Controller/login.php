<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../Model/login.php'; 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if (empty($username) || empty($password)) {
        $errors[] = "Veuillez remplir tous les champs.";
    } else {
        try {
            $user = getUser($pdo, $username);
            if ($user && password_verify($password, $user['password']) && $user['enabled'] && $user['admin'] == '0') {
                $_SESSION['authentication'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_username'] = $user['username'];
                header("Location: index.php?component=home");
                exit();
            } elseif ($user && password_verify($password, $user['password']) && $user['enabled'] && $user['admin'] == '1') {
                $_SESSION['authentication'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['admin'] = 1;
                $_SESSION['user_username'] = $user['username'];
                header("Location: index.php?component=dashboard");
                exit();
            } 
            else {
                $errors[] = "Identifiants incorrects ou compte désactivé.";
            }
        } catch (Exception $e) {
            $errors[] = "Une erreur est survenue lors de la connexion. Veuillez réessayer.";
        }
    }
}

require_once __DIR__ . '/../../Front-end/View/login.php';