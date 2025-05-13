<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Navbar - My App</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #e6d3f5;
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
  <div class="navbar">
    <a href="#" class="nav-item">🎬</a>
    <a href="#" class="nav-item">💬</a>
    <a href="#" class="nav-item">🔔</a>
    <a href="#" class="nav-item">➕</a>
  </div>
</body>
</html>
