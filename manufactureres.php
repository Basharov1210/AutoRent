<?php
    require_once "start.php";
    
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Список производителей</title>
		<meta charset="utf8">
		<link rel="stylesheet" type="text/css" href="css/semantic.css">
		<script type="text/javscript" src="css/semantic.js"></script>
		<script type="text/javscript" src="js/jquery.js"></script>
	</head>
	<body>
        <? include "blocks/menu.php" ?>
		<div class="ui grid">
			<div class="row">
				<div class="centered fourteen wide column">
                    <?php
                        $query = $pdo->query("SELECT caption, description FROM manufactureres");
                    
                        foreach($query->fetchAll() as $manufacturer) {
                            $caption = $manufacturer[0];
                            $description = $manufacturer[1];
                            include "blocks/card_manufactur.php";
                        }
                    ?>
				</div>
			</div>
		</div>
	</body>
</html>