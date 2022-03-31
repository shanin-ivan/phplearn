<meta charset="utf-8">
<?php $host = 'localhost'; // имя хоста
	$user = 'root';      // имя пользователя
	$pass = '';          // пароль
	$name = 'mydb';      // имя базы данных
	$link = mysqli_connect($host, $user, $pass, $name);
?>
	<form action="" method="POST">
	<input name="login">
	<input name="password" type="password">
	<input type="submit">
</form>

<?php
session_start();
	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$query = "SELECT * FROM users WHERE login='$login'";
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($result);
		
		if (!empty($user)) {
			$hash = $user['password'];
			if (password_verify($_POST['password'], $hash)){
			echo "Пройдена авторизация";
			$_SESSION['auth'] = true;
			$_SESSION['login']= $_POST['login']; } else {echo 'пароль не подошел';}
			
		} else { echo "Не верный логин";}
		
	}
?>