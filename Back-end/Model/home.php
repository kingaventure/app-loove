<?php

function getProfil($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM profil WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}