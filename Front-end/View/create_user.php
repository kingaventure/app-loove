<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion - My App</title>
  <link rel="stylesheet" href="/app-loove/Front-end/assets/css/create_user.css">
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