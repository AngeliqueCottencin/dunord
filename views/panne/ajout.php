<?php
require_once ('./config.php');
require_once ('./models/panne.php');
require_once ('./models/employe.php');

$filtre = "";
$list = employe_getList ( $filtre );
/*$cli = "";
$creation = "";
$probleme = "";
$notes = "";
$solution = "";
$facturation = "";

if (isset ( $_GET ["employe"] ) && isset ( $_GET ["creation"] ) && isset ( $_GET ["probleme"] ) && isset ( $_GET ["notes"] ) && isset ( $_GET ["solution"] ) && isset ( $_GET ["facturation"] )) {
	$cli = $_GET ["employe"];
	$creation = $_GET ["creation"];
	$probleme = $_GET ["probleme"];
	$notes = $_GET ["notes"];
	$solution = $_GET ["solution"];
	$facturation = $_GET ["facturation"];
	
	$creation_ok = inter_add ( $cli, $creation, $probleme, $notes, $solution, $facturation );
	if ($creation_ok) {
		echo ("Intervention ajouté: veuillez vous rediriger vers la liste.");
	}
}*/
if(isset($_GET["employe"]) && ($_GET["creation"]) && ($_GET["probleme"]) && ($_GET["etat"]) ){
	panne_add( $_GET["employe"], $_GET["creation"], $_GET["probleme"], $_GET["etat"]);
	header ( 'location: http://localhost/dunord/index.php?e=panne&a=list' );
}

?>
<!-- <a href="<?php echo $root?>/index.php?e=intervention&a=list"><font size=3 color="#5472AE">Retour à la liste des interventions</font></a> -->

<h1 id="form" align="center"><font color="#0131B4">Ajout d'une panne</font></h1>
<h3 id="form" align="center"><font color="#0131B4">Veuillez remplir ce formulaire pour ajouter une panne à la liste des pannes</font></h3>

<center>
	<form method="GET" action="./index.php">
		<input type="hidden" name="e" value="panne"> <input
			type="hidden" name="a" value="ajout">
		<table class="table-condensed">
			<tr>
				<td><font size=3>employe :</font></td>
				<td><font size=3><select name="employe">
				<?php foreach($list as $employe){ ?>
					<option><?php echo $employe->id?></option>
				<?php } ?>
				</select></font></td>
				<td><a href="<?=$root?>/index.php?e=employe&a=ajout"><font
						size=3 color="#5472AE">Cliquez ici pour ajouter un employé</font></a></td>
			</tr>
			<tr>
				<td><font size=3>Date de création :</font></td>
				<td><font size=3><input type="date" name="creation"
					placeholder="date de création"></font></td>
			</tr>

			<tr>
				<td><font size=3>Problème :</font></td>
				<td><font size=3><textarea name="probleme" placeholder="problème du employe"></textarea></font></td>
			</tr>
			<tr>
				<td><font size=3>Etat de la panne :</font></td>
				<td><font size=3><select name="etat">
					<option>en cours</option>
					<option>résolu</option>
					<option>non traité</option>
					<option>définitivement en panne</option>
				</select></font></td>
				
			</tr>
		</table>
		<button type="submit" name="ajout" class="btn btn-primary" id="ajout">Ajouter une panne</button>
	</form>
</center>


<h3 id="form" align="center"> <font color="#0131B4">Tableau récapitulatif des employés par rapport à leur n° employé </font></h3>
<table border = 1 class='table' class="table table-hower">
	<tr>
		<th><font size=4 color="#6495ED">N° employe</font></th>
		<th><font size=4 color="#6495ED">Nom</font></th>
		<th><font size=4 color="#6495ED">Prénom</font></th>	
	</tr>
	<?php
	foreach($list as $employe){
	?>
	<tr>
		<td><a href="<?php echo $root;?>/index.php?e=employe&a=detail&id=<?php echo $employe->id;?>"><font size=3 color="#5472AE"><?php echo $employe->id?></font></a></td>
		<td><font size=3 ><?php echo $employe->nom?></font></td>
		<td><font size=3 ><?php echo $employe->prenom?></font></td>
	</tr>
	<?php
	}
	?>
</table>