
<?php
require_once('../functions/functions.php');
ini_session_start();

try 
{
if(isset($_POST["id_lezione"]))
$id_lezione=$_POST["id_lezione"];
if(isset($_POST["note"]))
$note=$_POST["note"];
else
$note="";
/*
    $chkallievi = $_POST['chkallievi'];
    foreach ($chkallievi as $key => $value) {
    echo $chkallievi . ' ';
}*/
if(isset($_POST['chkallievi'])) {
  $allievi = $_POST['chkallievi'];
require_once('../configurazione/database.php');
require_once('../class/presenza.php');
$presenza= new Presenza();	
$presenza->insertPresenza($mysqli,$allievi,$id_lezione,$note);
echo "<CENTER><BR>Hai inserito ".count($allievi) ." allievi<BR><BR>";
print "<a id='calendario' href='#' onClick=\"self.close()\">click per chiudere</a></CENTER>";
 }
   else  
  {
    echo("Non è stato selezionato nessun allievo.");
	print "<a id='calendario' href='#' onClick=\"self.close()\">click per chiudere</a></CENTER>";
  } 




}

catch (Exception $ex) {
	echo "errore".$ex;
}
	?>

