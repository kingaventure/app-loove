<?php

if ($_SESSION['admin'] == 1) {
    if ($_SESSION['authentication'] == false){
    header('Location: /app-loove/index.php?component=login');
    exit; 
    } 
} else {
    if ($_SESSION['authentication'] == true){
    header('Location: /app-loove/index.php?component=home');
    exit; 
    } else {
        header('Location: /app-loove/index.php?component=login');
        exit;
    }
}

require __DIR__ . '/../Model/dashboard.php'; 

require __DIR__ . '/../../Front-end/View/dashboard.php';