<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Gestion des signalements</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f7f7f7;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #6c757d;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .actions button {
      margin-right: 5px;
      padding: 6px 12px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .view-btn {
      background-color: #007bff;
      color: white;
    }

    .resolve-btn {
      background-color: #28a745;
      color: white;
    }

    .delete-btn {
      background-color: #dc3545;
      color: white;
    }
  </style>
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
