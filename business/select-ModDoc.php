<?php
require_once('../class/docente.php');
require_once('../configurazione/database.php');
if(isset($_POST['id_modulo']))
{						  
$id_modulo=$_POST['id_modulo'];	
$elencoDocenti = new docente();								  
$elencoDocenti->getDocentiModulo($mysqli,$id_modulo);
while ($row=$elencoDocenti->docenti->fetch_assoc()) {
	echo "<option value=".$row['id_anagrafica'].">".$row['nome']." ".$row['cognome']."</option>";
		}
die;		
}
?>