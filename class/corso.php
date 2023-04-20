<?php
class corso
{
   public $corsi=[];
   public $corsi_progetto=[];
   public $corsoDett=[];
   public $corsiprog=[];
function __construct()
    {
       
    }  
function getCorsi($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_corso")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->corsi= $result;

   }
} 

function getCorsiperProgetto($mysqli,$id_progetto)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_corso where id_progetto=?")){ 
	  $stmt->bind_param("i",$id_progetto);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->corsi_progetto= $result;

   }
} 


function getCorsiAllievo($mysqli,$all)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_corso.* FROM tb_corso,`tb_allievo-modulo`,tb_modulo where `tb_allievo-modulo`.id_modulo=tb_modulo.id_modulo and tb_modulo.id_corso = tb_corso.id_corso and `tb_allievo-modulo`.id_allievo=?")){ 
		$stmt->bind_param("i",$all);
	 $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->corsi= $result;

   }
} 

function getCorsiDocente($mysqli,$doc)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_corso.* FROM tb_corso,`tb_docentemodulo`,tb_modulo where `tb_docentemodulo`.id_modulo=tb_modulo.id_modulo and tb_modulo.id_corso = tb_corso.id_corso and `tb_docentemodulo`.id_docente=?")){ 
		$stmt->bind_param("i",$doc);
	 $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->corsi= $result;

   }
} 


function getCorsiConNomeProgetto($mysqli,$idprogetto)
{
$mysqli->select_db("ltw");
if ($idprogetto==0)
{
	$sql="select distinct  tb_corso.*,tb_progetto.nomeprogetto from tb_corso,tb_progetto where tb_corso.id_progetto = tb_progetto.id_progetto";
}
else
{
	$sql="select distinct  tb_corso.*,tb_progetto.nomeprogetto as nomeprogetto from tb_corso,tb_progetto where tb_corso.id_progetto = tb_progetto.id_progetto and tb_corso.id_progetto = ?";
}

   if ($stmt = $mysqli->prepare($sql)){ 
	if ($idprogetto!=0)
		$stmt->bind_param("i",$idprogetto);
    $stmt->execute(); // esegue la query appena creata.
    $result = $stmt->get_result();
    $num_of_rows = $result->num_rows;
    $this->corsiprog= $result;

   }
} 



function getCorsiConNomeProgetto2($mysqli,$idprogetto)
{
	
$mysqli->select_db("ltw");

$sql="select distinct  tb_corso.*,tb_progetto.nomeprogetto from tb_corso,tb_progetto where tb_corso.id_progetto = tb_progetto.id_progetto and tb_corso.id_progetto=?";


   if ($stmt = $mysqli->prepare($sql)){ 
		$stmt->bind_param("i",$idprogetto);
    $stmt->execute(); // esegue la query appena creata.
    $result = $stmt->get_result();
    $num_of_rows = $result->num_rows;
    $this->corsiprog= $result;

   }
} 




function getDettaglioCorso($mysqli,$idente)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_corso where tb_corso.id_corso = ?")){ 
		$stmt->bind_param("i",$idente);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->corsoDett= $result;

   }
} 
function insertCorso($mysqli,$progettoid,$titolo,$inizio,$fine,$hprev,$nallieviprev,$user_id)
{

try
{
$stmt = $mysqli->prepare("INSERT INTO tb_corso(id_progetto,titolo,dtinizio,
												dtfine,orepreviste,numallieviprevisti,id_user_modifica) VALUES ( ?,?,?,?,?, ?,?)");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("isssdii",$progettoid,$titolo,$inizio,$fine,$hprev,$nallieviprev,$user_id);

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


function updateCorso($mysqli,$progettoid,$titolo,$inizio,$fine,$hprev,$nallieviprev,$user_id,$corsoid)
{

try
{
$stmt = $mysqli->prepare("UPDATE tb_corso set id_progetto=?,titolo=?,dtinizio=?,
												dtfine=?,orepreviste=?,numallieviprevisti=?,id_user_modifica=? where id_corso=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("isssdiii",$progettoid,$titolo,$inizio,$fine,$hprev,$nallieviprev,$user_id,$corsoid);

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


function deleteCorso($mysqli,$corsoid)
{

try
{
$stmt = $mysqli->prepare("DELETE from tb_corso where id_corso=?");

 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("i",$corsoid);

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


