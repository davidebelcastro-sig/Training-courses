<?php
class Calendario
{
  // public $corsi=[];
   public $progetto;
   public $corso;
   public $modulo;
   public $docente;
   public $orainizio;
   public $orafine;
   public $descrizione;
    public $resource;  //aula
function __construct()
    {
       
    }  

function updateCalendario($mysqli, $docenteid,$resource,$orainizio, $orafine,$descrizione,$id_lezione)
{
try
{
$stmt = $mysqli->prepare("UPDATE tb_calendario set id_docente=?,resource=?,stimestamp=?,etimestamp=?,descr=? where id=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("issssi",$docenteid,$resource,$orainizio, $orafine,$descrizione,$id_lezione);

if ($rc === false)
	die('bind_param() failed: ' . htmlspecialchars($stmt->error));
$rc = $stmt->execute();
if ($rc === false)
	die('execute() failed: ' . htmlspecialchars($stmt->error));
					
}

catch(Exception $e) {
    //echo 'Message: ' .$e->getMessage();
	echo "error";	
}
} 

}
?>


