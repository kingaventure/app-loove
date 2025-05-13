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
    .error {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Crée un utilisateur</h1>
    <?php if (!empty($errors)): ?>
      <div class="error">
        <?php foreach ($errors as $error): ?>
          <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <form method="POST" action="">
      <input type="text" name="username" placeholder="Pseudo" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <button type="submit">S'inscrire</button>
    </form>
  </div>
</body>
</html>