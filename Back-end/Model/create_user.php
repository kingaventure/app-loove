<?php


function addUser($pdo, $username, $password) {
    try {
        $pdo->beginTransaction();

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO user (username, password, prem, enabled, admin)
            VALUES (:username, :password, 0, 1, 0)
        ");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();

        $id_user = $pdo->lastInsertId();

        $stmt = $pdo->prepare("
            INSERT INTO settings (id_profil, Acc_priv, Pic_priv, Real_name)
            VALUES (:id_profil, 0, 0, 0)
        ");
        $stmt->bindParam(':id_profil', $id_user, PDO::PARAM_INT);
        $stmt->execute();

        $pdo->commit();
        return true;

    } catch (PDOException $e) {
        error_log("PDO Error in addUser: " . $e->getMessage());
        $pdo->rollBack();
        return false;
    }
}

function isUsernameTaken($pdo, $username) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}