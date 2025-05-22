<?php

function searchMovies($searchTerm) {
    try {
        $apiKey = '5d537f1d57876b886b84cc1715fcedc8';
        $baseUrl = 'https://api.themoviedb.org/3';
        $language = 'fr-FR';
        
        $searchTerm = urlencode($searchTerm);
        $url = "{$baseUrl}/search/movie?api_key={$apiKey}&language={$language}&query={$searchTerm}&page=1";
        
        // Initialiser cURL
        $ch = curl_init();
        
        // Configurer les options cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Pour le développement local uniquement
        
        // Exécuter la requête
        $response = curl_exec($ch);
        
        if ($response === false) {
            throw new Exception('Erreur cURL: ' . curl_error($ch));
        }
        
        // Fermer la session cURL
        curl_close($ch);
        
        $data = json_decode($response, true);
        
        if (!$data || !isset($data['results'])) {
            return ['error' => 'Aucun résultat trouvé'];
        }
        
        $movies = array_map(function($movie) {
            return [
                'id' => $movie['id'],
                'title' => $movie['title'],
                'release_date' => isset($movie['release_date']) ? substr($movie['release_date'], 0, 4) : 'N/A',
                'poster_path' => $movie['poster_path'] 
                    ? 'https://image.tmdb.org/t/p/w200' . $movie['poster_path'] 
                    : null,
                'overview' => isset($movie['overview']) ? $movie['overview'] : ''
            ];
        }, $data['results']);
        
        return [
            'success' => true,
            'movies' => array_slice($movies, 0, 10)
        ];
        
    } catch (Exception $e) {
        error_log("Movie search error: " . $e->getMessage());
        return ['error' => 'Une erreur est survenue: ' . $e->getMessage()];
    }
}

function addMovies($pdo, $username, $movieId, $position) {
    try {
        $column = "movie_id_" . $position;
        $sql = "UPDATE profil SET $column = :movie_id WHERE user_name = :username";
        
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            ':movie_id' => $movieId,
            ':username' => $username
        ]);

        if (!$result) {
            throw new PDOException("Échec de la mise à jour");
        }

        if ($stmt->rowCount() === 0) {
            throw new Exception("Aucun profil trouvé pour cet utilisateur");
        }

        return ['success' => true];
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        throw new Exception('Erreur lors de la sauvegarde du film');
    }
}
