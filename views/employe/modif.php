<?php
if($_SESSION['role'] == "admin"){

	require_once ('./config.php');
	require_once ('./models/employe.php');
	
	$nom = "";
	$prenom = "";
	$adresse = "";
	$telephone = "";
	
	if (isset ( $_GET ["id"] )) {
		$employe = unEmploye ( $_GET ["id"] );
		$id = $employe->id;
		$nom = $employe->nom;
		$prenom = $employe->prenom;
		$adresse = $employe->adresse;
		$telephone = $employe->telephone;
		
		if (isset ( $_GET ["nom"] ) && isset ( $_GET ["prenom"] ) && isset ( $_GET ["adresse"] ) && isset ( $_GET ["telephone"] )) {
			$nom = $_GET ["nom"];
			$prenom = $_GET ["prenom"];
			$adresse = $_GET ["adresse"];
			$telephone = $_GET ["telephone"];
			$modif_ok = employe_modif ( $id, $nom, $prenom, $adresse, $telephone );
			if ($modif_ok) {
				header ( 'location: http://localhost/dunord/index.php?e=employe&a=list' );
			}
		}
	}

?>

<!-- <a href="<?php echo $root?>/index.php?e=employe&a=list"><font size=3 color="#5472AE">Retour à la liste des employes</font></a> -->
<h1 id="form" align="center">
	<font color="#0131B4">Modification des informations d'un employé</font>
</h1>
<h3 id="form" align="center">
	<font color="#0131B4">Veuillez modifier uniquement les données
		concernées</font>
</h3>

<center>
	<form method="GET" action="./index.php">
		<input type="hidden" name="e" value="employe"> <input type="hidden"
			name="a" value="modif">
		<table class="table-condensed">
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $id ?>"></td>
			</tr>
			<tr>
				<td><font size=3>Nom :</font></td>
				<td><font size=3><input type="text" name="nom"
						value="<?php echo $nom ?>" placeholder="nom du employe"></font></td>
			</tr>
			<tr>
				<td><font size=3>Prénom :</font></td>
				<td><font size=3><input type="text" name="prenom"
						value="<?php echo $prenom ?>" placeholder="prénom du employe"></font></td>
			</tr>
			<tr>
				<td><font size=3>Adresse :</font></td>
				<td><font size=3><input type="text" name="adresse"
						value="<?php echo $adresse ?>" placeholder="adresse du employe"></font></td>
			</tr>
			<tr>
				<td><font size=3>Téléphone :</font></td>
				<td><font size=3><input type="text" name="telephone"
						value="<?php echo $telephone ?>" placeholder="téléphone du employe"></font></td>
			</tr>
		</table>
		<button type="submit" name="update" class="btn btn-primary"
			id="update">Valider les modifications</button>
	</form>
</center>
<?php } else {
	echo("Vous n'avez pas la permission ! ");
} 
?>
