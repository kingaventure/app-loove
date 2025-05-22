<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mon compte - My App</title>
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

    .settings-icon {
      right: 20px;
    }
    .container {
      padding: 30px 20px;
      max-width: 600px;
      margin: auto;
      text-align: center;
    }
    .profile-pic {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background-color: white;
      background-size: cover;
      background-position: center;
      margin: 0 auto 20px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .bio {
      background: white;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .photos {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin-bottom: 20px;
    }
    .photos div {
      background-color: white;
      width: 100%;
      padding-top: 100%;
      background-size: cover;
      background-position: center;
      border-radius: 10px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .img-pof {
      border-radius: 50%
    }
    button {
      padding: 10px 20px;
      background-color: #7b4db6;
      color: white;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: #5c3790;
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
    width: 80%;
    max-width: 500px;
    z-index: 1001;
}

.profile-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.profile-form input,
.profile-form select,
.profile-form textarea {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
}
    

  </style>
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
      <div></div>
      <div></div>
      <div></div>
    </div>
    <button onclick="openModal()">Modifier</button>
    <div style="margin-top: 10px;">
      <a href="/app-loove/index.php?component=logout">
        <button type="button" style="background-color: #dc3545;">Déconnexion</button>
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

// Ferme la modal si on clique en dehors
window.onclick = function(event) {
    var modal = document.getElementById('profileModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>
</body>
</html>


