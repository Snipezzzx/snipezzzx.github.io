<?php
  global $pdo;

  $statement = $pdo->prepare("SELECT * FROM tbldispatches");
  $statement->execute();

  while($row = $statement-fetch())
  {
    
  }
?>
