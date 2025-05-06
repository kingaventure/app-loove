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
  </style>
</head>
<body>
  <header>
    <h1>Vos films</h1>
  </header>
  <div class="films-container">
    <div class="film"><img src="https://via.placeholder.com/160x240" alt="film 1"></div>
    <div class="film"><img src="https://via.placeholder.com/160x240" alt="film 2"></div>
    <div class="film"><img src="https://via.placeholder.com/160x240" alt="film 3"></div>
    <div class="film"><img src="https://via.placeholder.com/160x240" alt="film 4"></div>
    <div class="ajouter">+</div>
  </div>
</body>
</html>

