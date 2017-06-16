
<?php
include('header.php');
?>


  <section class="container"></section>

  <script>

  $("#create").click(function(){

    $(".container").html(

      '<h3>-Créer un article-</h3>'+
      '<form id="my_form" method="post" action="script.php" enctype="multipart/form-data">'+

      '<div class="form-group">'+
        '<label for="Title">Titre de l\'article</label>'+
        '<input type="text" class="form-control" name="title" id="Title" required="required" >'+
      '</div>'+
      '<div class="form-group">'+
        '<input type="file" name="userfile" size="50" value="" id="File">'+
        '</div>'+
        '<div id="image_preview">'+
          '<div class="thumbnail hidden">'+
          '<img src="" alt="">'+
        '<div class="caption">'+
        '<h4></h4>'+
        '<p></p>'+
        '<p>'+
        '<button type="button" class="btn btn-default btn-danger">Annuler</button>'+
        '</p>'+
        '</div>'+
        '</div>'+
        '</div>'+
      '<div  class="form-group">'+
        '<label for="Text">Texte de l\'article</label>'+
        '<textarea class="form-control" rows="5" name="text" id="Text" required="required"></textarea>'+
      '</div>'+
      '<input class="btn btn-success" id="btn1" type="submit" name="submit" value="Soumettre">'+
    '</form>'
  );

// apercu de l'image selectionée----------------------------------




// on récupere la valeurs des input du form au submit----------------------------------

$('#my_form').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();

        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();

        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            data: data,
            success: function (response) {
                // La réponse du serveur
                alert("request success");
            }
        });
    });
    $(function () {
        // A chaque sélection de fichier
        $('#my_form').find('input[name="userfile"]').on('change', function (e) {
            var files = $(this)[0].files;

            if (files.length > 0) {
                // On part du principe qu'il n'y qu'un seul fichier
                // étant donné que l'on a pas renseigné l'attribut "multiple"
                var file = files[0],
                    $image_preview = $('#image_preview');

                // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
                $image_preview.find('.thumbnail').removeClass('hidden');
                $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
                $image_preview.find('h4').html(file.name);
                $image_preview.find('.caption p:first').html(file.size +' bytes');
            }
        });

        // Bouton "Annuler" pour vider le champ d'upload
        $('#image_preview').find('button[type="button"]').on('click', function (e) {
            e.preventDefault();

            $('#my_form').find('input[name="userfile"]').val('');
            $('#image_preview').find('.thumbnail').addClass('hidden');
        });
    });
});


// affichage de la liste---------------------------------------

  $("#list").click(function(){




  });


  </script>



  </body>
</html>
