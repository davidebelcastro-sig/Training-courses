<?php
require_once('../functions/functions.php');
require_once('../class/anagrafica.php');
require_once('../configurazione/database.php');
ini_session_start();

if(isset($_POST["anag_id"]))
	$idanag=$_POST["anag_id"];
$cognome=$_POST["cognome"];
$nome=$_POST["nome"];
$provincia_nascita=$_POST["provincia_nascita"];
$data_nascita=$_POST["data_nascita"];
$cittadinanza=$_POST["cittadinanza"];
$comune_nascita=$_POST["comune_nascita"];
$cap=$_POST["cap"];
$residenza_indirizzo=$_POST["residenza_indirizzo"];
$residenza_provincia=$_POST["residenza_provincia"];
$residenza_comune=$_POST["residenza_comune"];
$cf=$_POST["cf"];
$titolo_studio=$_POST["titolo_studio"];
$web=$_POST["web"];
$mail=$_POST["email"];

$anagrafica= new anagrafica();		

if ($_POST["tipooperazione"]=="addanagrafica")
      $anagrafica->insertAnagrafica($mysqli,$cognome,$nome,$provincia_nascita,$data_nascita,$cittadinanza,$comune_nascita,$cap,
							$residenza_indirizzo,$residenza_provincia,$residenza_comune,$cf,$titolo_studio,$web,$mail,$_SESSION['user_id']);
							
if ($_POST["tipooperazione"]=="updanagrafica")
	 $anagrafica->updateAnagrafica($mysqli,$idanag,$cognome,$nome,$provincia_nascita,$data_nascita,$cittadinanza,$comune_nascita,$cap,
							$residenza_indirizzo,$residenza_provincia,$residenza_comune,$cf,$titolo_studio,$web,$mail,$_SESSION['user_id']);

if ($_POST["tipooperazione"]=="delanagrafica")
	$anagrafica->deleteAnagrafica($mysqli,$idanag);
header('Location: ../index.php');
	?>

