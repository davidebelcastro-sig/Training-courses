<?php
try{
require_once('../functions/functions.php');
ini_session_start();

$user_name=$_POST["user_name"];
$display_name=$_POST["display_name"];
$email=$_POST["email"];
$password=$_POST["password"];
$sesso = $_POST["sesso"];
require_once('../class/utente.php');
require_once('../configurazione/database.php');
$utente= new utente();
if ($_POST["tipooperazione"]=="modutente")		
		{
			$utente->updateUtente($mysqli,$user_name,$display_name,$email,$password,$sesso,$_SESSION['user_id']);	
		}
elseif ($_POST["tipooperazione"]=="adduser")		
		{
			$utente->insertUtente($mysqli,$user_name,$display_name,$email,$password,$sesso);	
		}
header('Location: ../index.php');
}
catch (Exception $ex) {
	header('Location: ../logout.php');
}
	?>

