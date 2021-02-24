<?php include("entete.php"); ?>
<?php include("connexion.php"); ?>

<div class="container-fluid">
    <h1 class="mt-4">GESTION DES LOCATIONS</h1>

    <div class="text-center">
		<button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#modallocation"> Ajouter une Location </button>
	</div>

	<br />


    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-table mr-1"></i>Liste des Locations</div>
                    <div class="card-body">
                        <div class="table-responsive">

    

	<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
		       <thead>
		                <tr>
		                    <th>Date de Location</th>
                        <th>Durée(heures)</th>
                        <th>commentaires</th>
                        <th>Client</th>
                        <th>Velo</th>
                        <th>Responsable</th>
		                    <th>Edition</th> 
                        <th>Suppression</th> 
		                </tr>
		        </thead>
	  <tbody> 

        <?php
$sql = "SELECT * from location";
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
     
    <td><?php echo htmlentities($result->dateLocation);?></td>
    <td><?php echo htmlentities($result->dureeLocation);?></td>
    <td><?php echo htmlentities($result->commentaires);?></td>

       <?php

        $identifiant2 = $result->client_id;

        $sql = 'SELECT * FROM client WHERE idClient=:id';

        $statement = $bdd->prepare($sql);

        $statement->execute([':id' => $identifiant2 ]);

        $customer = $statement->fetch(PDO::FETCH_OBJ);
    ?>


    <td><?php echo htmlentities($customer->NomClient);?></td>
    
    <?php

        $identifiant3 = $result->velo_id;

        $sql = 'SELECT * FROM velo WHERE idVelo=:id';

        $statement = $bdd->prepare($sql);

        $statement->execute([':id' => $identifiant3 ]);

        $bicycle = $statement->fetch(PDO::FETCH_OBJ);
    ?>


    <td><?php echo htmlentities($bicycle->nomVelo);?></td>
    
    <?php

        $identifiant4 = $result->responsable_id;

        $sql = 'SELECT * FROM responsable WHERE idResponsable=:id';

        $statement = $bdd->prepare($sql);

        $statement->execute([':id' => $identifiant4 ]);

        $respo = $statement->fetch(PDO::FETCH_OBJ);
    ?>



    <td><?php echo htmlentities($respo->nomResponsable);?></td>

   

<td><a href="editLocation.php?id=<?php echo htmlentities($result->idLocation);?>"><button class="btn btn-info btn-sm" value="Modifier">Modifier</button></a></td>
<td><a href="deleteLocation.php?id=<?php echo htmlentities($result->idLocation);?>"><button class="btn btn-warning btn-sm" value="Supprimer" onClick="return confirm('Voulez vous vraiment supprimer cette location ? ');">Supprimer</button></a></td>
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
<div class="modal fade" id="modallocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="location_post.php" method="post">
            	
        <div class="row">
              <div class="form-group col-sm-6">
                <label for="datelocation">Date Location</label>
                <input type="date" class="form-control" id = "datelocation" name="datelocation" placeholder ="Entrez la date de location">             
              </div>     
              
              <div class="form-group col-sm-6">
                <label for="duree">Durée location(heures)</label>
                <input type="number" class="form-control" id = "duree" name="duree" placeholder ="Entrez la durée">              
              </div> 

        </div>


          
          <div class="form-group">
            <label for="commentaires">Commentaires</label>
            <input type="text" class="form-control" id = "commentaires" name="commentaires" placeholder ="Entrez un commentaire">              
          </div>

          <div class="row">

          <div class="form-group col-sm-6">
          <label for="client">Client</label>
          <select class="form-control" id="client" name="client">
        
        <?php
          
            include("connexion.php");
          
            $sql2 = "SELECT * from client";
            //Prepare the query:
            $query2 = $bdd->prepare($sql2);
            //Execute the query:
           $query2->execute();
            //Assign the data which you pulled from the database (in the preceding step) to a variable.
            $results2=$query2->fetchAll(PDO::FETCH_OBJ);
            // For serial number initialization
             
            if($query2->rowCount() > 0)
            {
            //In case that the query returned at least one record, we can echo the records within a foreach loop:
            foreach($results2 as $result2)
            {
            ?>
            <option value="<?php echo htmlentities($result2->idClient) ?>"><?php echo htmlentities($result2->NomClient) ?></option>

              <?php }} ?>             
          </select> 
          </div>   


          <div class="form-group col-sm-6">

          
            <label for="velo">Velo</label>
          <select class="form-control" id="velo" name="velo">
        
        <?php
          
            include("connexion.php");
          
            $sql2 = "SELECT * from velo";
            //Prepare the query:
            $query2 = $bdd->prepare($sql2);
            //Execute the query:
           $query2->execute();
            //Assign the data which you pulled from the database (in the preceding step) to a variable.
            $results2=$query2->fetchAll(PDO::FETCH_OBJ);
            // For serial number initialization
             
            if($query2->rowCount() > 0)
            {
            //In case that the query returned at least one record, we can echo the records within a foreach loop:
            foreach($results2 as $result2)
            {
            ?>
            <option value="<?php echo htmlentities($result2->idVelo) ?>"><?php echo htmlentities($result2->nomVelo) ?></option>

              <?php }} ?>             
          </select> 
          </div>
        
          </div>

           

        <div class="form-group">
          <label for="respo">Responsable</label>
          <select class="form-control" id="respo" name="respo">
        
        <?php
          
            include("connexion.php");
          
            $sql2 = "SELECT * from responsable";
            //Prepare the query:
            $query2 = $bdd->prepare($sql2);
            //Execute the query:
           $query2->execute();
            //Assign the data which you pulled from the database (in the preceding step) to a variable.
            $results2=$query2->fetchAll(PDO::FETCH_OBJ);
            // For serial number initialization
             
            if($query2->rowCount() > 0)
            {
            //In case that the query returned at least one record, we can echo the records within a foreach loop:
            foreach($results2 as $result2)
            {
            ?>
            <option value="<?php echo htmlentities($result2->idResponsable) ?>"><?php echo htmlentities($result2->nomResponsable) ?></option>

              <?php }} ?>             
          </select> 
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