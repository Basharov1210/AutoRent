<?php
    session_start();
    
	try {
		$pdo = new PDO("mysql:dbname=rencar_db;host=127.0.0.1:3307", "root", "");
		$pdo->exec("SET NAMES `utf8`");
		
	} catch (PDOException $e) {
		echo $e->getMessage();
	}


	
	
?>