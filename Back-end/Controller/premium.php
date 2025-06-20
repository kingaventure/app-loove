<?php
require_once __DIR__ . '/../Model/premium.php';

if (session_status() === PHP_SESSION_NONE) session_start();

// Traitement si retour de PayPal
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['pay_success']) && $data['pay_success'] === true) {
        updateUserPremium($pdo, $_SESSION['user_id']);
        echo json_encode(['success' => true]);
        exit;
    }
}

require __DIR__ . '/../../Front-end/View/premium.php';
