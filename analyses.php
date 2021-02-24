<?php include("entete.php"); ?>
<?php include("connexion.php"); ?>



<div class="container-fluid">
    <h1 class="mt-4">ANALYSES STATISTIQUES</h1>


	<br />


    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-table mr-1"></i>Statistiques</div>
                    <div class="card-body">
                        <div class="table-responsive">

    

	<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
		       <thead>
		                <tr>
		                    <th>Elements</th>
		                    <th>Resultats</th> 
		                </tr>
		        </thead>
	  <tbody> 

<!-- Display Records -->
    <tr>
    <td>Nombre de velos dont le prix d'achat est supérieux à 60 000 XAF</td>

    <?php   
    foreach($bdd->query('SELECT COUNT(*) AS total FROM velo WHERE prix > 60000') as $row) {
      ?>
      <td> <?php echo $row['total'] ?> </td>
      
    <?php }?>
    </tr>

    <tr>
      <td>Nombre de velos dont le prix de location est inférieur à 15 000 XAF</td>
      <?php   
      foreach($bdd->query('SELECT COUNT(*) AS locat FROM velo WHERE prixLocation < 15000') as $row) {
        ?>
        <td> <?php echo $row['locat'] ?> </td>

      <?php }?>
    </tr>


    <tr>
      <td>Coût moyen d'une location</td>
      <?php   
      foreach($bdd->query('SELECT AVG(prixLocation) AS costlo FROM velo') as $row) {
        ?>
        <td> <?php echo $row['costlo'] ?> </td>

      <?php }?>
    </tr>

    <tr>
      <td>Montant total des locations de vélo</td>
            <?php   
      foreach($bdd->query('SELECT SUM(prixLocation) AS somme FROM velo') as $row) {
        ?>
        <td> <?php echo $row['somme'] ?> </td>

      <?php }?>
    </tr>


    <tr>
      <td>Plus longue durée de location</td>
            <?php   
      foreach($bdd->query('SELECT MAX(dureeLocation) AS test FROM location') as $row) {
        ?>
        <td> <?php echo $row['test'] . " (Soit " . (int)(($row['test'])/24) . " Jours) "  ?> </td>

      <?php }?>
    </tr>

     





  
	  </tbody> 
	</table>

	</div>
</div>
</div>

    
 </div>


 
<?php include("footer.php"); ?>