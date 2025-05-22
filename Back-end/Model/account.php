<?php

function getProfil($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM profil WHERE user_name = :username");
    $stmt->bindParam(':username', $id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateProfil($pdo, $username, $prenom, $name, $age, $bio, $sex, $os, $image = null) {
    $query = "UPDATE profil SET 
        prenom = :prenom,
        name = :name,
        age = :age,
        bio = :bio,
        sex = :sex,
        os = :os";
    
    if ($image !== null) {
        $query .= ", img = :image";
    }
    
    $query .= " WHERE user_name = :username";
    
    $stmt = $pdo->prepare($query);
    
    $params = [
        ':username' => $username,
        ':prenom' => $prenom,
        ':name' => $name,
        ':age' => $age,
        ':bio' => $bio,
        ':sex' => $sex,
        ':os' => $os
    ];
    
    if ($image !== null) {
        $params[':image'] = $image;
    }
    
    return $stmt->execute($params);
}