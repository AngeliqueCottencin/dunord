<?php
	require_once ('./config.php');
	require_once ('./models/employe.php');
	require_once ('./models/machine.php');
	require_once ('./models/panne.php');
	
	$filtre = "";
	$list = employe_getList ( $filtre );
	
	$employe = "";
	$creation = "";
	$probleme = "";
	$etat = "";

	
	if (isset ( $_GET ["id"] )) {
		$panne = unePanne ( $_GET ["id"] );
		$id = $panne->id;
		$emplo = $panne->id_employe;
		$creation = $panne->creation;
		$probleme = $panne->probleme;
		$etat = $panne->etat;
		
		if (isset ( $_GET ["emplo"] ) && isset ( $_GET ["creation"] ) && isset ( $_GET ["probleme"] ) && isset ( $_GET ["etat"] ) ) {
			$employe = $_GET ["employe"];
			$creation = $_GET ["creation"];
			$probleme = $_GET ["probleme"];
			$etat = $_GET ["etat"];
			
			$modif_ok = panne_modif ( $id, $emplo, $creation, $probleme, $etat );
			if ($modif_ok) {
				header ( 'location: http://localhost/dunord/index.php?e=panne&a=list' );
			}
		}
	}
	
	?>
<!--<a href="<?php echo $root?>/index.php?e=panne&a=list"><font size=3 color="#5472AE"> Retour à la liste des pannes</font></a>-->
<h1 id="form" align="center"> <font color="#0131B4">Modification des informations concernant une panne</font></h1>
<h3 id="form" align="center"><font color="#0131B4">Veuillez modifier uniquement les données concernées</font></h3>

<center>
	<form method="GET" action="./index.php">
		<input type="hidden" name="e" value="panne"> <input
			type="hidden" name="a" value="modif">
		<table class="table-condensed">
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $id ?>"></td>
			</tr>
			<tr>
				<td><font size=3>employé :</font></td>
				<td><font size=3><select name="emplo">
				<?php foreach($list as $employe){ ?>
					<option value="<?php echo $emplo?>"><?php echo $employe->id?></option>
				<?php } ?>
				</select></font></td>
				<td><a href="<?php echo $root?>/index.php?e=employe&a=ajout"><font size=3 color="#5472AE">Cliquez ici pour ajouter un employe</font></a></td>
			</tr>
			<tr>
				<td><font size=3>Date de création :</font></td>
				<td><font size=3><input type="date" name="creation"
					value="<?php echo $creation?>" placeholder="date de création"></font></td>
			</tr>
			<tr>
				<td><font size=3>Problème :</font></td>
				<td><font size=3><textarea name="probleme" placeholder="problème du employe"><?php echo $probleme?></textarea></font></td>
			</tr>
			<tr>
				<td><font size=3>Etat :</font></td>
				<td><font size=3><select name="etat">
					<option value="<?php echo $etat?>"><?php  echo $etat ?></option>
					<option>en cours</option>
					<option>résolu</option>
					<option>non traité</option>
					<option>définitivement en panne</option>
				</select></font></td>			
			</tr>
		</table>
		<button type="submit" name="update" class="btn btn-primary" id="update">Valider les modifications</button>
	</form>
</center>


<h3 id="form" align="center"> <font color="#0131B4">Tableau récapitulatif des employés par rapport à leur n° employé</font></h3>
<table border = 1 class='table' class="table table-hower">
	<tr>
		<th><font size=4 color="#6495ED">N° employé</font></th>
		<th><font size=4 color="#6495ED">Nom</font></th>
		<th><font size=4 color="#6495ED">Prénom</font></th>
	</tr>
	<?php
	foreach ( $list as $employe ) {
		?>
	<tr>
		<td><a href="<?php echo $root;?>/index.php?e=employe&a=detail&id=<?php echo $employe->id;?>"><font size=3 color="#5472AE"><?php echo $employe->id?></font>
		</a></td>
		<td><font size=3 ><?php echo $employe->nom?></font></td>
		<td><font size=3 ><?php echo $employe->prenom?></font></td>
	</tr>
	<?php
	}
	?>
</table>
