<?php
require_once('../functions/functions.php');
require_once('../class/corso.php');
require_once('../configurazione/database.php');
ini_session_start();
try{
if(isset($_POST["idcorso"]))
	$corsoid=$_POST["idcorso"];
$progettoid=$_POST["progettoid"];
$titolo=$_POST["TITOLO"];
$inizio=$_POST["INIZIO"];
$fine=$_POST["FINE"];
$hprev=$_POST["HPREV"];

/*$timestamp = strtotime($_POST["INIZIOGENERALE"]);
date("Y-m-d H:i:s", $timestamp);
*/
if ($_POST["INIZIO"] != "")
{
	 $datainizio = str_replace('/', '-', $_POST["INIZIO"]);
     $inizio=date("Y-m-d H:i:s", strtotime($datainizio));
}
else
{
	$inizio= date("Y-m-d H:i:s"); 
}

if ( $_POST["FINE"] != "")
{
	$datafine = str_replace('/', '-', $_POST["FINE"]);
	$fine = date('Y-m-d H:i:s', strtotime($datafine));
	
}
else
{
	$fine= date("Y-m-d H:i:s"); 
}

$nallieviprev=$_POST["NALLIEVIPREV"];
		$corso= new corso();
if ($_POST["tipooperazione"]=="addcorso")
        $corso->insertCorso($mysqli,$progettoid,$titolo,$inizio,$fine,$hprev,$nallieviprev,$_SESSION['user_id']);

if ($_POST["tipooperazione"]=="updcorso")
	 $corso->updateCorso($mysqli,$progettoid,$titolo,$inizio,$fine,$hprev,$nallieviprev,$_SESSION['user_id'],$corsoid);

if ($_POST["tipooperazione"]=="delcorso")
	$corso->deleteCorso($mysqli,$corsoid);
header('Location: ../index.php');
}
catch(Exception $ex){
	echo "errore".$ex;
}						
	?>

