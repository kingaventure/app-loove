<?php

function getAllProfil($pdo){
    $stmt = $pdo->prepare("SELECT * FROM profil");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteProfil($pdo, $id){
    $stmt = $pdo->prepare("DELETE FROM profil WHERE id = ?");
    return $stmt->execute([$id]);
}

function modifyProfil($pdo, $id, $username, $age, $name, $prenom, $sexe, $os, $bio, $movie_id_1, $movie_id_2, $movie_id_3){
    $stmt = $pdo->prepare("UPDATE profil SET user_name = :username, age = :age, name = :name, prenom = :prenom, sexe = :sexe, os = :os, bio = :bio, movie_id_1 = :movie_id_1, movie_id_2 = :movie_id_2, movie_id_3 = :movie_id_3 WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindParam(':sexe', $sexe, PDO::PARAM_STR);
    $stmt->bindParam(':os', $os, PDO::PARAM_STR);
    $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
    $stmt->bindParam(':movie_id_1', $movie_id_1, PDO::PARAM_INT);
    $stmt->bindParam(':movie_id_2', $movie_id_2, PDO::PARAM_INT);
    $stmt->bindParam(':movie_id_3', $movie_id_3, PDO::PARAM_INT);
    try {
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}