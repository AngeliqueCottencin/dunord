<?php
if($_SESSION['role'] == "admin"){

	require_once ('./config.php');
	require_once ('./models/employe.php');
	require_once ('./models/machine.php');
	require_once ('./models/panne.php');
	
	$filtre = "";
	$list = panne_getList ( $filtre );
	
	$panne = "";
	$type = "";
	$marque = "";
	$couleur = "";
	$reference = "";
	
	if (isset ( $_GET ["id"] )) {
		$machine = uneMachine ( $_GET ["id"] );
		$id = $machine->id;
		$panne = $machine->id_panne;
		$type = $machine->type;
		$marque = $machine->marque;
		$couleur = $machine->couleur;
		$reference = $machine->reference;
		
		if (isset ( $_GET ["panne"] ) && isset ( $_GET ["type"] ) && isset ( $_GET ["marque"] ) && isset ( $_GET ["couleur"] ) && isset ( $_GET ["reference"] )) {
			$panne = $_GET ["panne"];
			$type = $_GET ["type"];
			$marque = $_GET ["marque"];
			$couleur = $_GET ["couleur"];
			$reference = $_GET ["reference"];
			$modif_ok = machine_modif ( $id, $panne, $type, $marque, $couleur, $reference );
			if ($modif_ok) {
				header ( 'location: http://localhost/dunord/index.php?e=machine&a=list' );
			}
		}
	}
	
	?>
	
<!-- <a href="<?php echo $root?>/index.php?e=machine&a=list"><font size=3 color="#5472AE"> Retour à la liste des machines</font></a> -->
	
<h1 id="form" align="center"> <font color="#0131B4">Modification des informations concernant une machine</font></h1>
<h3 id="form" align="center"><font color="#0131B4">Veuillez modifier uniquement les données concernées</font></h3>

<center>
	<form method="GET" action="./index.php">
		<input type="hidden" name="e" value="machine"> <input type="hidden"
			name="a" value="modif">
		<table class="table-condensed">
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $id ?>"></td>
			</tr>
			<tr>
				<td><font size=3>N° de la panne :</font></td>
				<td><font size=3><select name="panne">
				<?php foreach($list as $pannes){?>
					<option value="<?php echo $panne?>"><?php echo $pannes->id?></option>
				<?php } ?>
				</select></font></td>
				<td><a href="<?php echo $root?>/index.php?e=panne&a=ajout"><font size=3 color="#5472AE"> Cliquez
						ici pour ajouter une panne </font></a></td>
			</tr>
			<tr>
				<td><font size=3>Type de machine :</font></td>
				<td><font size=3><input type="text" name="type" value="<?php echo $type?>"
					placeholder="type de machine"></font></td>
			</tr>
			<tr>
				<td><font size=3>Marque de la machine :</font></td>
				<td><font size=3><input type="text" name="marque" value="<?php echo $marque?>"
					placeholder="marque de la machine"></font></td>
			</tr>
			<tr>
				<td><font size=3>Couleur de la machine :</font></td>
				<td><font size=3><input type="text" name="couleur" value="<?php echo $couleur?>"
					placeholder="couleur de la machine"></font></td>
			</tr>
			<tr>
				<td><font size=3>Réference de la machine :</font></td>
				<td><font size=3><input type="text" name="reference"
					value="<?php echo $reference?>"
					placeholder="référence de la machine"></font></td>
			</tr>

		</table>
		  <button type="submit" name="update" class="btn btn-primary" id="update"> Valider les modifications </button>
		
	</form>
</center>

<h3 id="form" align="center"> <font color="#0131B4">Tableau récapitulatif des pannes par rapport au n°
de la panne</font></h3>
<table border = 1 class='table' class="table table-hower">
	<tr>
		<th><font size=4 color="#6495ED">N° de la panne</font></th>
		<th><font size=4 color="#6495ED">Date de création</font></th>
		<th><font size=4 color="#6495ED">Nom et prénom du employe concerné</font></th>
		<th><font size=4 color="#6495ED">Problème</font></th>
	</tr>
	<?php
	foreach ( $list as $pannes ) {
		?>

	<tr>
		<td><a
			href="<?php echo $root;?>/index.php?e=panne&a=detail&id=<?php echo $pannes->id;?>"><font size=3 color="#5472AE">
		<?php echo $pannes->id?></font></a></td>
		<td><font size=3><?php echo $pannes->creation?></font></td>
		<td><a href="<?php echo $root;?>/index.php?e=employe&a=detail&id=<?php echo $pannes->id_employe;?>"><font size=3 color="#5472AE"><?php echo $pannes->id_employe?></font></a></td>
		<td><font size=3><?php echo $pannes->probleme?></font></td>
	</tr>
	<?php
	}
	?>
</table>

<?php } else {
	echo(" Vous n'avez pas la permission ! ");
} 
?>