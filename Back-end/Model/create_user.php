<?php


function addUser($pdo, $username, $password) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare("INSERT INTO user (username, password, prem, enabled, admin) VALUES (:username, :password, 0, 1, 0)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}
function isUsernameTaken($pdo, $username) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}