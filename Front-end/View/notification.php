<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Notifications - My App</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e6d3f5;
      margin: 0;
      padding: 0;
      position: relative;
      min-height: 100vh;
    }
    header {
      background-color: #7b4db6;
      color: white;
      padding: 15px;
      text-align: center;
      position: relative;
    }
    .close-btn {
      position: absolute;
      top: 15px;
      left: 15px;
      background: none;
      border: none;
      color: white;
      font-size: 24px;
      cursor: pointer;
    }
    .notifications {
      padding: 20px;
      padding-bottom: 80px; /* espace pour le bouton du bas */
    }
    .notification {
      background: white;
      padding: 15px;
      margin-bottom: 10px;
      border-radius: 10px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .notification time {
      display: block;
      font-size: 14px;
      color: gray;
      margin-bottom: 5px;
    }
    .delete-btn {
      position: fixed;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #7b4db6;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 20px;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>
  <header>
    <button class="close-btn" onclick="alert('Fermer les notifications')">&times;</button>
    <h1>Notifications</h1>
  </header>
  <div class="notifications">
    <div class="notification">
      <time>11:20</time>
      Match !
    </div>
    <div class="notification">
      <time>20:45</time>
      Like
    </div>
  </div>
  <button class="delete-btn" onclick="alert('Notifications supprimées')">Supprimer les notifications</button>
</body>
</html>

