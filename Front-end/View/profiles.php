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
    .add-profil {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 15px;
    }

    .add-profil button {
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
  background-color: green;
  color : white;
}
  </style>
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
