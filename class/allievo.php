<?php
class allievo
{
   public $allievi=[];
   public $allievipercorso=[];
   public $allievoDett=[];
function __construct()
    {
       
    }  
function getAllievi($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_anagrafica.*,tb_allievo.oresvolte,tb_allievo.note FROM tb_allievo,tb_anagrafica where tb_anagrafica.id_anagrafica = tb_allievo.id_anagrafica")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->allievi= $result;

   }
} 


function getAllieviModulo($mysqli,$mod)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_anagrafica.*,tb_allievo.oresvolte,tb_allievo.note FROM tb_allievo,tb_anagrafica,`tb_allievo-modulo`
   where 
   tb_anagrafica.id_anagrafica = tb_allievo.id_anagrafica and 
   tb_anagrafica.id_anagrafica = `tb_allievo-modulo`.id_allievo and
   `tb_allievo-modulo`.id_allievo = tb_allievo.id_anagrafica and 
   `tb_allievo-modulo`.id_modulo = ?")){ 
      $stmt->bind_param("i",$mod);
	 $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->allievi= $result;

   }
} 


function getAllieviProgetto($mysqli,$prog)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct   tb_anagrafica.*,tb_allievo.oresvolte,tb_allievo.note 
   FROM tb_anagrafica,tb_allievo,`tb_allievo-modulo`,tb_progetto,tb_corso,tb_modulo where 
   tb_anagrafica.id_anagrafica = tb_allievo.id_anagrafica
   and 
   `tb_allievo-modulo`.id_allievo = tb_allievo.id_anagrafica
   and 
   `tb_allievo-modulo`.id_allievo = tb_anagrafica.id_anagrafica
   and 
   `tb_allievo-modulo`.id_modulo = tb_modulo.id_modulo and tb_modulo.id_corso = tb_corso.id_corso and tb_corso.id_progetto=tb_progetto.id_progetto and tb_progetto.id_progetto=?")){ 
    $stmt->bind_param("i",$prog);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->allievi= $result;

   }
}





function getAllieviPerCorso($mysqli,$idcorso)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_anagrafica.*,tb_allievo.note,tb_allievo.oresvolte from tb_anagrafica,`tb_allievo-modulo`,tb_modulo,tb_allievo where tb_allievo.id_anagrafica = tb_anagrafica.id_anagrafica and tb_anagrafica.id_anagrafica = `tb_allievo-modulo`.id_allievo and `tb_allievo-modulo`.id_modulo = tb_modulo.id_modulo and tb_modulo.id_corso=?")){ 
   $stmt->bind_param("i",$idcorso);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->allievipercorso= $result;

   }
} 

/* da fare */
function getDettaglioAllievo($mysqli,$idente)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_allievo where id_anagrafica = ?")){ 
		$stmt->bind_param("i",$idente);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->allievoDett= $result;

   }
}
	

function insertAllievo($mysqli,$idanagr,$idazienda,$id_ccnl,$note,$user_id)
{

try
{
	
		$stmt = $mysqli->prepare("INSERT INTO `tb_allievo` (`id_anagrafica`,`id_azienda`, `id_ccnl`, `note`,`id_user_modifica`) VALUES (?,?,?,?,?)"); 							


		 if ($stmt === false)
			die('prepare() failed: ' . htmlspecialchars($mysqli->error));	

		$rc = $stmt->bind_param("iiisi",$idanagr,$idazienda,$id_ccnl,$note,$user_id);


		if ($rc === false)
			die('bind_param() failed: ' . htmlspecialchars($stmt->error));
		$rc = $stmt->execute();
		if ($rc === false)
			die('Inserire valori corretti!');
						
	}
	

catch(Exception $e) {
	//echo "Inserire valori corretti";die();
    header("location: ../index.php"); 
	die("error");
}
}


function updateAllievo($mysqli,$idazienda,$id_ccnl,$note,$user_id,$idallievo)
{
try
{
$stmt = $mysqli->prepare("UPDATE tb_allievo set `id_azienda`=?, `id_ccnl`=?,`note`=?,`id_user_modifica`=?  where id_anagrafica=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("iisii",$idazienda,$id_ccnl,$note,$user_id,$idallievo);


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

function deleteAllievo($mysqli,$idanagr)
{
try
{
$stmt = $mysqli->prepare("DELETE from tb_allievo  where id_anagrafica=?");
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




