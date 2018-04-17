<?php
require_once ('connect-db.php');
function panne_getByID($id) {
	global $pdo;
	$req = "SELECT * FROM panne p where p.id=:id;";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":id", $id, PDO::PARAM_INT );
	$query->execute ();
	return $query->fetch ();
}

function panne_getList($filtre) {
	global $pdo;
	if (isset ( $filtre ) && ($filtre) != "") {
		$req = "SELECT * FROM panne p WHERE p.id LIKE :filtre_id; && p.etat LIKE :filtre_etat";
		$query = $pdo->prepare ( $req );
		$query->bindValue ( ":filtre_id", "%" . $filtre . "%", PDO::PARAM_INT );
		$query->bindValue ( ":filtre_etat", "%" . $filtre . "%", PDO::PARAM_STR );
	} else {
		$req = "SELECT * FROM panne p;";
		$query = $pdo->prepare ( $req );
	}
	$query->execute ();
	return $query->fetchAll ();
}

function panne_getListByIDemploye($id_employe) {
	global $pdo;
	$req = "SELECT * FROM panne p WHERE p.id_employe=:id_employe ORDER BY p.creation;";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":id_employe", $id_employe, PDO::PARAM_INT );
	$query->execute ();
	return $query->fetchAll ();
}

function unePanne($id){
	global $pdo;
	$req = "SELECT * FROM panne WHERE id=:id;";
	$query = $pdo->prepare($req);
	$query->bindValue(":id", $id, PDO::PARAM_INT);
	$query->execute();
	return $query->fetch();
	
}

function panne_add($employe, $creation, $probleme, $etat) {
	global $pdo;
	$req = "INSERT INTO panne(id_employe, creation, probleme, etat) VALUES (:employe, :creation, :probleme, :etat);";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":employe", $employe, PDO::PARAM_INT );
	$query->bindValue ( ":creation", $creation, PDO::PARAM_INT );
	$query->bindValue ( ":probleme", $probleme, PDO::PARAM_STR );
	$query->bindValue ( ":etat", $etat, PDO::PARAM_STR );
	return $query->execute ();
}

function panne_supp($id) {
	global $pdo;
	$req = "DELETE FROM panne WHERE id=:id;";
	$query = $pdo->prepare ( $req );
	$query->bindValue ( ":id", $id, PDO::PARAM_INT );
	return $query->execute ();
}


function panne_modif($id, $employe, $creation, $probleme, $etat) {
	global $pdo;
	
	$req = "UPDATE panne SET id_employe=:employe, creation=:creation, probleme=:probleme, etat=:etat WHERE id=:id;";
	
	$prep = $pdo->prepare ( $req );
	
	$prep->bindValue ( ':employe', $employe, PDO::PARAM_INT );
	$prep->bindValue ( ':creation', $creation, PDO::PARAM_INT );
	$prep->bindValue ( ':probleme', $probleme, PDO::PARAM_STR );
	$prep->bindValue ( ':etat', $etat, PDO::PARAM_STR );
	$prep->bindValue ( ':id', $id, PDO::PARAM_INT );
	
	return $prep->execute ();
}
