<?php

// Point de connexion à la base
// Les arguments
// 1/ Le driver et le host
// 2/ Le user
// 3/ Le password
// 4/ Les options
// $options = "?";
// c'est un objet capable de fournir une connection
// et de fournir des objets de requete
$dbh = new PDO($dsn, $user, $pswd);
// Ajout d'option
// C'est un objet capable de faire des requetes
try {
	$sth = $dbh->prepare("INSERT INTO `fonts`"
		. "(`fonts_name`, `fonts_line_height`) "
		. "VALUES (:fonts_name,:fonts_line_height)"
);
	$sth->bindValue(":fonts_name", "My Wonderfull Font");
	$sth->bindValue(":fonts_line_height", 8);
	$sth->execute();
	
	echo "content";
	
} catch (Throwable $e) {
	
	echo "pas content: " . $e->getMessage();
	
}