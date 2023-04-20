<?php

if(isset($_POST["enteid"]))
{
	$idente=$_POST["enteid"];

require_once('../class/entefinanziante.php');
require_once('../configurazione/database.php');
		$ente= new Entefinanziante();

        $ente->impostaDashboard($mysqli,$idente);

}			
	?>

