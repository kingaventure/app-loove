<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Notifications - My App</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/notification.css">

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

