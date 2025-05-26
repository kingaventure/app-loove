<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CardCrush - Page principale</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:rgb(133, 184, 124);
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
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

  .profile-form button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
  }

    .account-btn {
      position: absolute;
      top: 20px;
      left: 20px;
      background-color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
      cursor: pointer;
      font-weight: bold;
      width: 200px;
      height: 100px;
    }

    .card-container {
      width: 380px;
      height: 550px;
      position: relative;
      perspective: 1500px;
    }

    .card {
      width: 100%;
      height: 100%;
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      position: absolute;
      top: 0;
      left: 0;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .card img {
      width: 100%;
      height: 65%;
      object-fit: cover;
    }

    .info {
      padding: 15px;
      text-align: center;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .name {
      font-size: 1.8em;
      font-weight: bold;
    }

    .age {
      color: #777;
      margin-bottom: 10px;
    }

    .bio {
      font-size: 0.95em;
      color: #333;
      margin-bottom: 15px;
    }

    .more-info-btn {
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 12px;
      cursor: pointer;
      font-size: 0.9em;
    }

    .swipe-buttons {
      position: absolute;
      bottom: -50px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      justify-content: space-between;
      width: 80%;
    }

    .swipe-buttons button {
      background-color: #fff;
      border: none;
      border-radius: 50%;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      font-size: 1.2em;
      transition: background-color 0.2s ease;
    }

    .left-btn {
      background-color: #f44336;
      color: #fff;
    }

    .right-btn {
      background-color: #4caf50;
      color: #fff;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color:rgb(124, 109, 146);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
      padding: 20px;
      text-align: center;
    }

    .navbar {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 70px;
      background-color: #7b4db6;
      display: flex;
      justify-content: space-around;
      align-items: center;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-item {
      width: 50px;
      height: 50px;
      background-color: white;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: #7b4db6;
      text-decoration: none;
      transition: transform 0.1s;
    }

    .nav-item:active {
      transform: scale(0.95);
    }
    
  </style>
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
    <?php if ($hasProfile): ?>
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
                alert("Like enregistré !");
            } else {
                alert("Erreur : " + data.message);
            }
        })
        .catch(error => {
            console.error('Erreur fetch:', error);
        });
    });
</script>
  <div class="navbar">
    <a href="/app-loove/index.php?component=movie" class="nav-item">🎬</a>
        <a href="#" class="nav-item">💬</a>
        <a href="#" class="nav-item">🔔</a>
        <a href="#" class="nav-item">➕</a>
  </div>
</body>
</html>
