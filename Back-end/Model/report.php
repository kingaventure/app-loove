<?php

function getAllReport($pdo){
    $stmt = $pdo->prepare("SELECT * FROM report");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteReport($pdo, $id){
    $stmt = $pdo->prepare("DELETE FROM report WHERE id = ?");
    return $stmt->execute([$id]);
}

function disableUser($pdo, $id){
    $stmt = $pdo->prepare("SELECT user_name FROM profil WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && isset($user['user_name'])) {
        $stmt = $pdo->prepare("UPDATE user SET enabled = 0 WHERE username = ?");
        return $stmt->execute([$user['user_name']]);
    }
    return false;
}