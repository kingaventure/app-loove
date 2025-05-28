<?php
if (!isset($profilId)) {
    $profilId = null;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Conversation privée</title>
      <link rel="stylesheet" href="/app-loove/Front-end/assets/css/private_message.css">

</head>
<body>
    <div class="messages">
        <h2>Conversation</h2>
        <?php foreach ($messages as $msg): ?>
            <div class="msg <?php echo $msg['sender_id'] == $profilId ? 'me' : 'other'; ?>">
                <strong><?php echo $msg['sender_id'] == $profilId ? 'Moi' : 'Lui/Elle'; ?> :</strong>
                <?php echo htmlspecialchars($msg['content']); ?>
                <div style="font-size:10px;"><?php echo $msg['sent_at']; ?></div>
            </div>
        <?php endforeach; ?>
        <form method="post">
            <input type="text" name="message" placeholder="Votre message..." required>
            <button type="submit">Envoyer</button>
        </form>
        <a href="index.php?component=messages">← Retour aux messages</a>
    </div>
</body>
</html>