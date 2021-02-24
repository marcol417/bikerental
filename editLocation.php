<?php

require 'connexion.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM location WHERE idLocation=:id';

$statement = $bdd->prepare($sql);

$statement->execute([':id' => $id ]);

$locate = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['datelocation']) && isset($_POST['duree']) && isset($_POST['commentaires']) && isset($_POST['client']) && isset($_POST['velo']) && isset($_POST['respo'])) {
  $datelocation = $_POST['datelocation'];
  $duree = $_POST['duree'];
  $commentaires = $_POST['commentaires'];
  $client = $_POST['client'];
  $velo = $_POST['velo'];
  $respo = $_POST['respo'];

  $sql = 'UPDATE location SET dateLocation=:datelocation, dureeLocation=:duree, commentaires=:commentaires, client_id=:client, velo_id=:velo, responsable_id=:respo WHERE idLocation=:id';
  
  $statement = $bdd->prepare($sql);
  
  if ($statement->execute([':datelocation' => $datelocation, ':duree' => $duree, ':commentaires' => $commentaires, ':client' => $client, ':velo' => $velo, ':respo' => $respo, ':id' => $id])) {
    header("Location: locations.php");
  }

}

 ?>
<?php require 'entete.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modifier une Location</h2>
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
                <label for="datelocation">Date Location</label>
                <input value="<?= $locate->dateLocation; ?>" type="date" class="form-control" id = "datelocation" name="datelocation" placeholder ="Entrez la date de location">             
              </div>     
              
              <div class="form-group col-sm-6">
                <label for="duree">Durée location(heures)</label>
                <input value="<?= $locate->dureeLocation; ?>" type="number" class="form-control" id = "duree" name="duree" placeholder ="Entrez la durée">              
              </div> 

        </div>
         
          <div class="form-group">
            <label for="commentaires">Commentaires</label>
            <input value="<?= $locate->commentaires; ?>" type="text" class="form-control" id = "commentaires" name="commentaires" placeholder ="Entrez un commentaire">              
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
    
        <div class="form-group">
          <button type="submit" class="btn btn-info">Modifier le Client</button>
        </div>
        
        </form>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>
