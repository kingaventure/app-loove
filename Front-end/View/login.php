<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion - My App</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e6d3f5;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
      align-items: center;
      justify-content: center;
    }
    .container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    input {
      display: block;
      margin: 10px auto;
      padding: 10px;
      width: 200px;
    }
    button {
      padding: 10px 20px;
      background: #7b4db6;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #5c3790;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>My app</h1>
    <input type="text" placeholder="Pseudo">
    <input type="password" placeholder="Mot de passe">
    <button>Se connecter</button>
  </div>
</body>
</html>
