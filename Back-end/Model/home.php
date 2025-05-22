<?php

function getProfil($pdo, $id) {
    // Changer cette fonction pour utiliser user_name au lieu de id
    $stmt = $pdo->prepare("SELECT * FROM profil WHERE user_name = :username");
    $stmt->bindParam(':username', $id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAllProfil($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM profil");
    $stmt->exectute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addProfil($pdo, $username, $prenom, $name, $age, $bio, $img, $sex, $os) {
    try {
        $sql = "INSERT INTO profil (user_name, prenom, name, age, bio, img, sex, os, movie_id_1, movie_id_2, movie_id_3) 
                VALUES (:username, :prenom, :name, :age, :bio, :img, :sex, :os, 0, 0, 0)";
        
        error_log("SQL Query: " . $sql);
        error_log("Parameters: " . print_r([
            'username' => $username,
            'prenom' => $prenom,
            'name' => $name,
            'age' => $age,
            'bio' => $bio,
            'img' => $img,
            'sex' => $sex,
            'os' => $os
        ], true));
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
        $stmt->bindParam(':img', $img, PDO::PARAM_STR);
        $stmt->bindParam(':sex', $sex, PDO::PARAM_INT);
        $stmt->bindParam(':os', $os, PDO::PARAM_INT);
        
        $result = $stmt->execute();
        
        if (!$result) {
            error_log("SQL Error: " . print_r($stmt->errorInfo(), true));
        }
        
        return $result;
    } catch (PDOException $e) {
        error_log("PDO Error: " . $e->getMessage());
        return false;
    }
}

function checkUserProfile($pdo, $username) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM profil WHERE user_name = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}