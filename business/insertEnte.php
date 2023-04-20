<?php
try{
require_once('../functions/functions.php');
ini_session_start();
if(isset($_POST["idente"]))
	$idente=$_POST["idente"];
$denominazione=$_POST["denominazione"];			
require_once('../class/entefinanziante.php');
require_once('../configurazione/database.php');
$ente= new EnteFinanziante();		

if ($_POST["tipooperazione"]=="addente")		
        $ente->insertEnte($mysqli,$denominazione,$_SESSION['user_id']);
		

if ($_POST["tipooperazione"]=="updente")
	 $ente->updateEnte($mysqli,$denominazione,$_SESSION['user_id'],$idente);

if ($_POST["tipooperazione"]=="delente")
	$ente->deleteEnte($mysqli,$idente);	
header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>



	

