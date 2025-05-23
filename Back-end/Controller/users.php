<?php
require __DIR__ . '/../Model/users.php';

$users = getAllUsers($pdo);

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    deleteUser($pdo, $id);
    header('Location: /app-loove/index.php?component=users');
    exit;
}


if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $prem = $_POST['prem'];
    $enabled = $_POST['enabled'];
    $admin = $_POST['admin'];

    if (!isUsernameTaken($pdo, $username)) {
        addUser($pdo, $username, $password, $enabled, $prem, $admin);
        header('Location: /app-loove/index.php?component=users');
        exit;
    } else {
        echo "Le nom d'utilisateur est déjà pris.";
    }
}

if (isset($_POST['modify_user'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $enabled = $_POST['enabled'];
    $prem = $_POST['prem'];
    $admin = $_POST['admin'];

    modifyUser($pdo, $id, $username, $enabled, $prem, $admin);
    header('Location: /app-loove/index.php?component=users');
    exit;
}


require __DIR__ . '/../../Front-end/View/users.php';