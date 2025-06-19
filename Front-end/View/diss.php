<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Gestion des utilisateurs</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/diss.css">

</head>
<body>
      <a href="http://localhost/app-loove/index.php?component=dashboard" class="back-btn">⬅️ Retour</a>
  <h1>Admin - Messages</h1>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Id Sender</th>
        <th>Id Reciver</th>
        <th>Contenu</th>
        <th>Envoyé à</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($messages) && is_array($messages)): ?>
        <?php foreach ($messages as $message): ?>
          <tr>
            <td><?= htmlspecialchars($message['id'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($message['sender_id'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($message['receiver_id'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($message['content'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($message['sent_at'], ENT_QUOTES) ?></td>
            <td class="action">
              <a href="http://localhost/app-loove/index.php?component=diss&action=delete&id=<?= htmlspecialchars($message['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
              <button class="delete-btn">🗑️ Supprimer</button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>


