<?php

session_start();

/*if( isset($_SESSION['user_id']) ){
	header("Location: /");
}*/

require '../connexion.php';
if( isset($_SESSION['user_id']) ){
	$db = new DB();
	$conn = $db->getConnection(); 
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}
}
if(empty($user)){
	header("Location: login.php");
}
$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	if($_POST['password']!==$_POST['confirm_password']){
		$message = 'Veuillez confirmer le même mot de passe';
	}else{
		$db = new DB();
		$conn = $db->getConnection(); 
		// Enter the new user in the database
		$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
		$stmt = $conn->prepare($sql);

		$stmt->bindValue(':email', $_POST['email']);
		$stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

		if( $stmt->execute() ):
			$message = 'Nouvel utilisateur crée';
		else:
			$message = 'Impossible de créer ce compte';
		endif;
	}
	

endif;

if(!empty($_POST['date_limit'])){
	
	$db = new DB();
	$conn = $db->getConnection(); 
	// Enter the new user in the database
	$sql = "UPDATE config SET id ='".$_POST['date_limit']."'";
	$stmt = $conn->prepare($sql);
	$stmt->execute() ;

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Configuration</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="./">Admin</a>||<a href="../">SiteWeb</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Enregistrement</h1>
	<span><a href="login.php">Connexion</a></span>
	<div style="width: 70%; margin: auto; padding-top: 2rem">
		<div style="float: left; width: 50%">
			<form action="register.php" method="POST">		
				<input type="text" placeholder="Identifiant" name="email">
				<input type="password" placeholder="Mot de passe" name="password">
				<input type="password" placeholder="confirme mot de passe" name="confirm_password">
				<input type="submit" value="Enregistrer">
			</form>
		</div>
		<div style="float: left; width: 50%">
			<form action="register.php" method="POST">
				<label>DATE LIMITE DU CONCOURS</label>
				<input type="text" placeholder="jj/mm/aaaa" name="date_limit">
				<input type="submit" value="Valider">

			</form>	
		</div>
	</div>
</body>
</html>