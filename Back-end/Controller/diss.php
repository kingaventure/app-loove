<?php

require __DIR__ . '/../Model/diss.php';

$messages = getAllMessages($pdo);

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    deleteMessages($pdo, $id);
    header('Location: /app-loove/index.php?component=diss');
    exit;
}

require __DIR__ . '/../../Front-end/View/diss.php';