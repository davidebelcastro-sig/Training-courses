<?php
try{

require_once('../functions/functions.php');
ini_session_start();

/*$note=$_POST["descrizione"];
$idanagr=$_POST["anagrid"];
*/


/*$timestamp = strtotime($_POST["INIZIOGENERALE"]);
date("Y-m-d H:i:s", $timestamp);
*/


require_once('../class/docente.php');
require_once('../configurazione/database.php');
		$docente= new docente();
		
		
if ($_POST["tipooperazione"]=="adddocente")		
{
	
	 if(!empty($_POST['checkDocenti']))
	 {
      foreach($_POST['checkDocenti'] as $checked){
        echo $checked."</br>";
      }
    }
	else
	{
		
	}
	die();
	//devo scrivere la funzione insertdocenteprogetto
	$docente->insertDocenteProgetto($mysqli,$idanagr,$note,$_SESSION['user_id']);	
}
header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>
