<?php

function getProfil($pdo, $id) {
    $stmt = $pdo->prepare("SELECT *, sexe AS sex FROM profil WHERE id = :id");
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
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':os', $os);
        $stmt->bindParam(':city', $city);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("PDO Error: " . $e->getMessage());
        return false;
    }
}

function checkUserProfile($pdo, $username) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM profil WHERE user_name = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function addLike($pdo, $id_liker, $id_liked, $date) {
    $stmt = $pdo->prepare("INSERT INTO crush (id_liker, id_liked, date) VALUES (:id_liker, :id_liked, :date)");
    $stmt->bindParam(':id_liker', $id_liker);
    $stmt->bindParam(':id_liked', $id_liked);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
}

function checkmatch($pdo, $id_liker, $id_liked) {
    $stmt = $pdo->prepare(
        "SELECT COUNT(*) FROM crush 
         WHERE (id_liker = :id_liker AND id_liked = :id_liked)
            OR (id_liker = :id_liked AND id_liked = :id_liker)"
    );
    $stmt->bindParam(':id_liker', $id_liker);
    $stmt->bindParam(':id_liked', $id_liked);
    $stmt->execute();
    return $stmt->fetchColumn() == 2;
}

function getAllExceptPrivateAccount($pdo){
    $stmt = $pdo->prepare("
        SELECT u.id
        FROM user u
        JOIN settings s ON u.id = s.id_profil
        WHERE s.Acc_priv = 0;
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function getIdUser($pdo, $username) {
    $stmt = $pdo->prepare("SELECT id FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id'] ?? null;
}

function getUsername($pdo, $id) {
    $stmt = $pdo->prepare("SELECT username FROM user WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['username'] ?? null;
}

function getIdProfil($pdo, $username) {
    $stmt = $pdo->prepare("SELECT id FROM profil WHERE user_name = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id'] ?? null;
}

function likeExists($pdo, $id_liker, $id_liked) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM crush WHERE id_liker = :id_liker AND id_liked = :id_liked");
    $stmt->bindParam(':id_liker', $id_liker);
    $stmt->bindParam(':id_liked', $id_liked);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function hasThreeMovies($pdo, $username) {
    $stmt = $pdo->prepare("SELECT movie_id_1, movie_id_2, movie_id_3 FROM profil WHERE user_name = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return !empty($row['movie_id_1']) && !empty($row['movie_id_2']) && !empty($row['movie_id_3']);
}

function checkSettings($pdo, $id){
    $stmt = $pdo->prepare("SELECT Acc_priv, Pic_priv, Real_name FROM settings WHERE id_profil = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getProfilsFromUserIds($pdo, $userIds) {
    if (empty($userIds)) return [];

    $placeholders = implode(', ', array_map(fn($i) => ":id$i", array_keys($userIds)));
    $sql = "
        SELECT p.id AS id_profil
        FROM user u
        JOIN profil p ON p.user_name = u.username
        WHERE u.id IN ($placeholders)
    ";

    $stmt = $pdo->prepare($sql);
    foreach ($userIds as $index => $id) {
        $stmt->bindValue(":id$index", $id);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function getGenresFromTMDB($movieId, $pdo) {
    $stmt = $pdo->prepare("SELECT genres FROM film_genres WHERE movie_id = :id");
    $stmt->execute([':id' => $movieId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) return json_decode($result['genres'], true);

    $details = getMovieDetails($movieId);
    if (!$details || !isset($details['genres'])) return [];

    $genres = array_map(fn($g) => $g['name'], $details['genres']);

    $stmt = $pdo->prepare("INSERT INTO film_genres (movie_id, genres) VALUES (:id, :genres)");
    $stmt->execute([
        ':id' => $movieId,
        ':genres' => json_encode($genres)
    ]);

    return $genres;
}

function getMatchingProfilId(PDO $pdo, string $currentUsername): ?int {
    $currentProfile = getProfile($pdo, $currentUsername);
    if (!$currentProfile) return null;

    $userGenres = [];
    foreach (['movie_id_1', 'movie_id_2', 'movie_id_3'] as $col) {
        if (!empty($currentProfile[$col])) {
            $userGenres = array_merge($userGenres, getGenresFromTMDB($currentProfile[$col], $pdo));
        }
    }
    $userGenres = array_unique($userGenres);

    $stmt = $pdo->prepare("SELECT * FROM profil WHERE user_name != :username");
    $stmt->execute([':username' => $currentUsername]);
    $allProfils = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $scores = [];
    foreach ($allProfils as $profil) {
        if (!isSexualOrientationCompatible($currentProfile['sexe'], $currentProfile['os'], $profil['sexe'], $profil['os'])) {
            continue;
        }

        $genres = [];
        foreach (['movie_id_1', 'movie_id_2', 'movie_id_3'] as $col) {
            if (!empty($profil[$col])) {
                $genres = array_merge($genres, getGenresFromTMDB($profil[$col], $pdo));
            }
        }

        $genres = array_unique($genres);
        $common = array_intersect($userGenres, $genres);
        $score = count($common);

        if ($score > 0) {
            $scores[$profil['id']] = $score;
        }
    }

    if (empty($scores)) return null;
    arsort($scores);
    $topIds = array_keys($scores);
    return $topIds[array_rand($topIds)];
}

function isSexualOrientationCompatible($userSex, $userOs, $targetSex, $targetOs): bool {
    if ($userOs == 0 && $targetOs == 0) return $userSex != $targetSex;
    if ($userOs == 1 && $targetOs == 1) return $userSex == $targetSex;
    if ($userOs == 2 || $targetOs == 2) return true;
    return false;
}
