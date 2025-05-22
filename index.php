<?php
session_start();
require './Other/database.php';
require './Other/errors.php';
require './Other/function.php';

$errors = [];

if (isset($_GET['logout']) && $_GET['logout']) {
    session_destroy();
    header("Location: index.php");
    exit();
}



if (isset($_GET['component'])) {
    $componentName = cleanString($_GET['component']);
    if (file_exists("Back-end/Controller/$componentName.php")) {
        require "./Back-end/Controller/$componentName.php";
        exit();
    } else {
        $errors[] = "Composant introuvable.";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet de julien</title>
</head>
<body data-bs-theme="dark">
    <?php 
        foreach ($errors as $error): 
    ?>
        <li><?php echo htmlspecialchars($error); ?></li>
    <?php endforeach; ?>
</body>
</html>