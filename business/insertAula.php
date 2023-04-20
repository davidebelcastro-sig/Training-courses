<?php
try{
require_once('../functions/functions.php');
ini_session_start();
if(isset($_POST["idaula"]))
	$idaula=$_POST["idaula"];
$nome=$_POST["Nome"];
$indirizzo=$_POST["Indirizzo"];
$capienza=$_POST["Capienza"];

/*$timestamp = strtotime($_POST["INIZIOGENERALE"]);
date("Y-m-d H:i:s", $timestamp);
*/
if ($_POST["DisponibilitaDa"] != "")
{
	 $datainizio = str_replace('/', '-', $_POST["DisponibilitaDa"]);
     $disponibilitada=date("Y-m-d H:i:s", strtotime($datainizio));
}
else
{
	$disponibilitada= date("Y-m-d H:i:s"); 
}

if ( $_POST["DisponibilitaA"] != "")
{
	$datafine = str_replace('/', '-', $_POST["DisponibilitaA"]);
	$disponibilitaa = date('Y-m-d H:i:s', strtotime($datafine));
	
}
else
{
	$disponibilitaa= date("Y-m-d H:i:s"); 
}

require_once('../class/aula.php');
require_once('../configurazione/database.php');
$aula= new aula();		

if ($_POST["tipooperazione"]=="addaula")
      $aula->insertAula($mysqli,$nome,$indirizzo,$capienza,$disponibilitada,$disponibilitaa,$_SESSION['user_id']);
  
  
if ($_POST["tipooperazione"]=="modaula")
	 $aula->updateAula($mysqli,$idaula,$nome,$indirizzo,$capienza,$disponibilitada,$disponibilitaa,$_SESSION['user_id']);

if ($_POST["tipooperazione"]=="delaula")
	$aula->deleteAula($mysqli,$idaula);
header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}	
	?>

