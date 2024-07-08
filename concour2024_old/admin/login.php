<?php

session_start();

/*if( isset($_SESSION['user_id']) ){
	header("Location: ./");
}*/

require '../connexion.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	$db = new DB();
	$conn = $db->getConnection(); 
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';
  
    if(!is_bool($results)){
    	if(password_verify($_POST['password'], $results['password']) ){

		$_SESSION['user_id'] = $results['id'];
		header("Location: ./");

		} else {
			$message = 'Désolé, paramètres de connexion incorrects';
		}
    }else{
    	$message = 'Désolé, paramètres de connexion incorrects';
    }
	

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Concours ESSEC</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="../">Admin Concours ESSEC</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Connexion</h1>
	<!--span>or <a href="register.php">register here</a></span-->

	<form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">

		<input type="submit">

	</form>

</body>
</html>