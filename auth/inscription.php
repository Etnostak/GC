<link rel="stylesheet" href="../css/style.css">
<div class="container">
  <h2>📝 Inscription utilisateur</h2>
  <form action="enregistrer.php" method="POST">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <select name="role">
      <option value="utilisateur">Utilisateur</option>
      <option value="gestionnaire">Gestionnaire</option>
      <option value="admin">Admin</option>
    </select>
    <input type="submit" value="Créer le compte">
  </form>
</div>
