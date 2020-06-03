<?php
	require_once "start.php";
    
    if (isset($_SESSION['isUserLoggined']) && $_SESSION['isUserLoggined']) {
        header("Location: index.php");
        exit();
    }
    
    $msg = "";
	
	if (!empty($_POST['loginButton'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		
        $query = $pdo->prepare("
            SELECT 
                u.secondName, 
                u.firstName, 
                u.patronymic,
                ut.description
            FROM users as u 
                INNER JOIN UserType as ut ON ut.idUserType=u.idUserType
            WHERE u.email=:email AND u.password=:password
        ");
        $query->bindValue(":email", $email);
        $query->bindValue(":password", md5($pass));
        
        
        if ($query->execute()) {
            $userData = $query->fetchAll();
            
            if (count($userData) == 1) {
                $_SESSION['isUserLoggined'] = true;
                $_SESSION['user'] = [
                    "email" => $email,
                    "secondName" => $userData[0][0],
                    "firstName" => $userData[0][1],
                    "patronymic" => $userData[0][2],
                    "userType" => $userData[0][3]
                ];
                
                header("Location: profile.php");
                exit();
                
            }
        } else {
            $msg = "Пользователь не найден";
            $type = "red";
        }
    
		
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Вход</title>
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
					<fieldset class="ui segment blue">
						<legend><h3>Вход в систему</h3></legend>
						<form class="ui form" method="POST">
							<div class="field">
								<label>E-mail</label>
								<input type="email" name="email" required>
							</div>
							<div class="field">
								<label>Пароль</label>
								<input type="password" name="pass" required>
							</div>
							<div class="field">
								<input type="submit" name="loginButton" value="Войти" class="ui primary button">
							</div>
						</form>
					</fieldset>
				</div>
			</div>
		</div>
		
	</body>
</html>