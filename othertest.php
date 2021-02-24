<!-- <?php include("entete.php"); ?>
<?php include("connexion.php"); ?>


<?php

$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        
        $codePostal = isset($_POST['codePostal']) ? $_POST['codePostal'] : '';
        $nomVille = isset($_POST['NomVille']) ? $_POST['NomVille'] : '';
 
        // Update the record
        $stmt = $bdd->prepare('UPDATE ville SET codePostal = ?, NomVille = ? WHERE id = ?');
        $stmt->execute([$codePostal, $nomVille, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $bdd->prepare('SELECT * FROM ville WHERE idVille = ?');
    $stmt->execute([$_GET['id']]);
    $ville = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$ville) {
        exit('Ville doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>


<div class="content update">
    <h2>Update Ville #<?=$ville['idVille']?></h2>


            <form action="editVille.php?id=<?=$ville['idVille']?>" method="post">
                <div class="form-group">
                    <label for="codePostal">Code Postal</label>
                    <input type="text" class="form-control" id = "codePostal" name="codePostal" value="<?=$ville['codePostal']?>" name="">               
                </div>              

                <div class="form-group">
                    <label for="nomVille">Ville</label>
                    <!-- <input type="text" class="form-control" id = "codePostal" placeholder ="Entrez la ville" name=""> -->
                    <select class="form-control" id="ville" name="ville">
                        <option><?=$ville['NomVille']?></option>
                        <option>Douala</option>
                        <option>Yaounde</option>
                        <option>Bafoussam</option>
                        <option>Garoua</option>
                        <option>Kribi</option>
                        <option>Edea</option>
                        
                    </select>               
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
        </form>


<!--     <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="id" placeholder="1" value="<?=$contact['id']?>" id="id">
        <input type="text" name="name" placeholder="John Doe" value="<?=$contact['name']?>" id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="email" placeholder="johndoe@example.com" value="<?=$contact['email']?>" id="email">
        <input type="text" name="phone" placeholder="2025550143" value="<?=$contact['phone']?>" id="phone">
        <label for="title">Title</label>
        <label for="created">Created</label>
        <input type="text" name="title" placeholder="Employee" value="<?=$contact['title']?>" id="title">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i', strtotime($contact['created']))?>" id="created">
        <input type="submit" value="Update">
    </form> -->
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?php include("footer.php"); ?>
 -->



<?php
    $response = $bdd->query('SELECT * FROM ville');
    $response->setFetchMode(PDO::FETCH_ASSOC);
    ?>

