<?php
include('header.php');
include('conec.php');

?>

<section class="container">

<!-- - - - - - - - - - - -formulaire de modif- - - - - - - - - - - - -->

<?php

$req = $pdo->prepare('SELECT * FROM article WHERE id=?');
$req->execute(array($_GET['artid']));
$data=$req->fetch();

?>

<h3>-Modifier l'article-</h3>

<!-- - - - - -on affiche les champs avec les données deja enregistrées - - - -->

<form method="post" action="editfile.php" enctype="multipart/form-data">

  <div class="form-group">
    <input type="hidden" name="artid" value="<?php echo($data->id); ?>">
    <label for="Title">Titre de l'article</label>
    <input type="text" class="form-control" name="title" id="Title" value="<?php echo($data->titre); ?>" >
  </div>

  <div class="form-group">
    <p><img id="miniature" src="./uploads/<?php echo($data->fichier); ?>"></p>
    <input type="file"  id="File" name="userfile" size="50">
    </div>

  <div  class="form-group">
    <label for="Text">Texte de l'article</label>
    <textarea class="form-control" rows="5" name="text" id="Text"><?php echo($data->texte); ?></textarea>
  </div>
  <input class="btn btn-success" id="btn3" type="submit" name="submit" value="Soumettre">
</form>

 <!-- - - - - - - - afficher l'article concerné - - - - - - -  -->




</section>
</body>
</html>
