<?php
require '../config/db.php';

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

try {
  $stmt = $pdo->prepare("INSERT INTO utilisateurs (username, email, password, role) VALUES (?, ?, ?, ?)");
  $stmt->execute([$username, $email, $password, $role]);
  echo "<p style='text-align:center;color:green;'>✅ Utilisateur inscrit avec succès.</p>";
  echo "<p style='text-align:center;'><a href='login.php'>Se connecter</a></p>";
} catch (PDOException $e) {
  echo "<p style='text-align:center;color:red;'>❌ Erreur : " . $e->getMessage() . "</p>";
}
?>
