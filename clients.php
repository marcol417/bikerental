<?php include("entete.php"); ?>
<?php include("connexion.php"); ?>

<div class="container-fluid">
    <h1 class="mt-4">GESTION DES CLIENTS</h1>

    <div class="text-center">
		<button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#modalclient"> Ajouter un Client </button>
	</div>

	<br />


    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-table mr-1"></i>Liste des Clients</div>
                    <div class="card-body">
                        <div class="table-responsive">

    

	<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
		       <thead>
		                <tr>
		                    <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Ville</th>
		                    <th>Edition</th> 
                        <th>Suppression</th> 
		                </tr>
		        </thead>
	  <tbody> 

        <?php
$sql = "SELECT * from client";
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
     
    <td><?php echo htmlentities($result->NomClient);?></td>
    <td><?php echo htmlentities($result->prenomClient);?></td>
    <td><?php echo htmlentities($result->dateNaissanceClient);?></td>
    <td><?php echo htmlentities($result->telephone);?></td>
    <td><?php echo htmlentities($result->emailClient);?></td>

        <?php

        $identifiant = $result->ville_id;

        $sql = 'SELECT * FROM ville WHERE idVille=:id';

        $statement = $bdd->prepare($sql);

        $statement->execute([':id' => $identifiant ]);

        $ville = $statement->fetch(PDO::FETCH_OBJ);
    ?>

    <td><?php echo htmlentities($ville->NomVille);?></td>

        

<td><a href="editClient.php?id=<?php echo htmlentities($result->idClient);?>"><button class="btn btn-info btn-sm" value="Modifier">Modifier</button></a></td>
<td><a href="deleteClient.php?id=<?php echo htmlentities($result->idClient);?>"><button class="btn btn-warning btn-sm" value="Supprimer" onClick="return confirm('Voulez vous vraiment supprimer ? ');">Supprimer</button></a></td>
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
<div class="modal fade" id="modalclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="client_post.php" method="post">
            	
        <div class="row">
              <div class="form-group col-sm-6">
                <label for="nomClient">Nom</label>
                <input type="text" class="form-control" id = "nomClient" name="nomClient" placeholder ="Entrez le nom">             
              </div>     
              
              <div class="form-group col-sm-6">
                <label for="prenomClient">Prénom</label>
                <input type="text" class="form-control" id = "prenomClient" name="prenomClient" placeholder ="Entrez le prénom">              
              </div> 

        </div>


        <div class="row">
          
          <div class="form-group col-sm-6">
            <label for="dateNaissanceClient">Date de Naissance</label>
            <input type="date" class="form-control" id = "dateNaissanceClient" name="dateNaissanceClient" placeholder ="Entrez la date de naissance">              
          </div>

          <div class="form-group col-sm-6">
           <label for="telephone">Téléphone</label>
           <input type="text" class="form-control" id = "telephone" name="telephone" placeholder ="Entrez le Téléphone"> 
          </div>   
        
        </div>

    

        <div class="form-group">
          <label for="emailClient">Email</label>
          <input type="email" class="form-control" id = "emailClient" name="emailClient" placeholder ="Entrez l'email">              
        </div>          


        <div class="form-group">
          <label for="nomVille">Ville</label>
          <select class="form-control" id="nomVille" name="nomVille">
        
        <?php
          
            include("connexion.php");
          
            $sql2 = "SELECT * from ville";
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
            <option value="<?php echo htmlentities($result2->idVille) ?>"><?php echo htmlentities($result2->NomVille) ?></option>

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