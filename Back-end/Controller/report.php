<?php

require __DIR__ . '/../Model/report.php';

$reports = getAllReport($pdo);

if (isset($_GET['action']) && $_GET['action'] === 'real' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    deleteReport($pdo, $id);
    header('Location: /app-loove/index.php?component=report');
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'ban' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    disableUser($pdo, $id);
    deleteReport($pdo, $id);
    header('Location: /app-loove/index.php?component=report');
    exit;
}

require __DIR__ . '/../../Front-end/View/report.php';