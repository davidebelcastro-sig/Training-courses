<?php
include_once '../class/modulo.php';
require_once('../configurazione/database.php');
if(isset($_POST['id_anagrafica']))
{
$elencoMod = new modulo();								  
$id_anag=$_POST['id_anagrafica'];	
									
$elencoMod->getModuliAllievo($mysqli,$id_anag);
while ($row=$elencoMod->moduli->fetch_assoc()) {
	echo "<option value=".$row['id_modulo'].">".$row['titolo']."</option>";
		}
die;		
}



?>