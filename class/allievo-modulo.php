<?php
class allievoModulo
{
   public $docenti=[];
   public $docenteDett=[];
   public $docentePerModulo=[];
function __construct()
    {
       
    }  

function insertAllievo($mysqli,$doc,$mod,$user_id)
{
try
{
	$stmt = $mysqli->prepare("INSERT INTO `tb_allievo-modulo` (`id_allievo`,`id_modulo`,`id_user_modifica`) VALUES (?,?,?)"); 							


	 if ($stmt === false)
		die('prepare() failed: ' . htmlspecialchars($mysqli->error));	

	$rc = $stmt->bind_param("iii",$doc,$mod,$user_id);


	if ($rc === false)
		die('bind_param() failed: ' . htmlspecialchars($stmt->error));
	$rc = $stmt->execute();
	if ($rc === false)
		die('A questo allievo è già stato assegnato questo modulo!');				
	}
	

catch(Exception $e) {
    header("location: ../index.php"); 
	die("error");
}
}

function deleteAllievo($mysqli,$doc,$mod)
{
try
{
	$stmt = $mysqli->prepare("DELETE from `tb_allievo-modulo` where`id_allievo` = ? and `id_modulo`=?"); 							


	 if ($stmt === false)
		die('prepare() failed: ' . htmlspecialchars($mysqli->error));	

	$rc = $stmt->bind_param("ii",$doc,$mod);


	if ($rc === false)
		die('bind_param() failed: ' . htmlspecialchars($stmt->error));
	$rc = $stmt->execute();
	if ($rc === false)
		die('execute() failed: ' . htmlspecialchars($stmt->error));					
	}
	

catch(Exception $e) {
    header("location: ../index.php"); 
	die("error");
}
}

}	
?>
