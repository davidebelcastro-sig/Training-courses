<?php
class modulo
{
   public $moduli=[];
   public $moduloDett=[];
function __construct()
    {
       
    }  
function getModuli($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * from tb_modulo")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->moduli= $result;

   }
} 

function getModuliCorsi($mysqli,$corso)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct * from tb_modulo where id_corso=?")){ 
      $stmt->bind_param("i",$corso);
	  $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->moduli= $result;

   }
} 


function getModuliAllievo($mysqli,$all)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_modulo.* from 
   tb_modulo,`tb_allievo-modulo` where tb_modulo.id_modulo=`tb_allievo-modulo`.id_modulo and `tb_allievo-modulo`.id_allievo=?"))
   { 
      $stmt->bind_param("i",$all);
	  $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->moduli= $result;

   }
} 



function getModuliDocente($mysqli,$doc)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_modulo.* from tb_modulo,tb_docentemodulo
   where 
   tb_docentemodulo.id_modulo = tb_modulo.id_modulo and
   tb_docentemodulo.id_docente = ?")){ 
      $stmt->bind_param("i",$doc);
	  $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->moduli= $result;

   }
} 

function getMCP($mysqli,$id_modulo)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select tb_modulo.titolo as modulo,tb_corso.titolo as corso,tb_progetto.nomeprogetto as progetto FROM tb_modulo,tb_progetto,tb_corso where tb_progetto.id_progetto = tb_corso.id_progetto and tb_corso.id_corso = tb_modulo.id_corso and id_modulo =?")){ 
		$stmt->bind_param("i",$id_modulo);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $this->moduloDett= $result;

   }
}	



 
function getDettaglioModulo($mysqli,$id_modulo)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_modulo where id_modulo =?")){ 
		$stmt->bind_param("i",$id_modulo);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->moduloDett= $result;

   }
}	

function insertModulo($mysqli,$corsoid,$titolo,$durata,$user_id)
{

try
{
		$stmt = $mysqli->prepare("INSERT INTO `tb_modulo` (`id_corso`,`titolo`, `orepreviste`, `id_user_modifica`) VALUES (?,?,?,?)");  								


		 if ($stmt === false)
			die('prepare() failed: ' . htmlspecialchars($mysqli->error));	

		$rc = $stmt->bind_param("isdi",$corsoid,$titolo,$durata,$user_id);


		if ($rc === false)
			die('bind_param() failed: ' . htmlspecialchars($stmt->error));
		$rc = $stmt->execute();
		if ($rc === false)
			die('Inserire valori corretti!');
						
	

}

catch(Exception $e) {
    header("location: ../index.php"); 
	die("error");
}
}

function updateModulo($mysqli,$corsoid,$titolo,$durata,$user_id,$idmodulo)
{
try
{
$stmt = $mysqli->prepare("UPDATE tb_modulo set `id_corso`=?,`titolo`=?,`orepreviste`=?, `id_user_modifica`=?  where id_modulo=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("isdii",$corsoid,$titolo,$durata,$user_id,$idmodulo);


if ($rc === false)
	die('bind_param() failed: ' . htmlspecialchars($stmt->error));
$rc = $stmt->execute();
if ($rc === false)
	die('execute() failed: ' . htmlspecialchars($stmt->error));
					
}

catch(Exception $e) {
    //echo 'Message: ' .$e->getMessage();
	 header("location: ../index.php"); 
	die("error");
}
}

function deleteModulo($mysqli,$idmodulo)
{
/*	
IDProg

*/
try
{
$stmt = $mysqli->prepare("DELETE from tb_modulo  where id_modulo=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("i",$idmodulo);

if ($rc === false)
	die('bind_param() failed: ' . htmlspecialchars($stmt->error));
$rc = $stmt->execute();
if ($rc === false)
	die('execute() failed: ' . htmlspecialchars($stmt->error));
					
}

catch(Exception $e) {
    //echo 'Message: ' .$e->getMessage();
	 header("location: ../index.php"); 
	die("error");
}
}	
}
?>




