<?php

require 'connexion.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM client WHERE idClient=:id';

$statement = $bdd->prepare($sql);

$statement->execute([':id' => $id ]);

$customer = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['nomClient']) && isset($_POST['prenomClient']) && isset($_POST['dateNaissanceClient']) && isset($_POST['telephone']) && isset($_POST['emailClient']) && isset($_POST['nomVille'])) {
  $nomclient = $_POST['nomClient'];
  $prenomclient = $_POST['prenomClient'];
  $datenaissance = $_POST['dateNaissanceClient'];
  $telephone = $_POST['telephone'];
  $emailclient = $_POST['emailClient'];
  $nomville = $_POST['nomVille'];

  $sql = 'UPDATE client SET NomClient=:nomclient, prenomClient=:prenomclient, dateNaissanceClient=:datenaissance, telephone=:telephone, emailClient=:emailclient, ville_id=:nomville WHERE idClient=:id';
  
  $statement = $bdd->prepare($sql);
  
  if ($statement->execute([':nomclient' => $nomclient, ':prenomclient' => $prenomclient, ':datenaissance' => $datenaissance, ':telephone' => $telephone, ':emailclient' => $emailclient, ':nomville' => $nomville, ':id' => $id])) {
    header("Location: clients.php");
  }

}

 ?>
<?php require 'entete.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modifier un Client</h2>
    </div>

    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
    
      <form method="post">
        
        <div class="form-group">
          <label for="nom">Nom Client</label>
          <input value="<?= $customer->NomClient; ?>" type="text" name="nomClient" id="nomClient" class="form-control">
        </div>        


        <div class="form-group">
          <label for="nom">Prénom Client</label>
          <input value="<?= $customer->prenomClient; ?>" type="text" name="prenomClient" id="prenomClient" class="form-control">
        </div>        

        <div class="form-group">
          <label for="nom">Date de naissance</label>
          <input value="<?= $customer->dateNaissanceClient; ?>" type="date" name="dateNaissanceClient" id="dateNaissanceClient" class="form-control">
        </div>        

        <div class="form-group">
          <label for="nom">Téléphone </label>
          <input value="<?= $customer->telephone; ?>" type="text" name="telephone" id="telephone" class="form-control">
        </div>        


        <div class="form-group">
          <label for="nom">Email</label>
          <input value="<?= $customer->emailClient; ?>" type="text" name="emailClient" id="emailClient" class="form-control">
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
          <button type="submit" class="btn btn-info">Modifier le Client</button>
        </div>
      
      </form>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>
