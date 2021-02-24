<?php

require 'connexion.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM responsable WHERE idResponsable=:id';

$statement = $bdd->prepare($sql);

$statement->execute([':id' => $id ]);

$respo = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['datenaiss']) && isset($_POST['telephone']) && isset($_POST['emailResp']) && isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['localisation'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $datenaissance = $_POST['datenaiss'];
  $telephone = $_POST['telephone'];
  $emailresp = $_POST['emailResp'];
  $login = $_POST['login'];
  $pass = $_POST['pass'];
  $localisation = $_POST['localisation'];

  $sql = 'UPDATE responsable SET nomResponsable=:nom, prenomResponsable=:prenom, dateNaissanceResponsable=:datenaissance, telephoneResponsable=:telephone, emailResponsable=:emailresp, login=:login, passwordResponsable=:pass, localisation_id=:localisation WHERE idResponsable=:id';
  
  $statement = $bdd->prepare($sql);
  
  if ($statement->execute([':nom' => $nom, ':prenom' => $prenom, ':datenaissance' => $datenaissance, ':telephone' => $telephone, ':emailresp' => $emailresp, ':login' => $login, ':pass' => $pass, ':localisation' => $localisation, ':id' => $id])) {
    header("Location: responsables.php");
  }

}

 ?>
<?php require 'entete.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modifier un Responsable</h2>
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
                <input value="<?= $respo->nomResponsable; ?>" type="text" class="form-control" id = "nom" name="nom" placeholder ="Entrez le nom">             
              </div>     
              
              <div class="form-group col-sm-6">
                <label for="prenom">Prénom</label>
                <input value="<?= $respo->prenomResponsable; ?>" type="text" class="form-control" id = "prenom" name="prenom" placeholder ="Entrez le prénom">              
              </div> 

        </div>


        <div class="row">
          
          <div class="form-group col-sm-6">
            <label for="datenaiss">Date de Naissance</label>
            <input value="<?= $respo->dateNaissanceResponsable; ?>" type="date" class="form-control" id = "datenaiss" name="datenaiss" placeholder ="Entrez la date de naissance">              
          </div>

          <div class="form-group col-sm-6">
           <label for="telephone">Téléphone</label>
           <input value="<?= $respo->telephoneResponsable; ?>" type="text" class="form-control" id = "telephone" name="telephone" placeholder ="Entrez le Téléphone"> 
          </div>   
        
        </div>

    

        <div class="form-group">
          <label for="emailResp">Email</label>
          <input value="<?= $respo->emailResponsable; ?>" type="email" class="form-control" id = "emailResp" name="emailResp" placeholder ="Entrez l'email">              
        </div>       


        <div class="row">
          
          <div class="form-group col-sm-6">
            <label for="login">Login</label>
            <input value="<?= $respo->login; ?>" type="text" class="form-control" id = "login" name="login" placeholder ="Choisissez un login">              
          </div>

          <div class="form-group col-sm-6">
           <label for="pass">Password</label>
           <input value="<?= $respo->passwordResponsable; ?>" type="password" class="form-control" id = "pass" name="pass" placeholder ="Choisissez un mot de passe"> 
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
          <button type="submit" class="btn btn-info">Modifier le Responsable</button>
        </div>
      
      </form>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>
