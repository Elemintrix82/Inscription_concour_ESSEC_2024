<?php

session_start();

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

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Concours ESSEC</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<style type="text/css">

	table.table-style-two {
		font-family: verdana, arial, sans-serif;
		font-size: 11px;
		color: #333333;
		border-width: 1px;
		border-color: #3A3A3A;
		border-collapse: collapse;
	}
 
	table.table-style-two th {
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #517994;
		background-color: #B2CFD8;
	}
 
	table.table-style-two tr:hover td {
		background-color: #DFEBF1;
	}
 
	table.table-style-two td {
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #517994;
		background-color: #ffffff;
	}
	.tab {
		
		width: 90%; margin: auto;
	}
	.small-table {
		float: left; margin: .665%; margin-bottom: 30px;     width: 19.05555%;
	}
	ul {
		padding: 0; margin:0;
		padding-bottom: 2rem;
	}
	ul li {
		list-style: none; padding: 5px; font-size: .8rem;
		font-family: verdana, arial, sans-serif;
		display: inline-block;
	}
</style>
</head>
<body>

	<div class="header">
		<?php if( !empty($user) ) { echo "Bienvenu ".$user['email']; 
		echo ' | <a href="../">SiteWeb</a> | <a href="register.php">Paramètres</a> | ';
		if(isset($_POST["annee"])){
			echo '<a style="font-weight:bold; color:red" href="export-book.php">Exporter la liste</a> |';
		}
		echo '<a  href="logout.php">Déconnexion </a>'; } ?> 
	</div>

	<?php if( !empty($user) ): ?>
		<form action="index.php" method="POST">
			<div style="margin: auto; width:600px; text-align:center">
				<?php if(isset($_POST['annee'])){
					?><input type="text" style="width:100px" autocomplete="off"  placeholder="Entrer l'année" value="<?php echo $_POST['annee']; ?>" name="annee"/>
					 <ul class="radio"> 
					    <li><input type="radio" name="filiere" id="ESC" value="ESC" <?php if($_POST['filiere']=='ESC') {echo "checked";}?>/><label for="ESC">ESC</label></li> 
					    <li><input type="radio" name="filiere" id="EPA" value="EPA" <?php if($_POST['filiere']=='EPA') {echo "checked";}?>/><label for="EPA">EPA</label></li> 
					    <li><input type="radio" name="filiere" id="LPOM" value="LPOM" <?php if($_POST['filiere']=='LPOM') {echo "checked";}?>/><label for="LPOM">LPOM</label></li> 
					    <li><input type="radio" name="filiere" id="MBA" value="MBA" <?php if($_POST['filiere']=='MBA') {echo "checked";}?>/><label for="MBA">MBA</label></li>
					    <li><input type="radio" name="filiere" id="Doctorat" value="Doctorat" <?php if($_POST['filiere']=='Doctorat') {echo "checked";}?>/><label for="Doctorat">Doctorat</label></li> 
					 </ul> 

					<?php
					$_SESSION["annee"] = $_POST['annee'];
					$_SESSION["filiere"] = $_POST['filiere'];
				} else {
					?><input type="text" style="width:100px" autocomplete="off"  placeholder="Entrer l'année" value="<?php echo date("Y"); ?>" name="annee"/>
					 <ul class="radio"> 
					    <li><input type="radio" name="filiere" id="ESC" value="ESC"  checked/><label for="ESC">ESC</label></li> 
					    <li><input type="radio" name="filiere" id="EPA" value="EPA" /><label for="EPA">EPA</label></li> 
					    <li><input type="radio" name="filiere" id="LPOM" value="LPOM" /><label for="LPOM">LPOM</label></li> 
					    <li><input type="radio" name="filiere" id="MBA" value="MBA" /><label for="MBA">MBA</label></li> 
					    <li><input type="radio" name="filiere" id="Doctorat" value="Doctorat" /><label for="Doctorat">Doctorat</label></li> 
					 </ul> 
					<?php

				}?>
				<input type="submit" value="Charger la liste">	
			</div>
		</form>
		<div class="tab tab1">
			<table class="small-table table-style-two" style="margin-left: 0">
				<thead>
					<tr>
					<th colspan="2">Inscris par centre</th>					
					</tr>
					<tr>
					<th>Centre d'examen</th>
					<th>Nombre</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				if(isset($_POST['annee'])){
					$records = $conn->prepare('SELECT centre_exam,count(*) as nombre FROM inscriptions WHERE annee = '.$_POST['annee'].' and filiere LIKE "%'.$_POST['filiere'].'%" group by centre_exam order by nombre desc' );			
					$records->execute();
					//$results = $records->fetch(PDO::FETCH_ASSOC);

					while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
					   echo '<tr> <td>'.$results['centre_exam'].'</td> 
					   		      <td>'.$results['nombre'].'</td>					   		       
					   		 <tr/>';
					}
				}				
			?>
				</tbody>
			</table>
			<table class="small-table table-style-two">
				<thead>
					<tr>
					<th colspan="2">Inscris par filière</th>					
					</tr>
					<tr>
					<th>Filière</th>
					<th>Nombre</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				if(isset($_POST['annee'])){
					$records = $conn->prepare('SELECT filiere,count(*) as nombre FROM inscriptions WHERE annee = '.$_POST['annee'].' and filiere LIKE "%'.$_POST['filiere'].'%" group by filiere order by nombre desc' );			
					$records->execute();
					//$results = $records->fetch(PDO::FETCH_ASSOC);

					while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
					   echo '<tr> <td>'.$results['filiere'].'</td> 
					   		      <td>'.$results['nombre'].'</td>					   		       
					   		 <tr/>';
					}
				}
				
			?>
				</tbody>
			</table>
			<table class="small-table table-style-two">
				<thead>
					<tr>
					<th colspan="2">Inscris par sexe</th>					
					</tr>
					<tr>
					<th>Sexe</th>
					<th>Nombre</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				if(isset($_POST['annee'])){
					$records = $conn->prepare('SELECT civilite,count(*) as nombre FROM inscriptions WHERE annee = '.$_POST['annee'].' and filiere LIKE "%'.$_POST['filiere'].'%" group by civilite order by nombre desc' );			
					$records->execute();
					//$results = $records->fetch(PDO::FETCH_ASSOC);

					while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
					   echo '<tr> <td>'.$results['civilite'].'</td> 
					   		      <td>'.$results['nombre'].'</td>					   		       
					   		 <tr/>';
					}
				}				
			?>
				</tbody>
			</table>
			<table class="small-table table-style-two" style="margin-right: 0">
				<thead>
					<tr>
					<th colspan="2">Inscris par pays</th>					
					</tr>
					<tr>
					<th>Nationalité</th>
					<th>Nombre</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				if(isset($_POST['annee'])){
					$records = $conn->prepare('SELECT pays,count(*) as nombre FROM inscriptions WHERE annee = '.$_POST['annee'].' and filiere LIKE "%'.$_POST['filiere'].'%" group by pays order by nombre desc' );			
					$records->execute();
					//$results = $records->fetch(PDO::FETCH_ASSOC);

					while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
					   echo '<tr> <td>'.$results['pays'].'</td> 
					   		      <td>'.$results['nombre'].'</td>					   		       
					   		 <tr/>';
					}
				}				
			?>
				</tbody>
			</table>
			<table class="small-table table-style-two" style="margin-right: 0">
				<thead>
					<tr>
					<th colspan="2">Inscris par établissement</th>					
					</tr>
					<tr>
					<th>Etablissement</th>
					<th>Nombre</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				if(isset($_POST['annee'])){
					$records = $conn->prepare('SELECT etablissement,count(*) as nombre FROM inscriptions WHERE annee = '.$_POST['annee'].' and filiere LIKE "%'.$_POST['filiere'].'%" group by etablissement order by nombre desc' );			
					$records->execute();
					//$results = $records->fetch(PDO::FETCH_ASSOC);

					while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
					   echo '<tr> <td>'.$results['etablissement'].'</td> 
					   		      <td>'.$results['nombre'].'</td>					   		       
					   		 <tr/>';
					}
				}				
			?>
				</tbody>
			</table>
			<br/><br/><br/><br/><br/>
		</div>
		<div class="tab tab2">
			<table class="table-style-two" style="width: 100%; margin-bottom:3rem">
				<thead>
					<tr>
					<th>&nbsp;</th>
					<th>Centre d'examen</th>
					<th>Filiere</th>
					<th>Premier choix</th>
					<th>Deuxième choix</th>
					<th>Nom et prénom</th>
					<th>Date naissance</th>
					<th>Lieu naissance</th>
					<th>Civilité</th>
					<th>Pays</th>
					<th>Région</th>
					<th>Département</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				if(isset($_POST['annee'])){
					$records = $conn->prepare('SELECT * FROM inscriptions WHERE annee = '.$_POST['annee'].' and filiere LIKE "%'.$_POST['filiere'].'%" order by filiere, name' );			
					$records->execute();
					//$results = $records->fetch(PDO::FETCH_ASSOC);

					while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
					   echo '<tr> <td><img src="../uploads/'.$results['id'].'/photo.jpg" width="80"/></td> 
					   			  <td>'.$results['centre_exam'].'</td> 
					   		      <td>'.$results['filiere'].'</td>
					   		      <td>'.$results['choix1'].'</td>
					   		      <td>'.$results['choix2'].'</td>
					   		      <td>'.$results['name'].'</td>
					   		      <td>'.$results['date_n'].'</td>
					   		      <td>'.$results['lieu_n'].'</td>
					   		      <td>'.$results['civilite'].'</td>
					   		      <td>'.$results['pays'].'</td>
					   		      <td>'.$results['region'].'</td>
					   		      <td>'.$results['departement'].'</td>  
					   		 <tr/>';
					}
				}
				
			?>
			</tbody>
			</table>
		</div>
	<?php else: ?>
		<?php  header("Location: login.php") ?>
		
		<a href="login.php">Login</a>
		<!--a href="register.php">Register</a-->

	<?php endif; ?>

</body>
</html>