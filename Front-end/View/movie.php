<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Vos films - My App</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/movie.css">

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

