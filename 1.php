<?php 
session_start();
if (!empty($_SESSION['auth'])): ?>
	<!DOCTYPE html>
	<html>
		<head>
			
		</head>
		<body>
			<p>текст только для авторизованного пользователя <br> Логин:<?php echo  $_SESSION['login'];?></p>
		</body>
	</html>
<?php else: ?>
	<p>пожалуйста, авторизуйтесь</p>
<?php endif; ?>