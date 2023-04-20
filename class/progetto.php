<?php
class Progetto
{
   public $progetti=[];
   public $progettoDett=[];
   public $progettiDashboard=[];
   public $progettipernome=[];

    private $ds;

    function __construct()
    {
	  
    }  
function getProgetti($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_progetto order by `dtfine` desc")){ 
      $stmt->execute(); //esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->progetti= $result;

   }
} 

function getProgettiDocente($mysqli,$doc)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_progetto.* FROM tb_progetto,tb_corso,tb_modulo,`tb_docentemodulo` where tb_progetto.id_progetto=tb_corso.id_progetto and tb_modulo.id_corso = tb_corso.id_corso and tb_modulo.id_modulo=`tb_docentemodulo`.id_modulo and `tb_docentemodulo`.id_docente= ? order by `dtfine` desc")){ 
      $stmt->bind_param("i",$doc);
	  $stmt->execute(); //esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->progetti= $result;

   }
} 

function getProgettiAllievo($mysqli,$all)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_progetto.* FROM tb_progetto,tb_corso,tb_modulo,`tb_allievo-modulo` where `tb_allievo-modulo`.id_modulo = tb_modulo.id_modulo and `tb_allievo-modulo`.id_allievo = ? and tb_modulo.id_corso = tb_corso.id_corso and tb_corso.id_progetto = tb_progetto.id_progetto order by `dtfine` desc")){ 
      $stmt->bind_param("i",$all);
	  $stmt->execute(); //esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->progetti= $result;

   }
} 

function getProgettiEnte($mysqli,$ente)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_progetto.* FROM tb_progetto,`tb_progetto-ente`
   where `tb_progetto-ente`.id_progetto = tb_progetto.id_progetto and 
   `tb_progetto-ente`.id_ente = ?
    order by `dtfine` desc")){ 
      $stmt->bind_param("i",$ente);
	  $stmt->execute(); //esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->progetti= $result;

   }
} 


function getProgettiOrdperNome($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_progetto order by `nomeprogetto`")){ 
      $stmt->execute(); //esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->progettipernome= $result;

   }
} 

function getDettaglioProgetto($mysqli,$idprogetto)
{
$mysqli->select_db("ltw");
 
   if ($stmt = $mysqli->prepare("select distinct  * from tb_progetto where id_progetto =?"))
   { 
		$stmt->bind_param("i",$idprogetto);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->progettoDett= $result;
   }
} 
/*function insertProgetto($mysqli,$entefinanziante,$tipo,$codprog,$cup,$cc,$nomeprogetto,
						$resp,$rend,$iniziogenerale,$fineogenerale,$duratamesi,$avviso,$dataapprovazione,
						$avvioazioni,$fineazioni,$datarendicontazione,
						$allieviprevisti,$allieviiscritti,$allievifinali,$orepreviste,$user_id)
{
	*/
function insertProgetto($mysqli,$entefinanziante,$nomeprogetto,$iniziogenerale,$fineogenerale,$allieviprevisti,$orepreviste,$user_id)
{
/*	
IDProg

*/
try
{

$stmt = $mysqli->prepare("INSERT INTO tb_progetto(id_entefinanziante,`nomeprogetto`,
													`dtinizio`,`dtfine`,
													`numallieviprevisti`,`numorepreviste`,`id_user_modifica`) VALUES (?,?,?,?,?,?,?)");
 if ($stmt === false)

	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
/*$rc = $stmt->bind_param("isssdsssssdsssssiiidi",$entefinanziante,$tipo,$codprog,$cup,$cc,$nomeprogetto,
						$resp,$rend,$iniziogenerale,$fineogenerale,$duratamesi,$avviso,$dataapprovazione,
						$avvioazioni,$fineazioni,$datarendicontazione,
						$allieviprevisti,$allieviiscritti,$allievifinali,$orepreviste,$user_id);
						*/

$rc = $stmt->bind_param("isssidi",$entefinanziante,$nomeprogetto,
						$iniziogenerale,$fineogenerale,
						$allieviprevisti,$orepreviste,$user_id);

//$rc = $stmt->bind_param("isssdsssssss",$entefinanziante,$tipo,$codprog,$cup,$cc,$nomeprogetto,$resp,$rend,$iniziogenerale,$fineogenerale,$duratamesi,$avviso);
if ($rc === false)
	die('bind_param() failed: ' . htmlspecialchars($stmt->error));
$rc = $stmt->execute();
if ($rc === false)
	die('Inserire valori corretti!');	
}

catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
	die("error");	
}
}


function updateProgetto($mysqli,$entefinanziante,$nomeprogetto,$iniziogenerale,$fineogenerale,$allieviprevisti,$orepreviste,$user_id,$idprog)
{

try
{
$stmt = $mysqli->prepare("UPDATE tb_progetto set id_entefinanziante=?,`nomeprogetto`=?,
													`dtinizio`=?,`dtfine`=?,
													`numallieviprevisti`=?,`numorepreviste`=?,`id_user_modifica`=?  where id_progetto=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));

						
$rc = $stmt->bind_param("isssidii",$entefinanziante,$nomeprogetto,
						$iniziogenerale,$fineogenerale,
						$allieviprevisti,$orepreviste,$user_id,$idprog);

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

function deleteProgetto($mysqli,$idprog)
{
/*	
IDProg

*/
try
{
$stmt = $mysqli->prepare("DELETE from tb_progetto  where id_progetto=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("i",$idprog);

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
//non ho capito che fa
function getProgettiDashboard($mysqli)
{
	try
{
$mysqli->select_db("ltw");

$stmt = $mysqli->prepare("select distinct  * FROM `tb_progetto` inner join tb_entefinanziante on tb_progetto.id_entefinanziante=tb_entefinanziante.id_entefinanziante where tb_entefinanziante.dashboard=0 order by `tb_progetto`.`dtfine` desc");
if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));				     
$stmt->execute(); //esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->progettiDashboard= $result;

   }
   
   catch(Exception $e) {
    //echo 'Message: ' .$e->getMessage();
	die("error");	
}
} 


}
?>