<?php
require_once('./config.php');
require_once('./models/panne.php');
require_once('./models/employe.php');
require_once('./models/machine.php');


$panne = panne_getByID($_GET["id"]);
$list = machine_getListByIDPanne($_GET["id"]);
?>
<!-- <a href="<?php echo $root?>/index.php?e=panne&a=list"><font size=3 color="#5472AE">Retour à la liste des pannes</font></a> -->

<h1 id="details" align="center"><font color="#0131B4">Détail d'une panne</font></h1>
<center>
	<form>
		<table class="table-condensed">
			<tr>
				<td><font size=4 color="#6495ED">N° de la panne :</font></td>
				<td><font size=3><?php echo $panne->id?></font></td>
			</tr>
			<tr>
				<td><font size=4 color="#6495ED">Date de création :</font></td>
				<td><font size=3><?php echo $panne->creation?></font></td>
			</tr>
			<tr>
				<td><font size=4 color="#6495ED">Client :</font></td>
				<td><a
					href="<?php echo $root?>/index.php?e=client&a=detail&id=<?php echo $panne->id_client?>">
						<font size=3 color="#5472AE"><?php echo client_getLabel($panne->id_client)?></font>
				</a></td>
			</tr>
			<tr>
				<td><font size=4 color="#6495ED">Problème :</font></td>
				<td><font size=3><?php echo $panne->probleme?></font></td>
			</tr>
			<tr>
				<td><font size=4 color="#6495ED">Etat de la panne :</font></td>
				<td><font size=3><?php echo $panne->etat?></font></td>
			</tr>
			
		</table>
	</form>
</center>


<h3 id="details" align="center"><font color="#0131B4">Liste des machines qui concernent cette panne</font><a href="<?php echo $root?>/index.php?e=machine&a=list"><font size=3 color="#5472AE">(Accès à la liste complète des machines)</font></a></h3>
<h3 align="center"><a href="<?php echo $root?>/index.php?e=machine&a=ajout"><font size=3 color="#5472AE">Cliquez ici si vous souhaitez ajouter une machine</font></a></h3>

<form>
<table border = 1 class='table' class="table table-hower">
		<tr>
			<th><font size=4 color="#6495ED">N° de la machine :</font></th>
			<th><font size=4 color="#6495ED">Type de la machine :</font></th>
			<th><font size=4 color="#6495ED">Marque de la machine :</font></th>
			<th><font size=4 color="#6495ED">Couleur de la machine :</font></th>
			<th><font size=4 color="#6495ED">Référence de la machine :</font></th>
		</tr>		
		<?php
		foreach($list as $machine){
		?>
		<tr>	
			<td><a href="<?php echo $root?>/index.php?e=machine&a=detail&id=<?php echo $machine->id?>"><font size=3 color="#5472AE"><?php echo $machine->id?></font></a></td>
			<td><font size=3 color="#5472AE"><?php echo $machine->type?></font></td>
			<td><font size=3 color="#5472AE"><?php echo $machine->marque?></font></td>
			<td><font size=3 color="#5472AE"><?php echo $machine->couleur?></font></td>
			<td><font size=3 color="#5472AE"><?php echo $machine->reference?></font></td>
		</tr>
		<?php 
		}
		?>
	</table>
</form>