<?php


$title=$_POST['title'];
$file=$_FILES['userfile']['name'];
$text=$_POST['text'];
$artid=$_POST['artid'];



include('header.php');
include('conec.php');
include('upload.php');

if ($file != NULL){
    $file= $file;
}
else{
  $file = $data['fichier'];
}

var_dump($title, $file, $text, $artid);

$req = $pdo->prepare(' UPDATE article SET titre = :titre, fichier = :fichier, texte = :texte WHERE id = :id');
$req->bindParam(':titre', $title);
$req->bindParam(':fichier', $file);
$req->bindParam(':texte', $text);
$req->bindParam(':id', $artid);

$req->execute();
$data=$req->fetch();








print_r($pdo->errorInfo());
header('Location: edit.php?artid='.$artid.','.$file.'');
 ?>
