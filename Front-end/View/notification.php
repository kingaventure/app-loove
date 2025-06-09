<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Notifications - My App</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/notification.css">

</head>
<body>
  <header>
     <a href="/app-loove/index.php?component=home">
        <button class="close-btn">&times;</button>
     </a>
    <h1>Notifications</h1>
  </header>

  <div class="notifications">
    <?php if (isset($notifs) && is_array($notifs)): ?>
      <?php foreach ($notifs as $notif): ?>
        <div class="notification">
          <time><?= htmlspecialchars($notif['date'], ENT_QUOTES) ?></time>
          <p>On vous a liké</p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</body>
</html>