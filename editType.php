<?php
require 'connexion.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM typevelo WHERE idType=:id';
$statement = $bdd->prepare($sql);
$statement->execute([':id' => $id ]);
$typologie = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nom'])  && isset($_POST['description']) ) {
  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $sql = 'UPDATE typevelo SET nomType=:nom, descriptionType=:description WHERE idType=:id';
  $statement = $bdd->prepare($sql);
  if ($statement->execute([':nom' => $nom, ':description' => $description, ':id' => $id])) {
    header("Location: types.php");
  }

}

 ?>
<?php require 'entete.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modifier un Type de Velo</h2>
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
          <input value="<?= $typologie->nomType; ?>" type="text" name="nom" id="nom" class="form-control">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" value="<?= $typologie->descriptionType; ?>" name="description" id="description" class="form-control">
          
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Modifier le Type</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
