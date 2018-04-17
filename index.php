
<!DOCTYPE html>
<?php
require_once ('config.php');
// require_once('models/connect-db.php');

session_start ();
// on teste si nos varaibles ont bien été enregistrées

?>
<html>
<head>
<title>Fiches de pannes - Entreprise Dunord</title>
<meta charset="utf-8">


<link href="./models/custom.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body>
	<header>
	
		 <?php  
		 if (isset ( $_SESSION ['login'] ) && isset ( $_SESSION ['role'] )) {
					echo "<p style=text-align:right;>  <b>Vous êtes connecté(e) en tant que " . $_SESSION ['login'] . "(" . $_SESSION ['role'] . ")</b>";
		  		} 
		  if($_GET["e"] != "connexion" && $_GET["a"] != "authentification"){?>
			<nav class="navbar navbar-inverse navbar-fixed-top"
				style="height: 15px">
				<div class="container-fluid">
					<div class="navbar-header">
						<div class="navbar-brand">Entreprise Dunord</div>
					</div>
					<ul class="nav navbar-nav">
						<li><a href="<?php echo $root?>/index.php?e=accueil&a=welcome">Menu
								Principal</a></li>
						<li><a href="<?php echo $root?>/index.php?e=employe&a=list">Liste
								des employés</a></li>
						<li><a href="<?php echo $root?>/index.php?e=panne&a=list">Liste des
								pannes</a></li>
						<li><a href="<?php echo $root?>/index.php?e=machine&a=list">Liste
								des machines</a></li>
						<li><a href="<?php echo $root?>/index.php?e=connexion&a=deconnexion" >Déconnexion</a></li>
								
					</ul>
				</div>
			</nav>
		
		<?php } ?>




	</header>
		
		
		<?php
		
		if (isset ( $_GET ["e"] ) && isset ( $_GET ["a"] )) {
			$entite = $_GET ["e"];
			$action = $_GET ["a"];
		} else {
			$entite = "connexion";
			$action = "authentification";
		}
		
		include ("./views/" . $entite . "/" . $action . ".php");
		?>
		<footer> </footer>
</body>
</html>
