<?php
include('header.php');
include('conec.php');
?>


<section class="container">

<?php

// -----------------on affiche l'article selectionné--------------------//

$req = $pdo->prepare('SELECT * FROM article WHERE id=?');
$req->execute(array($_GET['artid']));
$data=$req->fetch();

 ?>
 <h3><?php echo htmlspecialchars($data->titre); ?></h3>

 <?php echo '<img id="medium" src="uploads/'.$data->fichier.'">' ?>

 <p><?php echo htmlspecialchars($data->texte); ?></p>

 <em>le <?php echo $data->date; ?></em>

<!-- - - - - - - - - - - -formulaire de saisi commentaires - - - - -  - - - - - -  -->

<article class="comsection">

<h3 class="commit"><em>Laisser un commentaire</em></h3>
<form method="post" action="comscript.php">

  <div class="form-group">
    <input type="text" class="form-control" name="pseudo" id="Pseudo" placeholder="pseudo..." required="required" >
  </div>
  <input type="hidden" name="artid" value="<?php echo $data->id; ?>">
  <div class="form-group">
    <textarea class="form-control" rows="5" name="com" id="Com" placeholder="votre commentaire..." required="required"></textarea>
  </div>
  <input class="btn btn-success" id="btn4" type="submit" name="submit" value="Envoyer">
</form>
</div>
<div class="comlist">



  
<!-- - - - - - - - - -affichage des commentaires - - - - - - - - - - - - - - - - - -->
<?php
$req = $pdo->prepare('SELECT pseudo, com, datecom FROM commentaire WHERE idarticle = ? ORDER BY datecom DESC LIMIT 0, 20');
$req->execute(array($_GET['artid']));

while ($data = $req->fetch())
{
?>
  <p><em><?php echo $data->datecom;?></em> | <strong><?php echo htmlspecialchars($data->pseudo); ?> : </strong><?php echo htmlspecialchars($data->com);?></p>

<?php
}
  $req->closeCursor();
?>
</div>
</article>
</section>
</body>
</html>
