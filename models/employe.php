<?php
require_once ('./models/connect-db.php');

function employe_getLabel($id) {
	$employe = employe_getByID ( $id );
	if ($employe == null) {
		echo "Ce employé n'existe pas ou a été supprimé.";
	} else {
		return $employe->prenom . " " . $employe->nom;
	}
}
function employe_getByID($id) {
	global $pdo;
	$req = "SELECT * FROM employe c where c.id=:id;";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":id", $id, PDO::PARAM_INT );
	$query->execute ();
	return $query->fetch ();
}

function id_employe($id){
	global $pdo;
	$req = "SELECT id FROM employe WHERE id=:id;";
	$query = $pdo->prepare ( $req );
	$query->bindValue( ":id", $id, PDO::PARAM_INT );
	$query->execute ();
	return $query->fetchAll ();	
}


function employe_getList($filtre) {
	global $pdo;
	if (isset ( $filtre ) && ($filtre) != "") {
		$req = "SELECT * FROM employe e WHERE e.id LIKE :filtre_id OR e.nom LIKE :filtre_nom OR e.prenom LIKE :filtre_prenom;";
		$query = $pdo->prepare ( $req );
		$query->bindValue ( ":filtre_id", "%" . $filtre . "%", PDO::PARAM_INT );
		$query->bindValue ( ":filtre_nom", "%" . $filtre . "%", PDO::PARAM_STR );
		$query->bindValue ( ":filtre_prenom", "%" . $filtre . "%", PDO::PARAM_STR );
	} else {
		$req = "SELECT * FROM employe e;";
		$query = $pdo->prepare ( $req );
	}
	
	$query->execute ();
	return $query->fetchAll ();
}


function unEmploye($id){
	global $pdo;
	$req = "SELECT * FROM employe WHERE id=:id;";
	$query = $pdo->prepare($req);
	$query->bindValue(":id", $id, PDO::PARAM_INT);
	$query->execute();
	return $query->fetch();
	
}


function employe_add($nom, $prenom, $adresse, $telephone) {
	global $pdo;
	$req = "INSERT INTO employe(nom, prenom, adresse, telephone) VALUES (:nom, :prenom, :adresse, :telephone);";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":nom", $nom, PDO::PARAM_STR );
	$query->bindValue ( ":prenom", $prenom, PDO::PARAM_STR );
	$query->bindValue ( ":adresse", $adresse, PDO::PARAM_STR );
	$query->bindValue ( ":telephone", $telephone, PDO::PARAM_STR );
	return $query->execute ();
}


function employe_supp($id) {
	global $pdo;
	$req = "DELETE FROM employe WHERE id=:id;";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":id", $id, PDO::PARAM_INT );
	return $query->execute ();
}


function employe_modif($id, $nom, $prenom, $adresse, $telephone) {
	global $pdo;

	$req = "UPDATE employe SET nom=:nom, prenom=:prenom, adresse=:adresse, telephone=:telephone WHERE id=:id;";
	
	$prep = $pdo->prepare ( $req );
	
	$prep->bindValue ( ':nom', $nom, PDO::PARAM_STR );
	$prep->bindValue ( ':prenom', $prenom, PDO::PARAM_STR );
	$prep->bindValue ( ':adresse', $adresse, PDO::PARAM_STR );
	$prep->bindValue ( ':telephone', $telephone, PDO::PARAM_STR );
	$prep->bindValue ( ':id', $id, PDO::PARAM_INT );
	
	return $prep->execute ();
}
	