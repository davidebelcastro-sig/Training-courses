<?php
class docente
{
   public $docenti=[];
   public $docenteDett=[];
   public $docentePerModulo=[];
function __construct()
    {
       
    }  
function getDocenti($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_anagrafica.*,tb_docente.oresvolte,tb_docente.guadagno,tb_docente.note FROM tb_docente,tb_anagrafica where tb_anagrafica.id_anagrafica = tb_docente.id_anagrafica")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->docenti= $result;

   }
}


function getDocente($mysqli,$id)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select tb_anagrafica.*,tb_docente.oresvolte,tb_docente.guadagno,tb_docente.note FROM tb_docente,tb_anagrafica where tb_anagrafica.id_anagrafica = tb_docente.id_anagrafica and tb_docente.id_anagrafica = ?")){ 
     $stmt->bind_param("i",$id);
	 $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $this->docenti= $result;

   }
} 


function getDocentiModulo($mysqli,$mod)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_anagrafica.*,tb_docente.oresvolte,tb_docente.guadagno,tb_docente.note 
   FROM tb_docente,tb_anagrafica,tb_docentemodulo
   where 
   tb_anagrafica.id_anagrafica = tb_docente.id_anagrafica and
   tb_docentemodulo.id_docente =  tb_anagrafica.id_anagrafica and
   tb_docentemodulo.id_docente = tb_docente.id_anagrafica and
   tb_docentemodulo.id_modulo = ?")){ 
		$stmt->bind_param("i",$mod);
	 $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->docenti= $result;

   }
} 

function getDocentiProgetto($mysqli,$prog)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_anagrafica.*,tb_docente.oresvolte,tb_docente.guadagno,tb_docente.note 
   FROM tb_docente,tb_anagrafica,`tb_docentemodulo`,tb_corso,tb_progetto,tb_modulo
   where tb_anagrafica.id_anagrafica = tb_docente.id_anagrafica
   and `tb_docentemodulo`.id_docente = tb_anagrafica.id_anagrafica 
    and `tb_docentemodulo`.id_docente = tb_docente.id_anagrafica 
	 and `tb_docentemodulo`.id_modulo= tb_modulo.id_modulo and tb_modulo.id_corso = tb_corso.id_corso and tb_corso.id_progetto=tb_progetto.id_progetto and tb_progetto.id_progetto=?")){ 
      $stmt->bind_param("i",$prog);
	 $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->docenti= $result;

   }
} 


function getDocentiPerModulo($mysqli,$idcorso)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_anagrafica.nome,tb_anagrafica.cognome, tb_modulo.titolo from tb_anagrafica,tb_modulo where tb_modulo.id_docente = tb_anagrafica.id_anagrafica and tb_modulo.id_corso = ? ")){ 
   $stmt->bind_param("i",$idcorso);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->docentePerModulo= $result;

   }
} 


function getDettaglioDocente($mysqli,$idente)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_docente where id_anagrafica = ?")){ 
		$stmt->bind_param("i",$idente);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->docenteDett= $result;

   }
}
	

function insertDocente($mysqli,$idanagr,$note,$user_id)
{

try
{
	
		$stmt = $mysqli->prepare("INSERT INTO `tb_docente` (`id_anagrafica`,`note`,`id_user_modifica`) VALUES (?,?,?)"); 							


		 if ($stmt === false)
			die('prepare() failed: ' . htmlspecialchars($mysqli->error));	

		$rc = $stmt->bind_param("isi",$idanagr,$note,$user_id);


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


function updateDocente($mysqli,$note,$user_id,$iddocente)
{
try
{
$stmt = $mysqli->prepare("UPDATE tb_docente set `note`=?,`id_user_modifica`=?  where id_anagrafica=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("sii",$note,$user_id,$iddocente);


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

function deleteDocente($mysqli,$idanagr)
{
/*	
IDProg

*/
try
{
$stmt = $mysqli->prepare("DELETE from tb_docente  where id_anagrafica=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("i",$idanagr);

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




