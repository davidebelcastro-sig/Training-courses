<?php
try{
require_once('../functions/functions.php');
ini_session_start();
if(isset($_POST["idmodulo"]))
	$idmodulo=$_POST["idmodulo"];	
$corsoid=$_POST["corsoid"];
$titolo=$_POST["titolo"];
$durata=$_POST["durata"];				
require_once('../class/modulo.php');
require_once('../configurazione/database.php');
		$modulocls= new modulo();
		

if ($_POST["tipooperazione"]=="addmodulo")		
        $modulocls->insertModulo($mysqli,$corsoid,$titolo,$durata,$_SESSION['user_id']);	

if ($_POST["tipooperazione"]=="modmodulo")
	 $modulocls->updateModulo($mysqli,$corsoid,$titolo,$durata,$_SESSION['user_id'],$idmodulo);	

if ($_POST["tipooperazione"]=="delmodulo")
	$modulocls->deleteModulo($mysqli,$idmodulo);
header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>

