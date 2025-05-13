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
      background-image: url("https://via.placeholder.com/120");
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
      background-image: url("https://via.placeholder.com/100");
      background-size: cover;
      background-position: center;
      border-radius: 10px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
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
  </style>
</head>
<body>
<header>
    <a href="/app-loove/index.php" class="header-icon close-icon">×</a>
    <h1>Mon compte</h1>
    <a href="/app-loove/index.php?component=settings" class="header-icon settings-icon">⚙️</a>
  </header>
  <div class="container">
    <div class="profile-pic"></div>
    <div class="bio">
      <p>Ici, une belle bio bien rédigée ✨</p>
    </div>
    <div class="photos">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <button>Modifier</button>
    <div style="margin-top: 10px;">
      <a href="/app-loove/index.php?component=logout">
        <button type="button" style="background-color: #dc3545;">Déconnexion</button>
      </a>
    </div>
  </div>
</body>
</html>
