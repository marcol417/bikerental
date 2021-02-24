<?php include("entete.php"); ?>
<?php include("connexion.php"); ?>

<div class="container-fluid">
    <h1 class="mt-4">GESTION DES VELOS</h1>

    <div class="text-center">
		<button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#modalvelo"> Ajouter un Vélo </button>
	</div>

	<br />


    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-table mr-1"></i>Liste des Vélos</div>
                    <div class="card-body">
                        <div class="table-responsive">

    

	<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
		       <thead>
		                <tr>
		                    <th>Nom</th>
                        <th>Date d'achat</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Prix de location</th>
                        <th>Type</th>
                        <th>Localisation</th>
		                    <th>Edition</th> 
                        <th>Suppression</th> 
		                </tr>
		        </thead>
	  <tbody> 

        <?php
$sql = "SELECT * from velo";
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
     
    <td><?php echo htmlentities($result->nomVelo);?></td>
    <td><?php echo htmlentities($result->dateAchat);?></td>
    <td><?php echo htmlentities($result->prix);?></td>
    <td><?php echo htmlentities($result->description);?></td>
    <td><?php echo htmlentities($result->prixLocation);?></td>


        <?php

        $identifiant = $result->type_id;

        $sql = 'SELECT * FROM typevelo WHERE idType=:id';

        $statement = $bdd->prepare($sql);

        $statement->execute([':id' => $identifiant ]);

        $typo = $statement->fetch(PDO::FETCH_OBJ);
    ?>

    <td><?php echo htmlentities($typo->nomType);?></td>

   <?php

        $identifiant2 = $result->localisation_id;

        $sql = 'SELECT * FROM localisation WHERE idLocalisation=:id';

        $statement = $bdd->prepare($sql);

        $statement->execute([':id' => $identifiant2 ]);

        $localisateur = $statement->fetch(PDO::FETCH_OBJ);
    ?>


    <td><?php echo htmlentities($localisateur->nomLocalisation);?></td>

   
<td><a href="editVelo.php?id=<?php echo htmlentities($result->idVelo);?>"><button class="btn btn-info btn-sm" value="Modifier">Modifier</button></a></td>
<td><a href="deleteVelo.php?id=<?php echo htmlentities($result->idVelo);?>"><button class="btn btn-warning btn-sm" value="Supprimer" onClick="return confirm('Voulez vous vraiment supprimer ce velo ? ');">Supprimer</button></a></td>
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
<div class="modal fade" id="modalvelo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Velo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="velo_post.php" method="post">
            	
        <div class="row">
              <div class="form-group col-sm-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id = "nom" name="nom" placeholder ="Entrez le nom">             
              </div>     
              
          <div class="form-group col-sm-6">
            <label for="dateachat">Date d'achat</label>
            <input type="date" class="form-control" id = "dateachat" name="dateachat" placeholder ="Entrez la date d'achat">              
          </div> 

        </div>


        <div class="row">
          
              <div class="form-group col-sm-6">
                <label for="prix">Prix</label>
                <input type="text" class="form-control" id = "prix" name="prix" placeholder ="Entrez le prix">             
              </div>  

          <div class="form-group col-sm-6">
           <label for="description">Description</label>
           <input type="text" class="form-control" id = "description" name="description" placeholder ="Entrez la description du vélo"> 
          </div>   
        
        </div>


        <div class="row">

          <div class="form-group col-sm-6">
            <label for="prixlocation">Prix de Location </label>
            <input type="text" class="form-control" id = "prixlocation" name="prixlocation" placeholder ="Entrez le prix de location">             
          </div>  
 

          <div class="form-group col-sm-6">
          <label for="typeVelo">Type</label>
          <select class="form-control" id="typevelo" name="typevelo">
        
        <?php
          
            include("connexion.php");
          
            $sql2 = "SELECT * from typevelo";
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
            <option value="<?php echo htmlentities($result2->idType) ?>"><?php echo htmlentities($result2->nomType) ?></option>

              <?php }} ?>             
          </select> 
        </div>
        
        </div>
 
        

        <div class="form-group">
          <label for="localisation">Localisation</label>
          <select class="form-control" id="localisation" name="localisation">
        
        <?php
          
            include("connexion.php");
          
            $sql2 = "SELECT * from localisation";
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
            <option value="<?php echo htmlentities($result2->idLocalisation) ?>"><?php echo htmlentities($result2->nomLocalisation) ?></option>

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