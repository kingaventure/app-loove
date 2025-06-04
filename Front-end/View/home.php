<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CardCrush - Page principale</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/home.css">
  </head>
<body>
<div class="modal-overlay" id="profileModal" <?php if ($showProfileModal) echo 'style="display: block;"'; ?>>
  <div class="modal">
    <h2>Créez votre profil</h2>
    <form class="profile-form" action="index.php?component=home" method="POST" enctype="multipart/form-data">
      <input type="text" name="prenom" placeholder="Prénom" required>
      <input type="text" name="name" placeholder="Nom" required>
      <input type="number" name="age" placeholder="Âge" required min="18" max="120">
      <textarea name="bio" placeholder="Votre bio" required></textarea>
      <select name="sex" required>
        <option value="0">Homme</option>
        <option value="1">Femme</option>
        <option value="2">Autre</option>
      </select>
      <select name="os" required>
        <option value="0">Hétérosexuel</option>
        <option value="1">Homosexuel</option>
        <option value="2">Bisexuel</option>
        <option value="3">Autre</option>
      </select>
      <input type="file" name="profile_image" accept="image/*" required>
      <button type="submit">Créer mon profil</button>
    </form>
  </div>
</div>

  <button class="account-btn">👤 Compte</button>

  <div class="card-container">
  <div class="card">
  <?php if ($noMoreProfiles): ?>
      <div class="info">
          <div class="bio">Plus de profil à liker pour le moment.</div>
      </div>
  <?php elseif ($hasProfile): ?>
    <img src="<?php echo '/app-loove' . $image ?>" alt="Image de profil">
      <div class="info">
          <div>
              <div class="name"><?php echo htmlspecialchars($prenom); ?></div>
              <div class="age"><?php echo htmlspecialchars($age); ?> ans</div>
              <div class="bio"><?php echo htmlspecialchars($bio); ?></div>
          </div>
          <button class="more-info-btn">🔎 Plus d'infos</button>
      </div>
  <?php else: ?>
      <div class="info">
          <div class="bio">Créez votre profil pour commencer</div>
      </div>
  <?php endif; ?>
  </div>

    <div class="swipe-buttons">
      <button class="left-btn">❌</button>
      <button class="right-btn">✔️</button>
    </div>
  </div>

  <script>
    if (document.getElementById('profileModal').style.display === 'block') {
  window.onbeforeunload = function() {
    return "Vous devez d'abord créer votre profil";
  };
}
    document.querySelector('.left-btn').addEventListener('click', () => {
  location.reload();
});

    if (document.querySelector('.more-info-btn')) {
    document.querySelector('.more-info-btn').addEventListener('click', () => {
        alert(`${<?php echo json_encode($prenom); ?>} ${<?php echo json_encode($name); ?>} est un(e) ${<?php echo json_encode($sex); ?>} ${<?php echo json_encode($os); ?>}`);
    });
}

    document.querySelector('.account-btn').addEventListener('click', () => {
      window.location.href = "index.php?component=account"; 
    });
  </script>

  <script>
    document.querySelector('.right-btn').addEventListener('click', function () {
        fetch('Other/like.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id_liker: <?php echo json_encode($profilId); ?>,
                id_liked: <?php echo json_encode($randomId); ?>,
                date: <?php echo json_encode($date); ?>
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
              if (data.match) {
                alert('C\'est un match !');
              } else {
                alert('Vous avez liké ce profil.');
              }
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Erreur fetch:', error);
        });
    });
</script>
  <div class="navbar">
    <a href="/app-loove/index.php?component=movie" class="nav-item">🎬</a>
        <a href="/app-loove/index.php?component=messages" class="nav-item">💬</a>
        <a href="#" class="nav-item">🔔</a>
        <a href="#" class="nav-item">➕</a>
  </div>
</body>
</html>
