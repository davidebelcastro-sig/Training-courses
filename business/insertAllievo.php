<?php
try{
require_once('../functions/functions.php');
ini_session_start();
if(isset($_POST["idallievo"]))
	$idallievo=$_POST["idallievo"];	

$idanagr=$_POST["anagrid"];
$note=$_POST["descrizione"];

					
require_once('../class/allievo.php');
require_once('../configurazione/database.php');


$allievo= new allievo();
if ($_POST["tipooperazione"]=="addallievo")		
        $allievo->insertAllievo($mysqli,$idanagr,$note,$_SESSION['user_id']);	

if ($_POST["tipooperazione"]=="modallievo")
	 $allievo->updateAllievo($mysqli,$note,$_SESSION['user_id'],$idallievo);	

if ($_POST["tipooperazione"]=="delallievo")
	$allievo->deleteAllievo($mysqli,$idallievo);
header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>

