<?php
try{
	require_once('../functions/functions.php');
	ini_session_start();
	$all=$_POST["allievoid"];	
	$mod=$_POST["moduloid"];

						
	require_once('../class/allievo-modulo.php');
	require_once('../configurazione/database.php');
			$docMod= new allievoModulo();
			
			
	if ($_POST["tipooperazione"]=="addmodulo")		
	{
		$docMod->insertAllievo($mysqli,$all,$mod,$_SESSION['user_id']);	
	}


header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>



