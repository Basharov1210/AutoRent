<?php
    require_once "start.php";
    
    if (!isset($_SESSION['isUserLoggined']) && !$_SESSION['isUserLoggined']) {
        header("Location: login.php");
        exit();
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
                    <table class="ui celled table">
                        <tbody>
                            <tr>
                                <td>Фамилия</td>
                                <td><?= $_SESSION['user']['secondName'] ?></td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td><?= $_SESSION['user']['firstName'] ?></td>
                            </tr>
                            <tr>
                                <td>Отчества</td>
                                <td><?= $_SESSION['user']['patronymic'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $_SESSION['user']['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Тип пользователя</td>
                                <td><?= $_SESSION['user']['userType'] ?></td>
                            </tr>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
		
	</body>
</html>