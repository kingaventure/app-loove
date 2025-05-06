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
      background: #7b4db6;
      color: white;
      padding: 10px;
      text-align: center;
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
  </style>
</head>
<body>
  <header>
    <h1>Vos Messages</h1>
  </header>
  <div class="messages-container">
    <div class="message">
      <img src="https://via.placeholder.com/40" alt="User 1">
      <span>User 1</span>
    </div>
    <div class="message">
      <img src="https://via.placeholder.com/40" alt="User 2">
      <span>User 2</span>
    </div>
  </div>
</body>
</html>
