<?php

function getProfil($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM profil WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAllProfil($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM profil");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addProfil($pdo, $username, $prenom, $name, $age, $bio, $img, $sex, $os, $city) {
    try {
        $sql = "INSERT INTO profil (user_name, prenom, name, age, bio, img, sexe, os, movie_id_1, movie_id_2, movie_id_3, city) 
                VALUES (:username, :prenom, :name, :age, :bio, :img, :sex, :os, 0, 0, 0, :city)";
        
        error_log("SQL Query: " . $sql);
        error_log("Parameters: " . print_r([
            'username' => $username,
            'prenom' => $prenom,
            'name' => $name,
            'age' => $age,
            'bio' => $bio,
            'img' => $img,
            'sex' => $sex,
            'os' => $os,
            'city' => $city 
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
        $stmt->bindParam(':city', $city, PDO::PARAM_INT);
        
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

function addLike($pdo, $id_liker, $id_liked, $date) {
    $stmt = $pdo->prepare("INSERT INTO crush (id_liker, id_liked, date) VALUES (:id_liker, :id_liked, :date)");
    $stmt->bindParam(':id_liker', $id_liker, PDO::PARAM_INT);
    $stmt->bindParam(':id_liked', $id_liked, PDO::PARAM_INT);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->execute();
}

function checkmatch($pdo, $id_liker, $id_liked) {
    $stmt = $pdo->prepare(
        "SELECT COUNT(*) FROM crush 
         WHERE (id_liker = :id_liker AND id_liked = :id_liked)
            OR (id_liker = :id_liked AND id_liked = :id_liker)"
    );
    $stmt->bindParam(':id_liker', $id_liker, PDO::PARAM_INT);
    $stmt->bindParam(':id_liked', $id_liked, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() == 2;
}
function getAllProfilIdsExceptUser($pdo, $userId) {
    $stmt = $pdo->prepare("
        SELECT id FROM profil 
        WHERE id != :userId
        AND id NOT IN (
            SELECT id_liked FROM crush WHERE id_liker = :userId
        )
    ");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}
function getIdUser($pdo, $username) {
    $stmt = $pdo->prepare("SELECT id FROM profil WHERE user_name = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() === 0) {
        return null;
    }
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id'] ?? null;
}
function likeExists($pdo, $id_liker, $id_liked) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM crush WHERE id_liker = :id_liker AND id_liked = :id_liked");
    $stmt->bindParam(':id_liker', $id_liker, PDO::PARAM_INT);
    $stmt->bindParam(':id_liked', $id_liked, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}
function hasThreeMovies($pdo, $username) {
    $stmt = $pdo->prepare("SELECT movie_id_1, movie_id_2, movie_id_3 FROM profil WHERE user_name = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) return false;
    return !empty($row['movie_id_1']) && !empty($row['movie_id_2']) && !empty($row['movie_id_3']);
}