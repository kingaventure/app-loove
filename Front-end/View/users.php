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

    .modal-overlay {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0; top: 0;
  width: 100vw; height: 100vh;
  background: rgba(0,0,0,0.4);
  align-items: center;
  justify-content: center;
}
.modal-overlay.active {
  display: flex;
}
.modal {
  background: #fff;
  border-radius: 14px;
  padding: 32px 28px 24px 28px;
  min-width: 320px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.18);
  position: relative;
  animation: modalIn .25s;
}
@keyframes modalIn {
  from { transform: translateY(-40px) scale(0.95); opacity: 0; }
  to   { transform: translateY(0) scale(1); opacity: 1; }
}
.modal h2 {
  margin-top: 0;
  margin-bottom: 18px;
  font-size: 1.3em;
  text-align: center;
}
.modal form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.modal input[type="text"],
.modal input[type="password"] {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 7px;
  font-size: 1em;
  width: 100%;
  box-sizing: border-box;
}
.modal button[type="submit"] {
  background: #28a745;
  color: #fff;
  border: none;
  border-radius: 7px;
  padding: 10px 0;
  font-size: 1em;
  cursor: pointer;
  margin-bottom: 4px;
  transition: background 0.2s;
}
.modal button[type="submit"]:hover {
  background: #218838;
}
.modal button[type="button"] {
  background: #eee;
  color: #333;
  border: none;
  border-radius: 7px;
  padding: 10px 0;
  font-size: 1em;
  cursor: pointer;
  transition: background 0.2s;
}
.modal button[type="button"]:hover {
  background: #ddd;
}
.close-modal {
  position: absolute;
  top: 12px;
  right: 18px;
  font-size: 1.4em;
  color: #888;
  cursor: pointer;
  transition: color 0.2s;
  border: none;
  background: none;
}
.close-modal:hover {
  color: #dc3545;
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
    .back-btn {
  position: absolute;
  top: 24px;
  left: 24px;
  background: #eee;
  color: #333;
  text-decoration: none;
  padding: 8px 16px;
  border-radius: 8px;
  font-size: 1em;
  transition: background 0.2s;
  z-index: 1100;
}
.back-btn:hover {
  background-color: blue;
  color : white;
}
  </style>
</head>
<body>
      <a href="http://localhost/app-loove/index.php?component=dashboard" class="back-btn">⬅️ Retour</a>


  <h1>Admin - Utilisateurs</h1>

  <div class="add-user">
      <button onclick="openAddUserModal()">➕ Ajouter un utilisateur</button>
  </div>

  <div class="modal-overlay" id="addUserModal">
  <div class="modal">
    <button class="close-modal" onclick="closeAddUserModal()" title="Fermer">&times;</button>
    <h2>Ajouter un utilisateur</h2>
    <form method="POST" action="">
      <input type="hidden" name="add_user" value="1" />
      <input type="text" name="username" placeholder="Nom d'utilisateur" required />
      <input type="password" name="password" placeholder="Mot de passe" required />
      <input type="text" name="prem" placeholder="Premium (0 ou 1)" required />
      <input type="text" name="enabled" placeholder="Activé (0 ou 1)" required />
      <input type="text" name="admin" placeholder="Admin (0 ou 1)" required />
      <button type="submit">Créer</button>
      <button type="button" onclick="closeAddUserModal()">Annuler</button>
    </form>
  </div>
</div>

<div class="modal-overlay" id="modifyUserModal">
  <div class="modal">
    <button class="close-modal" onclick="closeModifyUserModal()" title="Fermer">&times;</button>
    <h2>Modifier un utilisateur</h2>
    <form method="POST" action="">
      <input type="hidden" name="modify_user" value="1" />
      <input type="hidden" name="id" />
      <input type="text" name="username" placeholder="Nom d'utilisateur" required />
      <input type="text" name="prem" placeholder="Premium (0 ou 1)" required />
      <input type="text" name="enabled" placeholder="Activé (0 ou 1)" required />
      <input type="text" name="admin" placeholder="Admin (0 ou 1)" required />
      <button type="submit">Sauvegarder</button>
      <button type="button" onclick="closeModifyUserModal()">Annuler</button>
    </form>
  </div>
</div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom d'utilisateur</th> 
        <th>Premium</th>
        <th>Activé</th>
        <th>Admin</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($users) && is_array($users)): ?>
        <?php foreach ($users as $user): ?>
          <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= $user['prem'] ? 'Oui' : 'Non' ?></td>
            <td><?= $user['enabled'] ? 'Oui' : 'Non' ?></td>
            <td><?= $user['admin'] ? 'Oui' : 'Non' ?></td>
            <td class="actions">
              <button class="edit-btn"
                onclick="openModifyUserModal(
                  '<?= htmlspecialchars($user['id'], ENT_QUOTES) ?>',
                  '<?= htmlspecialchars($user['username'], ENT_QUOTES) ?>',
                  '<?= htmlspecialchars($user['prem'], ENT_QUOTES) ?>',
                  '<?= htmlspecialchars($user['enabled'], ENT_QUOTES) ?>',
                  '<?= htmlspecialchars($user['admin'], ENT_QUOTES) ?>'
                )">✏️ Modifier</button>
              <a href="http://localhost/app-loove/index.php?component=users&action=delete&id=<?= htmlspecialchars($user['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
              <button class="delete-btn">🗑️ Supprimer</button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
  <script>
function openModifyUserModal(id, username, prem, enabled, admin) {
  document.getElementById('modifyUserModal').classList.add('active');
  document.querySelector('#modifyUserModal input[name="id"]').value = id;
  document.querySelector('#modifyUserModal input[name="username"]').value = username;
  document.querySelector('#modifyUserModal input[name="prem"]').value = prem;
  document.querySelector('#modifyUserModal input[name="enabled"]').value = enabled;
  document.querySelector('#modifyUserModal input[name="admin"]').value = admin;
}
function closeModifyUserModal() {
  document.getElementById('modifyUserModal').classList.remove('active');
}
function openAddUserModal() {
    document.getElementById('addUserModal').classList.add('active');
}
function closeAddUserModal() {
    document.getElementById('addUserModal').classList.remove('active');
}
document.getElementById('addUserModal').addEventListener('click', function(e) {
    if (e.target === this) closeAddUserModal();
});
</script>
</body>
</html>
