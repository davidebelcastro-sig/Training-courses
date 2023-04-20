
<?php
require_once('../functions/functions.php');
ini_session_start();
try 
{
if(isset($_POST["idprogetto"]))
	$idprogetto=$_POST["idprogetto"];
$entefinanziante=$_POST["enti"];

$nomeprogetto=$_POST["NOMEPROGETTO"];
if ($_POST["INIZIOGENERALE"] != "")
{
	 $datainizio = str_replace('/', '-', $_POST["INIZIOGENERALE"]);
     $iniziogenerale=date("Y-m-d H:i:s", strtotime($datainizio));
}
else
{
	$iniziogenerale= date("Y-m-d H:i:s"); 
}

if ( $_POST["FINEGENERALE"] != "")
{
	$datafine = str_replace('/', '-', $_POST["FINEGENERALE"]);
	$finegenerale = date('Y-m-d H:i:s', strtotime($datafine));
	
}
else
{
	$finegenerale= date("Y-m-d H:i:s"); 
}

$allieviprevisti=$_POST["ALLIEVIPREVISTI"];

$orepreviste=$_POST["OREPREVISTE"];
require_once('../class/progetto.php');
require_once('../configurazione/database.php');
$progetto= new Progetto();	


if ($_POST["tipooperazione"]=="addproject")
      $progetto->insertProgetto($mysqli,$entefinanziante,$nomeprogetto,$iniziogenerale,$finegenerale,
						$allieviprevisti,$orepreviste,$_SESSION['user_id']);
if ($_POST["tipooperazione"]=="modproject")
	 $progetto->updateProgetto($mysqli,$entefinanziante,$nomeprogetto,
					$iniziogenerale,$finegenerale,
					$allieviprevisti,$orepreviste,$_SESSION['user_id'],$idprogetto);
if ($_POST["tipooperazione"]=="delproject")
	$progetto->deleteProgetto($mysqli,$idprogetto);
header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>

