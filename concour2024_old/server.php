<?php
header('Content-type: application/json');
require 'connexion.php';
new SaveDatas();

class SaveDatas{

	function __construct(){
		        // Démarre le tampon de sortie
				ob_start();

		$response_array=array();
		$state =false;
		
		if(isset($_POST['name'])){
			$numero = $this->saveData($_POST['annee'],$_POST['centre_exam'],
	    	$_POST['filiere'],$_POST['etablissement'],$_POST['etablissement2'],$_POST['etablissement3'],$_POST['choix1'],$_POST['choix2'],
	    	$_POST['name'],$_POST['date_n'],$_POST['lieu_n'],$_POST['civilite'],$_POST['pays'],$_POST['region'],$_POST['departement'],$_POST['residence'],
	    	$_POST['adresse'],$_POST['telephone'],$_POST['email'],$_POST['langue'],$_POST['handicap'],$_POST['worker'],$_POST['matrimonial'],$_POST['profession'],
	    	$_POST['diplome'],$_POST['etat_diplom'],$_POST['serie'],$_POST['moyenne'],$_POST['mention'],$_POST['diplom_lieu_obt'],$_POST['diplom_an_obt'],
	    	$_POST['father'],$_POST['father_work'],$_POST['father_contact'],$_POST['mother'],$_POST['mother_work'],$_POST['mother_contact'],
	    	$_POST['transID']); 

			// $numero=10;
			
	    	$state = $this->saveImages('doc_diplom','diplome','uploads/'.$numero);
			$state = $this->saveImages('doc_photo','photo','uploads/'.$numero);
			$state = $this->saveImages('doc_acte_naiss','acte_naiss','uploads/'.$numero);
			$state = $this->saveImages('doc_paiement','paiement','uploads/'.$numero);	
		}
	    
		 /*$numero = $this->saveData('skjdhs','JOKD',
	    	'slkdjfqls','sjkdhfs','dfsgdf',
	    	'BALEBA','13/12/2018','Eseka','AMSCULIN','CMR','JDJE','DKK',
	    	'DKDD','DK?D','hdhd@gllg.com','sdfdf','OUI','OUI','Celib','Infor',     nyqhw2xq_essec  Essec_u_pwd
	    	'BACC','Obtenu','serie','HDHE','JHDJD','sdlkjsd','sdjkhksq',
	    	'ksjdhskd','sdjhks','jkdshkjf','kishdk','isdkshdkf','ksdhfk fh s',
	    	'khd'); */
		
		

		if($state){
			$response_array['status'] = 'success';
			$response_array['user'] = $_POST['name'];
			$response_array['numero'] = $numero;

		}else{
			$response_array['status'] = 'error';	
		}

		echo json_encode($response_array);


        // Envoie tout le contenu du tampon de sortie et l'efface
        ob_end_flush();
        exit();
	}
	private function saveImages($typedoc, $nameDoc, $folder){
		
		if (isset($_FILES[$typedoc]['name'])) {
			if (!file_exists($folder)) {
			    mkdir($folder, 0777, true);
			}
		    if (0 < $_FILES[$typedoc]['error']) {
		    	$response_array['status'] = 'error';	
		    	$response_array['details'] = 'Error during file uploads' . $_FILES[$typedoc]['error'];		        
		        return false;
		    } else {		        
	        	$temp = explode(".", $_FILES[$typedoc]["name"]);
				$newfilename = $nameDoc. '.' . end($temp);
	            move_uploaded_file($_FILES[$typedoc]['tmp_name'], $folder.'/' . $newfilename);
	            return true;       
		    }
		} else {
			return false;	   
		}
	}
	private function saveData($annee,$centre_exam,
		    	$filiere,$etablissement,$etablissement2,$etablissement3,$choix1,$choix2,
		    	$name,$date_n,$lieu_n,$civilite,$pays,$region,$departement,$residence,
		    	$adresse,$telephone,$email,$langue,$handicap,$worker,$matrimonial,$profession,
		    	$diplome,$etat_diplom,$serie,$moyenne,$mention,$diplom_lieu_obt,$diplom_an_obt,
		    	$father,$father_work,$father_contact,$mother,$mother_work,$mother_contact,
		    	$transID){

			$db = new DB();
		    $conn = $db->getConnection(); 
		 

		    $stmt = $conn->prepare("INSERT INTO inscriptions (
	    	annee,centre_exam,
	    	filiere,etablissement,etablissement2,etablissement3,choix1,choix2,
	    	name,date_n,lieu_n,civilite,pays,region,departement,residence,
	    	adresse,telephone,email,langue,handicap,worker,matrimonial,profession,
	    	diplome,etat_diplom,serie,moyenne,mention,diplom_lieu_obt,diplom_an_obt,
	    	father,father_work,father_contact,mother,mother_work,mother_contact,
	    	transID) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"); 
	        
	    try { 
	        $conn->beginTransaction(); 
	        
	        $stmt->execute(array($annee,$centre_exam,
	    	$filiere,$etablissement,$etablissement2,$etablissement3,$choix1,$choix2,
	    	$name,$date_n,$lieu_n,$civilite,$pays,$region,$departement,$residence,
	    	$adresse,$telephone,$email,$langue,$handicap,$worker,$matrimonial,$profession,
	    	$diplome,$etat_diplom,$serie,$moyenne,$mention,$diplom_lieu_obt,$diplom_an_obt,
	    	$father,$father_work,$father_contact,$mother,$mother_work,$mother_contact,
	    	$transID)); 
	        $insertId = $conn->lastInsertId();
	        $conn->commit();

	        return $insertId;
	
	    } catch(PDOException $e) { 
	    	
	        $conn->rollback(); 

			// Utilise var_dump pour afficher les informations d'erreur
			ob_start();
			var_dump($e);
			$errorDetails = ob_get_clean();

			error_log($e->getMessage());  // Log l'erreur
	        $response_array['status'] = 'error';	
	    	$response_array['details'] = 'Error during file uploads';
	    	echo json_encode($response_array);
	 
	    } 
		
	}
}

?>