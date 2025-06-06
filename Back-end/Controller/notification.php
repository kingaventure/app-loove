<?php

require __DIR__ . '/../Model/notification.php';

$fin = getProfilIdByUsername($pdo, $_SESSION['user_username']);

$notifs = searchNotif($pdo, $fin);

require __DIR__ . '/../../Front-end/View/notification.php';