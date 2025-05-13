<?php

function getUser($pdo, $username) {
    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

