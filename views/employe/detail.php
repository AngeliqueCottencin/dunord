<?php
require_once('./config.php');
require_once('./models/employe.php');
require_once('./models/panne.php');

$employe = employe_getByID($_GET["id"]);
$list = panne_getListByIDemploye($_GET["id"]);

?>
<!--<a href="<?php echo $root?>/index.php?e=employe&a=list"><font size=3 color="#5472AE">Retour à la liste des employes</font></a> -->

<h1 id="details" align="center"><font color="#0131B4">Détails d'un employé</font></h1>
<center>
	<form>
		<table class="table-condensed">
			<tr>
				<td><font size=4 color="#6495ED">N° employe :</font></td>
				<td><font size=3 ><?php echo $employe->id?></font></td>
			</tr>
			<tr>
				<td><font size=4 color="#6495ED">Nom :</font></td>
				<td><font size=3 ><?php echo $employe->nom?></font></td>
			</tr>
			<tr>
				<td><font size=4 color="#6495ED">Prénom :</font></td>
				<td><font size=3 ><?php echo $employe->prenom?></font></td>
			</tr>
			<tr>
				<td><font size=4 color="#6495ED">Adresse :</font></td>
				<td><font size=3 ><?php echo $employe->adresse?></font></td>
			</tr>
			<tr>
				<td><font size=4 color="#6495ED">Téléphone :</font></td>
				<td><font size=3 ><?php echo $employe->telephone?></font></td>
			</tr>
		</table>
	</form>
</center>



<h3 id="details" align="center"><font color="#0131B4">Liste des pannes qui concernent l'employé</font><a href="<?php echo $root?>/index.php?e=panne&a=list"><font size=3 color="#5472AE">(Accès à la liste des pannes)</font></a>
</h3>
<h3 align="center"><a href="<?php echo $root?>/index.php?e=panne&a=ajout"><font size=3 color="#5472AE">Cliquez ici si vous souhaitez ajouter une panne</font></a></h3>

<form>
<table border = 1 class='table' class="table table-hower">
		<tr>
			<th><font size=4 color="#6495ED">N° de panne </font></th>
			<th><font size=4 color="#6495ED">Date de création </font></th>
			<th><font size=4 color="#6495ED">Problème </font></th>
			<th><font size=4 color="#6495ED">Notes de travail </font></th>
			<th><font size=4 color="#6495ED">Solution </font></th>
			<th><font size=4 color="#6495ED">Facturation </font></th>		
						
		</tr>
				
		<?php
		foreach($list as $panne){
		?>
		
		<tr>	
			<td><a href="<?php echo $root?>/index.php?e=panne&a=detail&id=<?php echo $panne->id?>"><font size=3 color="#5472AE"><?php echo $panne->id?></font></a></td>
			<td><font size=3 ><?php echo $panne->creation?></font></td>
			<td><font size=3 ><?php echo $panne->probleme?></font></td>
			<td><font size=3 ><?php echo $panne->etat?></font></td>
		</tr>
		
		<?php 
		}
		?>
	</table>
</form>