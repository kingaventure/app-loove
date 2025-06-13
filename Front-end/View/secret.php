<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Confidentialité - My App</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/secret.css">
</head>
<body>
  <header>
    <a href="/app-loove/index.php?component=settings" class="header-icon close-icon">×</a>
    <h1>Confidentialité</h1>
  </header>
  <form method="POST" action="">
  <div class="container">
    <div class="option">
      <span>Compte privé</span>
      <label class="switch">
        <input type="checkbox" name="Acc_priv" <?= !empty($settings['Acc_priv']) ? 'checked' : '' ?>>
        <span class="slider round"></span>
      </label>
    </div>
    <div class="option">
      <span>Photo privé</span>
      <label class="switch">
        <input type="checkbox" name="Pic_priv" <?= !empty($settings['Pic_priv']) ? 'checked' : '' ?>>
        <span class="slider round"></span>
      </label>
    </div>
    <div class="option">
      <span>Vrai Nom</span>
      <label class="switch">
        <input type="checkbox" name="Real_name" <?= !empty($settings['Real_name']) ? 'checked' : '' ?>>
        <span class="slider round"></span>
      </label>
    </div>

    <div style="text-align: center; margin-top: 20px;">
      <button type="submit">Sauvegarder</button>
    </div>
  </div>
</form>
</body>
</html>
