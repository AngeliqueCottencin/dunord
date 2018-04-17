<?php

session_start();

session_unset();

session_destroy();

header('location: http://localhost/dunord/index.php?e=connexion&a=authentification');

?>