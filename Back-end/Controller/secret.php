<?php


require __DIR__ . '/../Model/secret.php';

session_start();
$id_profil = $_SESSION['user_id'];
$settings = getSettings($pdo, $id_profil);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acc = isset($_POST['Acc_priv']) ? 1 : 0;
    $pic = isset($_POST['Pic_priv']) ? 1 : 0;
    $name = isset($_POST['Real_name']) ? 1 : 0;

    if (settingsExist($pdo, $id_profil)) {
        updateSettings($pdo, $id_profil, $acc, $pic, $name);
        $settings = getSettings($pdo, $id_profil);
    } else {
        addSettings($pdo, $id_profil, $acc, $pic, $name);
        $settings = getSettings($pdo, $id_profil);
    }
}


require __DIR__ . '/../../Front-end/View/secret.php';
