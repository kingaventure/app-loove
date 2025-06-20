<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Messages - My App</title>
  <link rel="stylesheet" href="/app-loove/Front-end/assets/css/messages.css">
  <script>
    function openSendReportModal(userId) {
      document.getElementById('sendReportModal').style.display = 'block';
      document.getElementById('usernam_rep_input').value = userId;
    }
    function closeSendReportModal() {
      document.getElementById('sendReportModal').style.display = 'none';
    }
  </script>
  <style>
    .modal-overlay { display: none;}
    .modal-overlay[style*="block"] { display: flex; }
  </style>
</head>
<body>
  <header>
    <a href="/app-loove/index.php?component=home" class="header-icon close-icon">x</a>
    <h1>Vos Messages</h1>
  </header>

  <div class="modal-overlay" id="sendReportModal">
    <div class="modal">
      <button class="close-modal" onclick="closeSendReportModal()" title="Fermer">&times;</button>
      <h2>Signaler un profil</h2>
      <form method="POST" action="">
        <input type="hidden" name="report" value="1" />
        <input type="hidden" name="usernam_rep" id="usernam_rep_input" value="" />
        <textarea name="mes" placeholder="Raison du signalement" required></textarea>
        <button type="submit">Envoyer</button>
        <button type="button" onclick="closeSendReportModal()">Annuler</button>
      </form>
    </div>
  </div>

  <div class="messages-container">
    <?php if (!empty($matches)): ?>
      <?php foreach ($matches as $match): ?>
        <a class="message" href="index.php?component=private_message&user=<?php echo $match['id']; ?>">
          <img src="<?php echo '/app-loove' . $match['img']; ?>" alt="img">
          <span><?php echo htmlspecialchars($match['prenom'] . ' ' . $match['name']); ?></span>
        </a>
        <button class="report-btn" onclick="openSendReportModal('<?php echo $match['id']; ?>')">Report</button>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Pas encore de match.</p>
    <?php endif; ?>
  </div>
  <style>
  .modal-overlay {
    display: none;
    position: fixed;
    z-index: 1000;
    inset: 0;
    background: rgba(0,0,0,0.55);
    justify-content: center;
    align-items: center;
    transition: background 0.3s;
  }
  .modal-overlay[style*="block"] {
    display: flex;
    animation: fadeIn 0.3s;
  }
  @keyframes fadeIn {
    from { opacity: 0; }
    to   { opacity: 1; }
  }
  .modal {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    padding: 2rem 2.5rem 1.5rem 2.5rem;
    min-width: 320px;
    max-width: 90vw;
    position: relative;
    animation: modalPop 0.25s;
  }
  @keyframes modalPop {
    from { transform: scale(0.95); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
  }
  .modal h2 {
    margin-top: 0;
    font-size: 1.4rem;
    color: #e74c3c;
    text-align: center;
  }
  .modal textarea {
    width: 100%;
    min-height: 80px;
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 0.7rem;
    font-size: 1rem;
    margin-bottom: 1.2rem;
    resize: vertical;
    transition: border 0.2s;
  }
  .modal textarea:focus {
    border: 1.5px solid #e74c3c;
    outline: none;
  }
  .modal button[type="submit"] {
    background: #e74c3c;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 0.6rem 1.5rem;
    font-size: 1rem;
    cursor: pointer;
    margin-right: 0.7rem;
    transition: background 0.2s;
  }
  .modal button[type="submit"]:hover {
    background: #c0392b;
  }
  .modal button[type="button"], .close-modal {
    background: #eee;
    color: #333;
    border: none;
    border-radius: 8px;
    padding: 0.6rem 1.2rem;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.2s;
  }
  .modal button[type="button"]:hover, .close-modal:hover {
    background: #ddd;
  }
  .close-modal {
    position: absolute;
    top: 12px;
    right: 14px;
    font-size: 1.5rem;
    background: transparent;
    border: none;
    color: #888;
    cursor: pointer;
    padding: 0;
    line-height: 1;
  }
</style>
</body>
</html>
