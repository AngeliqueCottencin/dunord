<?php
require_once('./config.php');
require_once('./models/employe.php');

$nom = "";
$prenom = "";
$adresse = "";
$telephone = "";

if(isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["adresse"]) && isset($_GET["telephone"])){
	$nom = $_GET["nom"];
	$prenom = $_GET["prenom"];
	$adresse = $_GET["adresse"];
	$telephone = $_GET["telephone"];
	$creation_ok = employe_add($nom, $prenom, $adresse, $telephone);
	if($creation_ok){
		header ( 'location: http://localhost/dunord/index.php?e=employe&a=list' );
	}
}


?>
<!-- <a href="/<?php echo $root?>/index.php?e=employe&a=list"><font size=3 color="#5472AE">Retour à la liste des employes</font></a> -->

<h1 id="form" align="center"><font color="#0131B4">Ajout d'un employé</font></h1>
<h3 id="form" align="center"><font color="#0131B4">Veuillez remplir ce formulaire pour ajouter un employé à la liste des employés</font></h3>
<center>
	<form method="GET" action="./index.php">
		<input type="hidden" name="e" value="employe"> <input type="hidden"
			name="a" value="ajout">
		<table class="table-condensed">
			<tr>
				<td><font size=3>Nom :</font></td>
				<td><font size=3><input type="text" name="nom" value="<?php echo $nom?>"
					placeholder="nom de l'employe"></font></td>
			</tr>
			<tr>
				<td><font size=3>Prénom :</font></td>
				<td><font size=3><input type="text" name="prenom" value="<?php echo $prenom?>"
					placeholder="prénom de l'employe"></font></td>
			</tr>
			<tr>
				<td><font size=3>Adresse :</font></td>
				<td><font size=3><input type="text" name="adresse" value="<?php echo $adresse?>"
					placeholder="adresse de l'employe"></font></td>
			</tr>
			<tr>
				<td><font size=3>Téléphone :</font></td>
				<td><font size=3><input type="text" name="telephone"
					value="<?php echo $telephone?>" placeholder="téléphone de l'employe"></font></td>
			</tr>
		</table>
		<button type="submit" name="ajout" class="btn btn-primary" id="ajout"> Ajout d'un employé </button>
	</form>
</center>