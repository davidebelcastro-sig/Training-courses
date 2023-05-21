<?php
try{
	require_once('../functions/functions.php');
	ini_session_start();
	$doc=$_POST["docenteid"];	
	$mod=$_POST["moduloid"];
	require_once('../class/docente-modulo.php');
	require_once('../configurazione/database.php');
			$docMod= new docenteModulo();
			
			
	if ($_POST["tipooperazione"]=="addmodulo")		
	{
		$docMod->deleteDocente($mysqli,$doc,$mod);	
	}

header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>
