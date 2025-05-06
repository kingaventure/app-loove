<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Géo localisation - My App</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e6d3f5;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }
    header {
      background-color: #7b4db6;
      color: white;
      text-align: center;
      padding: 15px;
    }
    .map-container {
      flex: 1;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 20px;
    }
    .map {
      width: 90%;
      height: 60%;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 20px;
    }
    .map-icon {
      font-size: 48px;
      color: #7b4db6;
      margin-bottom: 10px;
    }
    .map p {
      color: #555;
      font-size: 16px;
    }
    .button {
      padding: 12px 24px;
      background-color: #7b4db6;
      color: white;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      cursor: not-allowed;
      opacity: 0.7;
    }
  </style>
</head>
<body>
  <header>
    <h1>Géo localisation</h1>
  </header>
  <div class="map-container">
    <div class="map">
      <div class="map-icon">📍</div>
      <p>Vous êtes nul part.</p>
    </div>
    <button class="button" disabled>Localiser</button>
  </div>
</body>
</html>

