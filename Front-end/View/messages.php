<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Messages - My App</title>
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
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .messages-container {
      padding: 20px;
    }
    .message {
      background: white;
      margin: 10px 0;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
    }
    .message img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }
    .message span {
      font-size: 16px;
    }
    .header-icon {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 24px;
      color: white;
      text-decoration: none;
      cursor: pointer;
    }
    .close-icon {
      left: 20px;
    }
  </style>
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
      <?php endforeach; ?>
    <?php else: ?>
      <p>Pas encore de match.</p>
    <?php endif; ?>
  </div>
</body>
</html>
