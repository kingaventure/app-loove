<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Gestion des utilisateurs</title>
    <link rel="stylesheet" href="/app-loove/Front-end/assets/css/profiles.css">

</head>
<body>
      <a href="http://localhost/app-loove/index.php?component=dashboard" class="back-btn">⬅️ Retour</a>


  <h1>Admin - Profils</h1>

<div class="modal-overlay" id="modifyProfilModal">
  <div class="modal">
    <button class="close-modal" onclick="closeModifyProfilModal()" title="Fermer">&times;</button>
    <h2>Modifier un profil</h2>
    <form method="POST" action="">
      <input type="hidden" name="modify_profil" value="1" />
        <input type="hidden" name="id" value="" />
        <input type="text" name="username" placeholder="Nom d'utilisateur" required />
        <input type="text" name="age" placeholder="Age" required />
        <input type="text" name="name" placeholder="Nom" required />
        <input type="text" name="prenom" placeholder="Prénom" required />
        <input type="text" name="sexe" placeholder="Sexe" required />
        <input type="text" name="os" placeholder="Orientation" required />
        <input type="text" name="bio" placeholder="Bio" required />
        <input type="text" name="movie_id_1" placeholder="Film 1" required />
        <input type="text" name="movie_id_2" placeholder="Film 2" required />
        <input type="text" name="movie_id_3" placeholder="Film 3" required />
      <button type="submit">Sauvegarder</button>
      <button type="button" onclick="closeModifyProfilModal()">Annuler</button>
    </form>
  </div>
</div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom d'utilisateur</th> 
        <th>Age</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Sexe</th>
        <th>Orientation</th>
        <th>Bio</th>
        <th>Film 1</th>
        <th>Film 2</th>
        <th>Film 3</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($profils) && is_array($profils)): ?>
        <?php foreach ($profils as $profil): ?>
          <tr>
            <td><?= htmlspecialchars($profil['id'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['user_name'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['age'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['name'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['prenom'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['sexe'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['os'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['bio'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['movie_id_1'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['movie_id_2'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($profil['movie_id_3'], ENT_QUOTES) ?></td>
            <td class="actions">
              <button class="edit-btn"
                onclick="openModifyProfilModal(
                '<?= htmlspecialchars($profil['id'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['user_name'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['age'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['name'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['prenom'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['sexe'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['os'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['bio'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['movie_id_1'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['movie_id_2'], ENT_QUOTES) ?>',
                '<?= htmlspecialchars($profil['movie_id_3'], ENT_QUOTES) ?>'
                )">✏️ Modifier</button>
              <a href="http://localhost/app-loove/index.php?component=profiles&action=delete&id=<?= htmlspecialchars($profil['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce profil ?');">
              <button class="delete-btn">🗑️ Supprimer</button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
  <script>
function openModifyProfilModal(id, username, age, name, prenom, sexe, os, bio, movie_id_1, movie_id_2, movie_id_3) {
    document.getElementById('modifyProfilModal').classList.add('active');
    document.getElementById('modifyProfilModal').querySelector('input[name="id"]').value = id;
    document.getElementById('modifyProfilModal').querySelector('input[name="username"]').value = username;
    document.getElementById('modifyProfilModal').querySelector('input[name="age"]').value = age;
    document.getElementById('modifyProfilModal').querySelector('input[name="name"]').value = name;
    document.getElementById('modifyProfilModal').querySelector('input[name="prenom"]').value = prenom;
    document.getElementById('modifyProfilModal').querySelector('input[name="sexe"]').value = sexe;
    document.getElementById('modifyProfilModal').querySelector('input[name="os"]').value = os;
    document.getElementById('modifyProfilModal').querySelector('input[name="bio"]').value = bio;
    document.getElementById('modifyProfilModal').querySelector('input[name="movie_id_1"]').value = movie_id_1;
    document.getElementById('modifyProfilModal').querySelector('input[name="movie_id_2"]').value = movie_id_2;
    document.getElementById('modifyProfilModal').querySelector('input[name="movie_id_3"]').value = movie_id_3;
}
function closeModifyProfilModal() {
  document.getElementById('modifyProfilModal').classList.remove('active');
}
document.getElementById('addProfilModal').addEventListener('click', function(e) {
    if (e.target === this) closeAddProfilModal();
});
</script>
</body>
</html>
