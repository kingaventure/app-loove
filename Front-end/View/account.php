<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mon compte - My App</title>
  <link rel="stylesheet" href="/app-loove/Front-end/assets/css/account.css">
</head>
<body>

  <div class="modal-overlay" id="profileModal">
  <div class="modal">
    <h2>Modifier votre profil</h2>
    <form class="profile-form" action="index.php?component=account" method="POST" enctype="multipart/form-data">
      <input type="text" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" required>
      <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
      <input type="number" name="age" value="<?php echo htmlspecialchars($age); ?>" required min="18" max="120">
      <textarea name="bio" required><?php echo htmlspecialchars($bio); ?></textarea>
      <select name="sex" required>
        <option value="0" <?php echo $sex === 'homme' ? 'selected' : ''; ?>>Homme</option>
        <option value="1" <?php echo $sex === 'femme' ? 'selected' : ''; ?>>Femme</option>
        <option value="2" <?php echo $sex === 'autre' ? 'selected' : ''; ?>>Autre</option>
      </select>
      <select name="os" required>
        <option value="0" <?php echo $os === 'hétéro' ? 'selected' : ''; ?>>Hétérosexuel</option>
        <option value="1" <?php echo $os === 'homo' ? 'selected' : ''; ?>>Homosexuel</option>
        <option value="2" <?php echo $os === 'bi' ? 'selected' : ''; ?>>Bisexuel</option>
        <option value="3" <?php echo $os === 'autre' ? 'selected' : ''; ?>>Autre</option>
      </select>
      <input type="file" name="profile_image" accept="image/*">
      <button type="submit">Sauvegarder</button>
      <button type="button" onclick="closeModal()">Annuler</button>
    </form>
  </div>
</div>

<header>
    <a href="/app-loove/index.php?component=home" class="header-icon close-icon">×</a>
    <h1>Mon compte</h1>
    <a href="/app-loove/index.php?component=settings" class="header-icon settings-icon">⚙️</a>
  </header>
  <div class="container">
    <div class="profile-pic"><img class="img-pof" width="120" src="<?php echo '/app-loove' . $image ?>" alt="Image de profil"></div>
    <div class="bio">
      <p><?php echo $bio ?></p>
    </div>
    <div class="photos">
      <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php if (isset($movieDetails[$i])): ?>
                <img src="<?php echo htmlspecialchars($movieDetails[$i]['poster_path']); ?>" 
                     alt="<?php echo htmlspecialchars($movieDetails[$i]['title']); ?>"
                     title="<?php echo htmlspecialchars($movieDetails[$i]['title']); ?>">
            <?php else: ?>
                <span class="ajouter">X</span>
            <?php endif; ?>
    <?php endfor; ?>
    </div>
    <button onclick="openModal()">Modifier</button>
    <div style="margin-top: 10px;">
      <a href="/app-loove/index.php?component=logout">
        <button type="button" id="logout_btn" style="background-color: #dc3545;">Déconnexion</button>
      </a>
    </div>
  </div>
  <script>
function openModal() {
    document.getElementById('profileModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('profileModal').style.display = 'none';
}

window.onclick = function(event) {
    var modal = document.getElementById('profileModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>
</body>
</html>


