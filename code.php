<meta charset="utf-8">
<?php
	session_start();
	
	$_SESSION['flash'] = 'сообщение';
	header('Location: index1.php');
	
?>