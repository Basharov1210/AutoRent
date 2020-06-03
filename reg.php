<?php

	require_once "start.php";
	
    if (isset($_SESSION['isUserLoggined']) && $_SESSION['isUserLoggined']) {
        header("Location: index.php");
        exit();
    }
    
	$msg = "";
	
	if (!empty($_POST['regButton'])) {
		
		$sn = $_POST['sn'];
		$fn = $_POST['fn'];
		$pt = $_POST['pt'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$repeat_pass = $_POST['repeat_pass'];
		
		
		if ($pass !== $repeat_pass) {
			$msg = "Пароли не совпадают";
            $type = "red";
		} else {
			
			$insert_stmt = $pdo->prepare("INSERT INTO `Users` 
				(`secondName`, `firstName`,`patronymic`,`email`,`password`,`idUserType`) 
				VALUES 
				(:sn, :fn, :pt, :email, :pass, 1);
			");
			
			$insert_stmt->bindValue(":sn", $sn);
			$insert_stmt->bindValue(":fn", $fn);
			$insert_stmt->bindValue(":pt", $pt);
			$insert_stmt->bindValue(":email", $email);
			$insert_stmt->bindValue(":pass", md5($pass));
			
			if ($insert_stmt->execute()) {
				$msg = "Регистрация прошла успешно";
                $type = "green";
			} else {
				$msg = "Пользователь с такой почтой уже зарегистрирован";
                $type = "red";
			}
			
		}
		
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Регистрация</title>
		<meta charset="utf8">
		<link rel="stylesheet" type="text/css" href="css/semantic.css">
		<script type="text/javscript" src="css/semantic.js"></script>
		<script type="text/javscript" src="js/jquery.js"></script>
	</head>
	<body>
        <? include "blocks/menu.php" ?>
		<div class="ui stackable grid">
			<div class="row">
				<div class="three wide column">
				</div>
				<div class="ten wide column">
					<fieldset class="ui segment yellow">
						<legend><h3>Регистрация в системе</h3></legend>
						<?php
							if (!empty($msg)) {
                                echo <<<END
                                    <div class='ui {$type} icon message'>
                                        <i class='inbox icon'></i>
                                        <div class='content'>
                                            <div class='header'>
                                                Уведомление
                                            </div>
                                            <p>{$msg}</p>
                                        </div>
                                    </div>
END;
							}
						?>
						<form class="ui form" method="POST">
							<div class="field">
								<label>Фамилия</label>
								<input type="text" name="sn" required>
							</div>
							<div class="field">
								<label>Имя</label>
								<input type="text" name="fn" required>
							</div>
							<div class="field">
								<label>Отчество</label>
								<input type="text" name="pt">
							</div>
							<div class="field">
								<label>E-mail:</label>
								<input type="email" name="email" required>
							</div>
							<div class="field">
								<label>Пароль</label>
								<input type="password" name="pass" required>
							</div>
							<div class="field">
								<label>Повторить пароль</label>
								<input type="password" name="repeat_pass" required>
							</div>
							<div class="field">
								<input type="submit" name="regButton" value="Зарегистрировать" class="ui primary button">
							</div>
						</form>
					</fieldset>
				</div>
			</div>
		</div>
	</body>
</html>