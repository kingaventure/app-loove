<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Messages - My App</title>
      <link rel="stylesheet" href="/app-loove/Front-end/assets/css/messages.css">
</head>
<body>
  <header>
    <a href="/app-loove/index.php?component=home" class="header-icon close-icon">x</a>
    <h1>Vos Messages</h1>
  </header>
  <div class="messages-container">
    <?php if (!empty($matches)): ?>
      <?php foreach ($matches as $match): ?>
        <a class="message" href="index.php?component=private_message&user=<?php echo $match['id']; ?>">
          <img src="<?php echo '/app-loove' . $match['img']; ?>" alt="img">
          <span><?php echo htmlspecialchars($match['prenom'] . ' ' . $match['name']); ?></span>
        </a>
        <a href="http://localhost/app-loove/index.php?component=profiles&action=report&id=<?= htmlspecialchars($profil['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir report ce profil ?');">
          <button class="delete-btn">Report</button>
        </a>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Pas encore de match.</p>
    <?php endif; ?>
  </div>
</body>
</html>
