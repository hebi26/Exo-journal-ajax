
<?php
include('header.php');
include('conec.php');
?>

<h1>Liste des Articles</h1>

<section class="container">

<?php
//-----------------Requete pour lire l'ensemble des articles---------------//

$req = $pdo->query('SELECT * FROM article');

while ($data = $req->fetch()){

    ?><div class="content">
      <h3><?php echo htmlspecialchars($data->titre); ?></h3>

      <?php echo '<img src="uploads/'.$data->fichier.'">' ?>

      <p><?php echo htmlspecialchars($data->texte); ?></p>

      <em>le <?php echo $data->date; ?></em><hr>
    </div>

<!-- - - - - - - - - -boutons choix- - - - - - - - - - - - - - - - - - -->

      <a class="btn btn-primary" href="com.php?artid=<?php echo ($data->id); ?>">
      <span class="glyphicon glyphicon-comment"></span> Commentaires</a>
      <a class="btn btn-success" href="edit.php?artid=<?php echo ($data->id); ?>">
      <span class="glyphicon glyphicon-edit"></span> Modifier</a>
      <a class="btn btn-danger" href="delete.php?artid=<?php echo ($data->id); ?>">
      <span class="glyphicon glyphicon-remove-circle"></span> Supprimer</a><hr>

    <?php

}
    $req->closeCursor();




    ?>

</section>
</body>
</html>
