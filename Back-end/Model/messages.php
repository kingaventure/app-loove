<?php
function getUserMatches($pdo, $userId) {
    $stmt = $pdo->prepare("
        SELECT p.id, p.prenom, p.name, p.img
        FROM profil p
        INNER JOIN crush c1 ON c1.id_liker = :userId AND c1.id_liked = p.id
        INNER JOIN crush c2 ON c2.id_liker = p.id AND c2.id_liked = :userId
    ");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function sendReport($pdo, $usernam_rep, $mes) {
    $stmt = $pdo->prepare("
        INSERT INTO report (usernam_rep, mes)
        VALUES (:usernam_rep :mes)
    ");
    $stmt->bindParam(':usernam_rep', $reporterId, PDO::PARAM_INT);
    $stmt->bindParam(':mes', $reportedId, PDO::PARAM_INT);
    return $stmt->execute();
}