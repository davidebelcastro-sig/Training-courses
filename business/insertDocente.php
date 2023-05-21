<?php
try{

require_once('../functions/functions.php');
require_once('../class/docente.php');
require_once('../configurazione/database.php');
ini_session_start();

$note=$_POST["descrizione"];
$idanagr=$_POST["anagrid"];
$docente= new docente();
		
		
if ($_POST["tipooperazione"]=="adddocente")		
        $docente->insertDocente($mysqli,$idanagr,$note,$_SESSION['user_id']);	

if ($_POST["tipooperazione"]=="moddocente")
	$docente->updateDocente($mysqli,$note,$_SESSION['user_id'],$idanagr);	

if ($_POST["tipooperazione"]=="deldocente")
	$docente->deleteDocente($mysqli,$idanagr);
header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>

