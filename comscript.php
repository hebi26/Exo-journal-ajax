<?php
include('header.php');
include('conec.php');

$pseudo = $_POST['pseudo'];
$com = $_POST['com'];
$artid = $_POST['artid'];

// -----ecriture des com dans la table-----
$req = $pdo->prepare("INSERT INTO commentaire (idarticle, pseudo, com)
VALUES (:idarticle, :pseudo, :com)");

$req->execute(array(
    'idarticle' => $artid,
    'pseudo' => $pseudo,
    'com' => $com
));

print_r($pdo->errorInfo());
header('location: com.php?artid='.$artid.'');
  ?>
</body>
</html>
