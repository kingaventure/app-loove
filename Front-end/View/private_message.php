<?php
// Ajoute ceci tout en haut du fichier si ce n'est pas déjà fait
if (!isset($profilId)) {
    $profilId = null;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Conversation privée</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; }
        .messages { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 10px; padding: 20px; }
        .msg { margin: 10px 0; }
        .me { text-align: right; color: #7b4db6; }
        .other { text-align: left; color: #333; }
        form { display: flex; margin-top: 20px; }
        input[type="text"] { flex: 1; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { padding: 10px 20px; background: #7b4db6; color: #fff; border: none; border-radius: 5px; margin-left: 10px; }
    </style>
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