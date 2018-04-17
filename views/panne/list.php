<?php

require_once ('./config.php');
require_once ('./models/panne.php');
require_once ('./models/employe.php');

$filtre = "";
if (isset ( $_GET ["query"] )) {
	$filtre = $_GET ["query"];
}
	
$list = panne_getList ( $filtre );
	
if($_SESSION['role'] == "admin"){
	
	if (isset ( $_GET ["sup"] )) {
		panne_supp ( $_GET ["sup"] );
		header ( 'location: http://localhost/dunord/index.php?e=panne&a=list' );
	}
		
	if (isset ( $_GET ["update"] )) {
		panne_modif ( $_GET ['cli'], $_GET ['creation'], $_GET ['probleme'], $_GET ['etat'] );
	}
}
?>

<h1 align="center"><font color="#0131B4">Liste des pannes</font></h1>
<h3 align="center"><a href="<?php echo $root?>/index.php?e=panne&a=ajout"><font size=4 color="#5472AE">Cliquez ici pour ajouter une panne</font></a></h3>

<form method="get" action="./index.php">
	<input type="hidden" name="e" value="panne">
	<input type="hidden" name="a" value="list">
Recherche : <input type="search" id="search" name="query" value="<?php echo $filtre?>" placeholder="Rechercher une panne">
</form>


<table border = 1 class='table' class="table table-hower">
	<tr>
		<th><font size=4 color="#6495ED">N° de la panne</font></th>
		<th><font size=4 color="#6495ED">Date de création</font></th>
		<th><font size=4 color="#6495ED">Employé concerné</font></th>
		<th><font size=4 color="#6495ED">Problème</font></th>
		<th><font size=4 color="#6495ED">Etat de la panne</font></th>
		<?php if($_SESSION['role'] == "admin"): ?>
		
			<th><font size=4 color="#6495ED">Modifier les informations</font></th>
			<th><font size=4 color="#6495ED">Suppression d'une panne</font></th>
		<?php endif; ?>
	
	</tr>
	
	<?php
	foreach($list as $panne){
	?>
	<tr>
		<td><a href="<?php echo $root?>/index.php?e=panne&a=detail&id=<?php echo $panne->id?>"><font size=3 color="#5472AE"><?php echo $panne->id?></font></a></td>
		<td><font size=3 ><?php echo $panne->creation?></font></td>
		<td><a href="<?php echo $root?>/index.php?e=employe&a=detail&id=<?php echo $panne->id_employe?>"><font size=3 color="#5472AE"><?php echo employe_getLabel($panne->id_employe)?></font></a></td>
		<td><font size=3 ><?php echo $panne->probleme?></font></td>
		<td><font size=3 ><?php echo $panne->etat?></font></td>
		<?php if($_SESSION['role'] == "admin"): ?>
		
			<td><a href="<?php echo $root?>/index.php?e=panne&a=modif&id=<?php echo($panne->id) ?>"><font size=3 color="#5472AE">Modifier</font></a></td>
			<td><a href="<?php echo $root?>/index.php?e=panne&a=list&sup=<?php echo $panne->id;?>"><font size=3 color="#5472AE">Supprimer</font></a></td>
	
	<?php endif; ?>
	
	</tr>
	<?php
	}
	?>
</table>