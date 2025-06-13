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

function disableUser($pdo, $reportId){
    $stmt = $pdo->prepare("SELECT usernam_rep FROM report WHERE id = ?");
    $stmt->execute([$reportId]);
    $report = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$report || !isset($report['usernam_rep'])) {
        return false;
    }

    $profilId = $report['usernam_rep'];

    $stmt = $pdo->prepare("SELECT user_name FROM profil WHERE id = ?");
    $stmt->execute([$profilId]);
    $profil = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$profil || !isset($profil['user_name'])) {
        return false;
    }

    $username = $profil['user_name'];
    
    $stmt = $pdo->prepare("UPDATE user SET enabled = 0 WHERE username = ?");
    return $stmt->execute([$username]);
}