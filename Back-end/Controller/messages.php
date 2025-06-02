<?php 
require_once __DIR__ . '/../Model/messages.php'; 
require_once __DIR__ . '/../Model/home.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$profilId = getIdUser($pdo, $_SESSION['user_username']);
$matches = getUserMatches($pdo, $profilId);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report'])) {
    $usernam_rep = $_POST['usernam_rep']; // c'est l'ID du signalé
    $mes = $_POST['mes'];
    sendReport($pdo, $usernam_rep, $mes);
    header('Location: index.php?component=home');
    header('Location: index.php?component=messages');
    exit();
}

require_once __DIR__ . '/../../Front-end/View/messages.php';