<?php
try{
	require_once('../functions/functions.php');
	ini_session_start();
	$doc=$_POST["docenteid"];	
	$mod=$_POST["moduloid"];
	$costo = $_POST["costo"];
	require_once('../class/docente-modulo.php');
	require_once('../configurazione/database.php');
			$docMod= new docenteModulo();
			
			
	if ($_POST["tipooperazione"]=="addmodulo")		
	{
		$docMod->insertDocente($mysqli,$doc,$mod,$costo,$_SESSION['user_id']);	
	}
	if ($_POST["tipooperazione"]=="resmodulo")
	{//$allievo->updateAllievo($mysqli,$idazienda,$id_ccnl,$note,$_SESSION['user_id'],$idallievo);	
	}

header('Location: ../index.php');
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>
