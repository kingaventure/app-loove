<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Gestion des signalements</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/report.css">

</head>
<body>
  <h1>🛑 Signalements utilisateurs</h1>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Signalé</th>
        <th>Par</th>
        <th>Raison</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>R-001</td>
        <td>Michel</td>
        <td>Claire</td>
        <td>Comportement inapproprié</td>
        <td>06/05/2025</td>
        <td class="actions">
          <button class="view-btn">🔍 Voir</button>
          <button class="resolve-btn">✅ Résolu</button>
          <button class="delete-btn">🗑️ Supprimer</button>
        </td>
      </tr>
      <tr>
        <td>R-002</td>
        <td>Paul</td>
        <td>Julie</td>
        <td>Spam</td>
        <td>05/05/2025</td>
        <td class="actions">
          <button class="view-btn">🔍 Voir</button>
          <button class="resolve-btn">✅ Résolu</button>
          <button class="delete-btn">🗑️ Supprimer</button>
        </td>
      </tr>
      <!-- Autres reports -->
    </tbody>
  </table>
</body>
</html>
