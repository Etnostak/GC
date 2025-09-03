<?php
session_start();
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO inscriptions (eleve, repas_id) VALUES (?, ?)");
  $stmt->execute([$_POST['eleve'], $_POST['repas_id']]);
}
?>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
  <h2>🧒 Inscrire un élève</h2>
  <form method="POST">
    <input type="text" name="eleve" placeholder="Nom de l'élève" required>
    <select name="repas_id">
      <?php
      foreach ($pdo->query("SELECT * FROM repas ORDER BY date ASC") as $repas) {
        echo "<option value='{$repas['id']}'>{$repas['nom']} – {$repas['date']} ({$repas['type']})</option>";
      }
      ?>
    </select>
    <input type="submit" value="Inscrire">
  </form>
    </div>
<div class="container">
  <h3>📋 Liste des inscriptions</h3>
  <table>
    <tr><th>Élève</th><th>Repas</th><th>Date</th><th>Type</th></tr>
    <?php
    $query = "
      SELECT i.eleve, r.nom, r.date, r.type
      FROM inscriptions i
      JOIN repas r ON i.repas_id = r.id
      ORDER BY r.date ASC
    ";
    foreach ($pdo->query($query) as $row) {
      echo "<tr><td>{$row['eleve']}</td><td>{$row['nom']}</td><td>{$row['date']}</td><td>{$row['type']}</td></tr>";
    }
    ?>
  </table>
</div>

