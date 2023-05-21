<?php
include_once '../class/modulo.php';
require_once('../configurazione/database.php');
if(isset($_POST['id_corso']))
{
$elencoModuli = new modulo();								  
$id_corso=$_POST['id_corso'];	
									
$elencoModuli->getModuliCorsi($mysqli,$id_corso);
while ($row=$elencoModuli->moduli->fetch_assoc()) {
	echo "<option value=".$row['id_modulo'].">".$row['titolo']."</option>";
		}
die;		
}



?>