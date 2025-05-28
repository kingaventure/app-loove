<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Messages envoyés</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/diss.css">
</head>
<body>
  <h1>📩 Messages envoyés</h1>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Expéditeur</th>
        <th>Destinataire</th>
        <th>Message</th>
        <th>Heure d’envoi</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>M-001</td>
        <td>Michel</td>
        <td>Claire</td>
        <td class="message-cell">Salut Claire ! Tu vas bien ?</td>
        <td>06/05/2025 15:42</td>
        <td class="actions">
          <button class="view-btn">🔍 Voir</button>
          <button class="delete-btn">🗑️ Supprimer</button>
        </td>
      </tr>
      <tr>
        <td>M-002</td>
        <td>Claire</td>
        <td>Michel</td>
        <td class="message-cell">Oui ça va et toi ? 😊</td>
        <td>06/05/2025 15:44</td>
        <td class="actions">
          <button class="view-btn">🔍 Voir</button>
          <button class="delete-btn">🗑️ Supprimer</button>
        </td>
      </tr>
      <!-- Autres messages ici -->
    </tbody>
  </table>
</body>
</html>

