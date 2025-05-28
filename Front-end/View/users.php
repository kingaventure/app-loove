<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Gestion des utilisateurs</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/users.css">

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
