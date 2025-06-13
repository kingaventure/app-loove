<?php

function getSettings($pdo, $id){
    $stmt = $pdo->prepare("SELECT * FROM settings WHERE id_profil = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addSettings($pdo, $id, $Acc, $Pic, $Name){
    try {
        $stmt = $pdo->prepare("INSERT INTO settings (Acc_priv, Pic_priv, Real_name, id_profil) VALUES (:Acc_priv, :Pic_priv, :Real_name, :id_profil)");
        $stmt->bindParam(':Acc_priv', $Acc, PDO::PARAM_INT);
        $stmt->bindParam(':Pic_priv', $Pic, PDO::PARAM_INT);
        $stmt->bindParam(':Real_name', $Name, PDO::PARAM_INT);
        $stmt->bindParam(':id_profil', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}
function settingsExist($pdo, $id) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM settings WHERE id_profil = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}
function updateSettings($pdo, $id, $Acc, $Pic, $Name){
    $stmt = $pdo->prepare("UPDATE settings SET Acc_priv = :acc, Pic_priv = :pic, Real_name = :real WHERE id_profil = :id");
    $stmt->bindParam(':acc', $Acc, PDO::PARAM_INT);
    $stmt->bindParam(':pic', $Pic, PDO::PARAM_INT);
    $stmt->bindParam(':real', $Name, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}


