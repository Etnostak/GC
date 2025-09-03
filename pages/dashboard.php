<?php
session_start();
require '../config/db.php';
if (!isset($_SESSION['user'])) {
  header('Location: ../auth/login.php');
  exit;
}
?>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
  <h2>👋 Bienvenue <?= htmlspecialchars($_SESSION['user']) ?></h2>

  <div class="grid">
    <div>
      <h3>📅 Prochains repas</h3>
      <ul>
        <?php
        $repas = $pdo->query("SELECT nom, date, type FROM repas WHERE date >= CURDATE() ORDER BY date ASC LIMIT 5");
        foreach ($repas as $r) {
          echo "<li>{$r['date']} – <strong>{$r['nom']}</strong> ({$r['type']})</li>";
        }
        ?>
      </ul>
    </div>

    <div>
      <h3>👨‍🎓 Dernières inscriptions</h3>
      <ul>
        <?php
        $inscriptions = $pdo->query("
          SELECT i.eleve, r.nom, r.date 
          FROM inscriptions i 
          JOIN repas r ON i.repas_id = r.id 
          ORDER BY i.id DESC LIMIT 5
        ");
        foreach ($inscriptions as $i) {
          echo "<li><strong>{$i['eleve']}</strong> pour {$i['nom']} ({$i['date']})</li>";
        }
        ?>
      </ul>
    </div>
  </div>

  <div class="actions">
    <a href="ajouter_repas.php">➕ Ajouter un repas</a>
    <a href="inscription.php">📝 Inscrire un élève</a>
    <a href="logout.php">🚪 Déconnexion</a>
  </div>
</div>
