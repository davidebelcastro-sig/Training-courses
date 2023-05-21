<?php
class docenteModulo
{
   public $docenti=[];
   public $docenteDett=[];
   public $moduliPerDocente=[];
function __construct()
    {
       
    }  

function insertDocente($mysqli,$doc,$mod,$costo,$user_id)
{
try
{
	$stmt = $mysqli->prepare("INSERT INTO `tb_docentemodulo` (`id_docente`,`id_modulo`,costoorario,`id_user_modifica`) VALUES (?,?,?,?)"); 							


	 if ($stmt === false)
		die('prepare() failed: ' . htmlspecialchars($mysqli->error));	

	$rc = $stmt->bind_param("iidi",$doc,$mod,$costo,$user_id);


	if ($rc === false)
		die('bind_param() failed: ' . htmlspecialchars($stmt->error));
	$rc = $stmt->execute();
	if ($rc === false)
		die('Valore di costo orario errato oppure al docente è stato già assegnato questo modulo!');				
	}
	

catch(Exception $e) {
    header("location: ../index.php"); 
	die("error");
}
}




function deleteDocente($mysqli,$doc,$mod)
{
try
{
	$stmt = $mysqli->prepare("DELETE from `tb_docentemodulo` where`id_docente` = ? and `id_modulo`=?"); 							


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

