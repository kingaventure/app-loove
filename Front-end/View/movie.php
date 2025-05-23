<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Vos films - My App</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e6d3f5;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #7b4db6;
      color: white;
      text-align: center;
      padding: 15px;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .films-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 20px;
      gap: 20px;
      max-width: 700px;
      margin: 0 auto;
    }
    .film, .ajouter {
      width: 160px;
      height: 240px;
      border-radius: 10px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: white;
      cursor: pointer;
    }
    .film img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .ajouter {
      background-color: #c9a4e4;
      font-size: 48px;
      font-weight: bold;
      color: white;
    }
    .header-icon {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 24px;
      color: white;
      text-decoration: none;
      cursor: pointer;
    }
    .close-icon {
      left: 20px;
    }
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        z-index: 1001;
    }

    .search-container {
        width: 100%;
        margin-bottom: 20px;
    }

    .search-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .search-results {
        max-height: 400px;
        overflow-y: auto;
    }

    .search-result-item {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
    }

    .search-result-item:hover {
        background-color: #f5f5f5;
    }
  </style>
</head>
<body>
    <div class="modal-overlay" id="movieModal">
        <div class="modal">
            <h2>Rechercher un film</h2>
            <div class="search-container">
                <input type="text" class="search-input" id="movieSearch" placeholder="Entrez le titre d'un film...">
            </div>
            <div class="search-results" id="searchResults"></div>
            <button onclick="movieManager.closeModal()" style="margin-top: 15px;">Fermer</button>
        </div>
    </div>

    <header>
        <a href="/app-loove/index.php?component=home" class="header-icon close-icon">×</a>
        <h1>Vos films</h1>
    </header>

    <div class="films-container">
    <?php for ($i = 1; $i <= 3; $i++): ?>
        <div class="film" onclick="movieManager.openModal(<?php echo $i; ?>)">
            <?php if (isset($movieDetails[$i])): ?>
                <img src="<?php echo htmlspecialchars($movieDetails[$i]['poster_path']); ?>" 
                     alt="<?php echo htmlspecialchars($movieDetails[$i]['title']); ?>"
                     title="<?php echo htmlspecialchars($movieDetails[$i]['title']); ?>">
            <?php else: ?>
                <span class="ajouter">+</span>
            <?php endif; ?>
        </div>
    <?php endfor; ?>
</div>

    <script src="/app-loove/Front-end/assets/js/MovieManager.js"></script>
    <script>
        const movieManager = new MovieManager();
    </script>
</body>
</html>

