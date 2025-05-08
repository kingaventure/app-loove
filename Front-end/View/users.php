<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Gestion des utilisateurs</title>
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

    .add-user {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 15px;
    }

    .add-user button {
      padding: 10px 15px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
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
      background-color: #343a40;
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

    .edit-btn {
      background-color: #ffc107;
      color: black;
    }

    .delete-btn {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body>
  <h1>Admin - Utilisateurs</h1>

  <div class="add-user">
    <button>➕ Ajouter un utilisateur</button>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Âge</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>001</td>
        <td>Michel</td>
        <td>25</td>
        <td>michel@email.com</td>
        <td class="actions">
          <button class="edit-btn">✏️ Modifier</button>
          <button class="delete-btn">🗑️ Supprimer</button>
        </td>
      </tr>
      <tr>
        <td>002</td>
        <td>Claire</td>
        <td>29</td>
        <td>claire@email.com</td>
        <td class="actions">
          <button class="edit-btn">✏️ Modifier</button>
          <button class="delete-btn">🗑️ Supprimer</button>
        </td>
      </tr>
      <!-- Autres utilisateurs -->
    </tbody>
  </table>
</body>
</html>
