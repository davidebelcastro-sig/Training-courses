<?php
try{
	require_once('../functions/functions.php');
	ini_session_start();
	$all=$_POST["docenteid"];	
	$mod=$_POST["moduloid"];

						
	require_once('../class/allievo-modulo.php');
	require_once('../configurazione/database.php');
			$docMod= new allievoModulo();
			
			
	if ($_POST["tipooperazione"]=="addmodulo")		
	{
		$docMod->deleteAllievo($mysqli,$all,$mod);	
	}


header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>

