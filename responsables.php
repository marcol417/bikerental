<?php include("entete.php"); ?>
<?php include("connexion.php"); ?>

<div class="container-fluid">
    <h1 class="mt-4">GESTION DES RESPONSABLES</h1>

    <div class="text-center">
		<button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#modalresponsable"> Ajouter un Responsable </button>
	</div>

	<br />


    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-table mr-1"></i>Liste des Responsables</div>
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
                        <th>Login</th>
                        <th>Password</th>
                        <th>Localisation</th>
		                    <th>Edition</th> 
                        <th>Suppression</th> 
		                </tr>
		        </thead>
	  <tbody> 

        <?php
$sql = "SELECT * from responsable";
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
     
    <td><?php echo htmlentities($result->nomResponsable);?></td>
    <td><?php echo htmlentities($result->prenomResponsable);?></td>
    <td><?php echo htmlentities($result->dateNaissanceResponsable);?></td>
    <td><?php echo htmlentities($result->telephoneResponsable);?></td>
    <td><?php echo htmlentities($result->emailResponsable);?></td>
    <td><?php echo htmlentities($result->login);?></td>
    <td><?php echo htmlentities($result->passwordResponsable);?></td>
    
    <?php

        $identifiant = $result->localisation_id;

        $sql = 'SELECT * FROM localisation WHERE idLocalisation=:id';

        $statement = $bdd->prepare($sql);

        $statement->execute([':id' => $identifiant ]);

        $loc = $statement->fetch(PDO::FETCH_OBJ);
    ?>


    <td><?php echo htmlentities($loc->nomLocalisation);?></td>

   

<td><a href="editResponsable.php?id=<?php echo htmlentities($result->idResponsable);?>"><button class="btn btn-info btn-sm" value="Modifier">Modifier</button></a></td>
<td><a href="deleteResponsable.php?id=<?php echo htmlentities($result->idResponsable);?>"><button class="btn btn-warning btn-sm" value="Supprimer" onClick="return confirm('Voulez vous vraiment supprimer ce responsable ? ');">Supprimer</button></a></td>
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
<div class="modal fade" id="modalresponsable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Responsable</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="responsable_post.php" method="post">
            	
        <div class="row">
              <div class="form-group col-sm-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id = "nom" name="nom" placeholder ="Entrez le nom">             
              </div>     
              
              <div class="form-group col-sm-6">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id = "prenom" name="prenom" placeholder ="Entrez le prénom">              
              </div> 

        </div>


        <div class="row">
          
          <div class="form-group col-sm-6">
            <label for="datenaiss">Date de Naissance</label>
            <input type="date" class="form-control" id = "datenaiss" name="datenaiss" placeholder ="Entrez la date de naissance">              
          </div>

          <div class="form-group col-sm-6">
           <label for="telephone">Téléphone</label>
           <input type="text" class="form-control" id = "telephone" name="telephone" placeholder ="Entrez le Téléphone"> 
          </div>   
        
        </div>

    

        <div class="form-group">
          <label for="emailResp">Email</label>
          <input type="email" class="form-control" id = "emailResp" name="emailResp" placeholder ="Entrez l'email">              
        </div>       


        <div class="row">
          
          <div class="form-group col-sm-6">
            <label for="login">Login</label>
            <input type="text" class="form-control" id = "login" name="login" placeholder ="Choisissez un login">              
          </div>

          <div class="form-group col-sm-6">
           <label for="pass">Password</label>
           <input type="password" class="form-control" id = "pass" name="pass" placeholder ="Choisissez un mot de passe"> 
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