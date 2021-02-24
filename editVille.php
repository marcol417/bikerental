<?php
require 'connexion.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM ville WHERE idVille=:id';
$statement = $bdd->prepare($sql);
$statement->execute([':id' => $id ]);
$town = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['codepostal'])  && isset($_POST['ville']) ) {
  $codepostal = $_POST['codepostal'];
  $ville = $_POST['ville'];
  $sql = 'UPDATE ville SET codePostal=:codepostal, NomVille=:ville WHERE idVille=:id';
  $statement = $bdd->prepare($sql);
  if ($statement->execute([':codepostal' => $codepostal, ':ville' => $ville, ':id' => $id])) {
    header("Location: villes.php");
  }

}

 ?>
<?php require 'entete.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Code postal</label>
          <input value="<?= $town->codePostal; ?>" type="text" name="codepostal" id="codepostal" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Ville</label>
          <!-- <input type="email" value="<?= $town->NomVille; ?>" name="ville" id="ville" class="form-control"> -->
          
          <select class="form-control" id="ville" name="ville">
            <option><?= $town->NomVille; ?></option>
            <option>Douala</option>
            <option>Yaounde</option>
            <option>Bafoussam</option>
            <option>Garoua</option>
            <option>Kribi</option>
            <option>Edea</option>             
        </select>  


        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update Town</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
