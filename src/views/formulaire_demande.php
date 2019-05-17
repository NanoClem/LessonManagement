<!DOCTYPE html>

<html> 

   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <title> formulaire de demande </title>
   </head>

   <?php include "templates/navigation.php"; ?>

  <body> 

		<!-- FORMULAIRE -->
    <form class="form-horizontal" method="post" action="../php/save_demande.php">

      <!--objet de la demande -->
      <div class="form-group">
        <label class="control-label col-sm-2" for="demande">Objet de la demande:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="objet" id="objet" placeholder="Entrez l'objet de la demande" required>
        </div>
      </div>

    <!--description -->
    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Description:</label>
      <div class="col-sm-10"> 
        <textarea class="form-control" name="descr" id="descr" rows="3" required></textarea>
      </div>
    </div>
    
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Envoyer</button>
      </div>
    </div>

  </form>

</body>

<?php include "templates/footer.html"; ?>

</html>
















