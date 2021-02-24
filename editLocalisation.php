<?php

require 'connexion.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM localisation WHERE idLocalisation=:id';

$statement = $bdd->prepare($sql);

$statement->execute([':id' => $id ]);

$localiser = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['nomLocalisation']) && isset($_POST['descriptionLocalisation']) && isset($_POST['nomVille'])) {
  $nom = $_POST['nomLocalisation'];
  $description = $_POST['descriptionLocalisation'];
  $nomville = $_POST['nomVille'];

  $sql = 'UPDATE localisation SET nomLocalisation=:nom, descriptionLocalisation=:description, ville_id=:nomville WHERE idLocalisation=:id';
  
  $statement = $bdd->prepare($sql);
  
  if ($statement->execute([':nom' => $nom, ':description' => $description, ':nomville' => $nomville, ':id' => $id])) {
    header("Location: localisations.php");
  }

}

 ?>
<?php require 'entete.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modifier une localisation</h2>
    </div>

    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
    
      <form method="post">
        
        <div class="form-group">
          <label for="nom">Nom</label>
          <input value="<?= $localiser->nomLocalisation; ?>" type="text" name="nomLocalisation" id="nomLocalisation" class="form-control">
        </div>        


        <div class="form-group">
          <label for="nom">Description</label>
          <input value="<?= $localiser->descriptionLocalisation; ?>" type="text" name="descriptionLocalisation" id="descriptionLocalisation" class="form-control">
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

        
        <div class="form-group">
          <button type="submit" class="btn btn-info">Modifier la localisation</button>
        </div>
      
      </form>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>
