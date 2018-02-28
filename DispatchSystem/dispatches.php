<?php
  global $pdo;

  $statement = $pdo->prepare("SELECT * FROM tbldispatches");
  $statement->execute();

  while($row = $statement-fetch())
  {
    echo "<div class='dispatch'>";
    echo ""
    echo "</div>";
  }
?>
