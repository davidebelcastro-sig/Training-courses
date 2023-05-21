
<?php
require_once('../functions/functions.php');
ini_session_start();

try 
{
if(isset($_POST["id_lezione"]))
$id_lezione=$_POST["id_lezione"];
if(isset($_POST["ststring"]))
$orainizio=strtotime($_POST["ststring"]);
if(isset($_POST["etstring"]))
$orafine=strtotime($_POST["etstring"]);
if(isset($_POST["descr"]))
$descr=$_POST["descr"];
else
$descr="";	
if(isset($_POST["resource"]))
$resource=$_POST["resource"];
if(isset($_POST["docente"]))
$docenteid=$_POST["docente"];
require_once('../configurazione/database.php');
require_once('../class/calendario.php');
$calendario= new Calendario();	

if ($_POST["tipooperazione"]=="modifica")
      $calendario->updateCalendario($mysqli, $docenteid,$resource,$orainizio, $orafine,$descr,$id_lezione);
if ($_POST["tipooperazione"]=="inserisci")
	 $calendario->updateCalendario($mysqli, $docenteid,$resource,$orainizio, $orafine,$descr,$id_lezione);
if ($_POST["tipooperazione"]=="cancella")
	$progetto->deleteProgetto($mysqli,$idprogetto);
echo("Lezione modificata correttamente.");
print "<a id='calendario' href='#' onClick=\"self.close()\">click per chiudere</a></CENTER>";
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>

