<?php

function updateUserPremium($pdo, $userId) {
    $stmt = $pdo->prepare("UPDATE user SET prem = 1 WHERE id = :id");
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
}
