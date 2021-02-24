<?php

require 'connexion.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM velo WHERE idVelo=:id';

$statement = $bdd->prepare($sql);

$statement->execute([':id' => $id ]);

$bicycle = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['nom']) && isset($_POST['dateachat']) && isset($_POST['prix']) && isset($_POST['description']) && isset($_POST['prixlocation']) && isset($_POST['typevelo']) && isset($_POST['localisation'])) {
  $nom = $_POST['nom'];
  $dateachat = $_POST['dateachat'];
  $prix = $_POST['prix'];
  $description = $_POST['description'];
  $prixlocation = $_POST['prixlocation'];
  $typevelo = $_POST['typevelo'];
  $localisation = $_POST['localisation'];

  $sql = 'UPDATE velo SET nomVelo=:nom, dateAchat=:dateachat, prix=:prix, description=:description, prixLocation=:prixlocation, type_id=:typevelo, localisation_id=:localisation WHERE idVelo=:id';
  
  $statement = $bdd->prepare($sql);
  
  if ($statement->execute([':nom' => $nom, ':dateachat' => $dateachat, ':prix' => $prix, ':description' => $description, ':prixlocation' => $prixlocation, ':typevelo' => $typevelo, ':localisation' => $localisation, ':id' => $id])) {
    header("Location: velos.php");
  }

}

 ?>
<?php require 'entete.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modifier un Velo</h2>
    </div>

    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
    
      <form method="post">
              
        <div class="row">
              <div class="form-group col-sm-6">
                <label for="nom">Nom</label>
                <input value="<?= $bicycle->nomVelo; ?>" type="text" class="form-control" id = "nom" name="nom" placeholder ="Entrez le nom">             
              </div>     
              
          <div class="form-group col-sm-6">
            <label for="dateachat">Date d'achat</label>
            <input value="<?= $bicycle->dateAchat; ?>" type="date" class="form-control" id = "dateachat" name="dateachat" placeholder ="Entrez la date d'achat">              
          </div> 

        </div>


        <div class="row">
          
              <div class="form-group col-sm-6">
                <label for="prix">Prix</label>
                <input value="<?= $bicycle->prix; ?>" type="text" class="form-control" id = "prix" name="prix" placeholder ="Entrez le prix">             
              </div>  

          <div class="form-group col-sm-6">
           <label for="description">Description</label>
           <input value="<?= $bicycle->description; ?>" type="text" class="form-control" id = "description" name="description" placeholder ="Entrez la description du vélo"> 
          </div>   
        
        </div>


        <div class="row">

          <div class="form-group col-sm-6">
            <label for="prixlocation">Prix de Location </label>
            <input value="<?= $bicycle->prixLocation; ?>" type="text" class="form-control" id = "prixlocation" name="prixlocation" placeholder ="Entrez le prix de location">             
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

    
        <div class="form-group">
          <button type="submit" class="btn btn-info">Modifier le Velo</button>
        </div>
        </form>
    


    </div>
  </div>
</div>

<?php require 'footer.php'; ?>
