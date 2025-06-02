<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Gestion des utilisateurs</title>
  <link rel="stylesheet" href="/app-loove/Front-end/assets/css/report.css">

</head>
<body>
      <a href="http://localhost/app-loove/index.php?component=dashboard" class="back-btn">⬅️ Retour</a>

  <h1>Admin - Reports</h1>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Id Accusé</th> 
        <th>Message</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($reports) && is_array($reports)): ?>
        <?php foreach ($reports as $report): ?>
          <tr>
            <td><?= htmlspecialchars($report['id']) ?></td>
            <td><?= htmlspecialchars($report['usernam_rep']) ?></td>
            <td><?= htmlspecialchars($report['mes']) ?></td>
            <td class="actions">

              <a href="http://localhost/app-loove/index.php?component=report&action=ban&id=<?= htmlspecialchars($report['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir bannir cet utilisateur ?');">
              <button class="ban-btn">Bannir</button>
              </a>

              <a href="http://localhost/app-loove/index.php?component=report&action=real&id=<?= htmlspecialchars($report['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir relâcher cet utilisateur ?');">
              <button class="real-btn">Relâcher</button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>
