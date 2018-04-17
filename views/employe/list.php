<?php
require_once ('./config.php');
require_once ('./models/employe.php');

$filtre = "";
if (isset ( $_GET ["query"] )) {
	$filtre = $_GET ["query"];
}

$list = employe_getList ( $filtre );

if($_SESSION['role'] == "admin"){

	if (isset ( $_GET ["sup"] )) {
		employe_supp ( $_GET ["sup"] );
		header ( 'location: http://localhost/dunord/index.php?e=employe&a=list' );
	}
	
	if (isset ( $_GET ["update"] )) {
		employe_modif ( $_GET ['nom'], $_GET ['prenom'], $_GET ['adresse'], $_GET ['telephone'] );
	}
}
?>


<h1 align="center"><font color="#0131B4">Liste des employés</font></h1>
<h3 align="center"><a href="<?php echo $root?>/index.php?e=employe&a=ajout"><font size=4 color="#5472AE">Cliquez ici pour ajouter un employe</font></a></h3>


<form method="get" action="./index.php">
	<input type="hidden" name="e" value="employe"> <input type="hidden" name="a" value="list"> 
	<font size=3> Recherche : </font>
	<input type="search" id="search" placeholder="Rechercher un employe" name="query" value="<?php echo $filtre?>">
</form>

<table border = 1 class='table' class="table table-hower">
	<tr>
		<th><font size=4 color="#6495ED">N° employe</font></th>
		<th><font size=4 color="#6495ED">Nom</font></th>
		<th><font size=4 color="#6495ED">Prénom</font></th>
		<th><font size=4 color="#6495ED">Adresse</font></th>
		<th><font size=4 color="#6495ED">Téléphone</font></th>
		<?php if($_SESSION['role'] == "admin"): ?>
			<th><font size=4 color="#6495ED">Modifier les informations</font></th>
			<th><font size=4 color="#6495ED">Suppression d'un employé</font></th>
		<?php endif; ?>
	
	</tr>
	
	<?php
	foreach ( $list as $employe ) {
		?>
	<tr>
		<td><a href="<?php echo $root;?>/index.php?e=employe&a=detail&id=<?php echo $employe->id;?>"><font size=3 color="#5472AE"><?php echo $employe->id?></font></a></td>
		<td><font size=3 ><?php echo $employe->nom?></font></td>
		<td><font size=3 ><?php echo $employe->prenom?></font></td>
		<td><font size=3 ><?php echo $employe->adresse?></font></td>
		<td><font size=3 ><?php echo $employe->telephone?></font></td>
		<?php if($_SESSION['role'] == "admin"): ?>
	
			<td><a href="<?php echo $root?>/index.php?e=employe&a=modif&id=<?php echo($employe->id) ?>"><font size=3 color="#5472AE">Modifier</font></a></td>
			<td><a href="<?php echo $root?>/index.php?e=employe&a=list&sup=<?php echo $employe->id;?>"><font size=3 color="#5472AE">Supprimer</font></a></td>
	<?php endif; ?>
	
	</tr>
	<?php
	}
	?>
</table>
