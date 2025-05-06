<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CardCrush - Page principale</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:rgb(150, 124, 184);
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
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
  </style>
</head>
<body>
  <button class="account-btn">👤 Compte</button>

  <div class="card-container">
    <div class="card">
      <img src="https://via.placeholder.com/380x300" alt="Image de profil">
      <div class="info">
        <div>
          <div class="name">Michel</div>
          <div class="age">25 ans</div>
          <div class="bio">Passionné par le cinéma, les voyages et la photographie. Toujours prêt pour une nouvelle aventure !</div>
        </div>
        <button class="more-info-btn">🔎 Plus d’infos</button>
      </div>
    </div>

    <div class="swipe-buttons">
      <button class="left-btn">❌</button>
      <button class="right-btn">✔️</button>
    </div>
  </div>

  <script>
    document.querySelector('.left-btn').addEventListener('click', () => {
      alert('Tu as swipé à gauche !');
    });

    document.querySelector('.right-btn').addEventListener('click', () => {
      alert('Tu as swipé à droite !');
    });

    document.querySelector('.more-info-btn').addEventListener('click', () => {
      alert("Michel aime aussi les jeux vidéo rétro et la cuisine italienne 🍝");
    });

    document.querySelector('.account-btn').addEventListener('click', () => {
      alert("Redirection vers ton profil...");
    });
  </script>
</body>
</html>
