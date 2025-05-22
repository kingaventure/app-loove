<?php

require __DIR__ . '/../Model/movie.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_username'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Non autorisé']);
    exit;
}

if (isset($_GET['action'])) {
    header('Content-Type: application/json');
    
    switch ($_GET['action']) {
        case 'search':
if (isset($_GET['action']) && $_GET['action'] === 'search' && isset($_GET['query'])) {
    header('Content-Type: application/json');
    try {
        $results = searchMovies($_GET['query']);
        echo json_encode($results);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit;
}
break;
case 'save':
            if (!isset($_POST['movieId']) || !isset($_POST['position'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Données manquantes']);
                exit;
            }
            
            $movieId = intval($_POST['movieId']);
            $position = intval($_POST['position']);
            
            if ($position < 1 || $position > 3) {
                http_response_code(400);
                echo json_encode(['error' => 'Position invalide']);
                exit;
            }
            
            try {
                $result = addMovies($pdo, $_SESSION['user_username'], $movieId, $position);
                echo json_encode($result);
            } catch (Exception $e) {
                error_log("Save movie error: " . $e->getMessage());
                http_response_code(500);
                echo json_encode(['error' => 'Erreur lors de la sauvegarde du film']);
            }
            exit;
            break;
    }
}

require __DIR__ . '/../../Front-end/View/movie.php';