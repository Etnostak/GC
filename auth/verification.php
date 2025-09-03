<?php
session_start();
require '../config/db.php';

$username = trim($_POST['username']);
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['user'] = $user['username'];
  header('Location: ../pages/dashboard.php');
} else {
  echo "<p style='color:red;text-align:center;'>❌ Identifiants incorrects.</p>";
}
?>
