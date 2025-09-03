<?php session_start(); ?>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
  <h2>🔐 Connexion</h2>
  <form action="verification.php" method="POST">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="submit" value="Se connecter">
  </form>
</div>
<a href="inscription.php">Inscription</a>
