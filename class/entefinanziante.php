<?php
class Entefinanziante
{
   public $enti=[];
   public $enteDett=[];
function __construct()
    {
       
    }  
function getEnte($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_entefinanziante")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->enti= $result;

   }
}

 function getEnteProgetto($mysqli,$prog)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_entefinanziante.* from tb_entefinanziante,tb_progetto
   where tb_progetto.id_entefinanziante = tb_entefinanziante.id_entefinanziante and tb_progetto.id_progetto=?")){ 
     $stmt->bind_param("i",$prog);
	 $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->enti= $result;

   }
}


function getDettaglioEnte($mysqli,$idente)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_entefinanziante where id_entefinanziante =?")){ 
		$stmt->bind_param("i",$idente);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->enteDett= $result;

   }
} 
function insertEnte($mysqli,$denominazione,$user_id)
{

try
{
$stmt = $mysqli->prepare("INSERT INTO tb_entefinanziante(denominazione,id_user_modifica) VALUES ( ?,?)");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("si",$denominazione,$user_id);

if ($rc === false)
	die('bind_param() failed: ' . htmlspecialchars($stmt->error));
$rc = $stmt->execute();
if ($rc === false)
	die('Inserire valori corretti!');
					
}

catch(Exception $e) {
    //echo 'Message: ' .$e->getMessage();
	echo "error";	
}
}




function updateEnte($mysqli,$denominazione,$user_id,$idente)
{

try
{
$stmt = $mysqli->prepare("UPDATE tb_entefinanziante set denominazione=?,
													id_user_modifica=?  where id_entefinanziante=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("sii",$denominazione,$user_id,$idente);
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

function deleteEnte($mysqli,$idente)
{
/*	
IDProg

*/
try
{
$stmt = $mysqli->prepare("DELETE from tb_entefinanziante  where id_entefinanziante=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("i",$idente);

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