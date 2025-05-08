<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Messages envoyés</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 25px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #343a40;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .actions button {
      margin-right: 5px;
      padding: 6px 10px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .delete-btn {
      background-color: #dc3545;
      color: white;
    }

    .view-btn {
      background-color: #007bff;
      color: white;
    }

    .message-cell {
      max-width: 400px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
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

