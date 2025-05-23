<?php

function getAllUsers($pdo){
    $stmt = $pdo->prepare("SELECT * FROM user");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteUser($pdo, $id){
    $stmt = $pdo->prepare("DELETE FROM user WHERE id = ?");
    return $stmt->execute([$id]);
}
function addUser($pdo, $username, $password, $enabled, $prem, $admin) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare("INSERT INTO user (username, password, enabled, prem, admin) VALUES (:username, :password, :enabled, :prem, :admin)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':prem', $prem, PDO::PARAM_INT);
        $stmt->bindParam(':enabled', $enabled, PDO::PARAM_INT);
        $stmt->bindParam(':admin', $admin, PDO::PARAM_INT);
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
function modifyUser($pdo, $id, $username, $enabled, $prem, $admin) {
    try {
        $stmt = $pdo->prepare("UPDATE user SET username = :username, enabled = :enabled, prem = :prem, admin = :admin WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':enabled', $enabled, PDO::PARAM_INT);
        $stmt->bindParam(':prem', $prem, PDO::PARAM_INT);
        $stmt->bindParam(':admin', $admin, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}