<?php include("entete.php"); ?>
<?php include("connexion.php"); ?>



<div class="container-fluid">
    <h1 class="mt-4">GESTION DES TYPES DE VELO</h1>

    <div class="text-center">
		<button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#modaltype"> Ajouter un type </button>
	</div>

	<br />


    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-table mr-1"></i>Liste des Types</div>
                    <div class="card-body">
                        <div class="table-responsive">

	<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
		       <thead>
		                <tr>
		                    <th>Nom</th>
		                    <th>Description</th> 
                        <th>Edition</th> 
                        <th>Suppression</th> 
		                </tr>
		        </thead>
	  <tbody> 
        <?php
          $sql = "SELECT * from typevelo";
          //Prepare the query:
          $query = $bdd->prepare($sql);
          //Execute the query:
          $query->execute();
          //Assign the data which you pulled from the database (in the preceding step) to a variable.
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          // For serial number initialization
           
          if($query->rowCount() > 0)
          {
          //In case that the query returned at least one record, we can echo the records within a foreach loop:
          foreach($results as $result)
          {
          ?>
          <!-- Display Records -->
              <tr>
               
              <td><?php echo htmlentities($result->nomType);?></td>
              <td><?php echo htmlentities($result->descriptionType);?></td>

          <td><a href="editType.php?id=<?php echo htmlentities($result->idType);?>"><button class="btn btn-info btn-sm" value="Modifier">Modifier</button></a></td>
          <td><a href="deleteType.php?id=<?php echo htmlentities($result->idType);?>"><button class="btn btn-warning btn-sm" value="Supprimer" onClick="return confirm('Voulez vous vraiment supprimer ce type ? ');">Supprimer</button></a></td>
              </tr>
    
    <?php
       
      }} ?>    
	   </tbody> 
	</table>

</div>
</div>
</div>


</div>


 <!-- Modal -->
<div class="modal fade" id="modaltype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="type_post.php" method="post">
            	<div class="form-group">
            		<label for="type">Type</label>
            		<input type="text" class="form-control" id = "type" name="type" placeholder ="Entrez le type" name="">          		
            	</div>            	

            	<div class="form-group">
            		<label for="description">Description</label>
            		<input type="text" class="form-control" id = "description" name="description" placeholder ="Entrez la description" name="">
            	</div>
				<button type="submit" class="btn btn-primary">Valider</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include("footer.php"); ?>


 
