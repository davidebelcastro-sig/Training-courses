<?php
include_once '../class/corso.php';
require_once('../configurazione/database.php');
if(isset($_POST['id_progetto']))
{
$elencoCorsi = new corso();								  
$id_progetto=$_POST['id_progetto'];	
									
$elencoCorsi->getCorsiperProgetto($mysqli,$id_progetto);
while ($row=$elencoCorsi->corsi_progetto->fetch_assoc()) {
	echo "<option value=".$row['id_corso'].">".$row['titolo']."</option>";
		}
die;		
}



?>