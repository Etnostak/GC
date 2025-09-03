
<?php
session_start();
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO repas (nom, date, type) VALUES (?, ?, ?)");
  $stmt->execute([$_POST['nom'], $_POST['date'], $_POST['type']]);
}
?>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
  <h2>🍽️ Ajouter un repas</h2>
  <form method="POST">
    <input type="text" name="nom" placeholder="Nom du repas" required>
    <input type="date" name="date" required>
    <select name="type">
      <option value="Déjeuner">Déjeuner</option>
      <option value="Dîner">Dîner</option>
    </select>
    <input type="submit" value="Ajouter">
  </form>
</div>
<div class="container">
  <h  3>📋 Liste des repas</h3>
  <table>
    <tr><th>Nom</th><th>Date</th><th>Type</th></tr>
    <?php
    foreach ($pdo->query("SELECT * FROM repas ORDER BY date ASC") as $r) {
      echo "<tr><td>{$r['nom']}</td><td>{$r['date']}</td><td>{$r['type']}</td></tr>";
    }
    ?>
  </table>
  
</div>
