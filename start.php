<?php
    session_start();
    
	try {
		$pdo = new PDO("mysql:dbname=sifwrx5zwg3230rg;host=r42ii9gualwp7i1y.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306", "hn7md7fkskj92j6h", "plsn9tkvdauotpsf");
		$pdo->exec("SET NAMES `utf8`");
		
	} catch (PDOException $e) {
		echo $e->getMessage();
	}


	
	
?>