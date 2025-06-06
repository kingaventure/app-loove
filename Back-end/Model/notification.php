<?php 

function searchNotif($pdo, $id){
        $stmt = $pdo->prepare("SELECT date FROM crush WHERE id_liked = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
};

function getProfilIdByUsername($pdo, $username) {
    $stmt = $pdo->prepare("
        SELECT profil.id 
        FROM profil 
        JOIN user ON profil.user_name = user.username 
        WHERE user.username = :username
    ");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchColumn();
}

