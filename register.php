<form action="" method="POST">
	<input name="login">
	<input name="password" type="password">
    <input name="confirm" type="password">
    <input name="email">
	<input type="submit">
</form>
<?php
session_start();
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных
$link = mysqli_connect($host, $user, $pass, $name);


        if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm']) and !empty($_POST['email'])) {
            if ($_POST['password'] == $_POST['confirm']) {
                $login = $_POST['login'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $email = $_POST['email'];
                $query = "SELECT * FROM users WHERE login='$login'";
                $user = mysqli_fetch_assoc(mysqli_query($link, $query));
                if (empty($user)) {
            
                    $query = "INSERT INTO users SET login='$login', password='$password', email='$email'";
            mysqli_query($link, $query);
            
            $_SESSION['auth'] = true;
            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
            $_SESSION['login'] = $login;
                } else {echo "логин уже существует";}
        } else { echo "Пароль не совпадает"; }
        }

    ?>