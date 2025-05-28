<?php 
require_once __DIR__ . '/../Model/messages.php'; 
require_once __DIR__ . '/../Model/home.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$profilId = getIdUser($pdo, $_SESSION['user_username']);
$matches = getUserMatches($pdo, $profilId);



require_once __DIR__ . '/../../Front-end/View/messages.php';