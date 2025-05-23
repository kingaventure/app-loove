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
        sexe = :sex,
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

function getMovieDetails($movieId) {
    try {
        $apiKey = '5d537f1d57876b886b84cc1715fcedc8';
        $baseUrl = 'https://api.themoviedb.org/3';
        $language = 'fr-FR';
        
        $url = "{$baseUrl}/movie/{$movieId}?api_key={$apiKey}&language={$language}";
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        
        if ($response === false) {
            throw new Exception('Erreur cURL: ' . curl_error($ch));
        }
        
        curl_close($ch);
        
        return json_decode($response, true);
    } catch (Exception $e) {
        error_log("Movie details error: " . $e->getMessage());
        return null;
    }
}
function confirmLogout() {
    if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
        session_destroy();
        header('Location: /app-loove/index.php?component=login');
        exit();
    }
}