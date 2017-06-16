
<?php
include('conec.php');
include('upload.php');

//----------------------On défini les variables------------------------------//

      $title=$_POST['title'];
      $file=$_FILES['userfile']['name'];
      $text=$_POST['text'];


// ---------------Requete pour injecter dans la table------------------------//

      $req = $pdo->query("INSERT INTO article (titre, fichier, texte) VALUES ('$title', '$file', '$text')");

      // $req->execute(array(
      //     'titre' => $title,
      //     'fichier' => $file,
      //     'texte' => $text
      // ));

      print_r($pdo->errorInfo());


?>
