<?php
class cittadinanza
{
   public $cittadinanze=[];
   public $cittadinanzaDett=[];
function __construct()
    {
       
    }  
function getCittadinanza($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("SELECT * FROM tb_cittadinanza")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->cittadinanze= $result;

   }
} 

function getDettagliocittadinanza($mysqli,$idcittadinanza)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("SELECT * FROM tb_cittadinanza where ID =?")){ 
		$stmt->bind_param("i",$idanag);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->cittadinanzaDett= $result;

   }
} 

/*

function insertAnagrafica($mysqli,$naturagiu_id,$cognome,$nome,$luogo_nascita,$data_nascita,$cittadinanza,$residenza_pr,$residenza_città,$residenza_cap,
							$residenza_indirizzo,$cf,$partita_iva,$titolo_studio,$web,$mail,
							$allegatocv,$allegatodoc,$tipo_doc_id)
{

try
{



$stmt = $mysqli->prepare("INSERT INTO tb_anagrafica(naturagiu_id,cognome,nome,luogo_nascita,data_nascita,cittadinanza,residenza_pr,residenza_città,residenza_cap,residenza_indirizzo,cf,partita_iva,titolo_studio,web,email,allegatocv,allegatodoc,tipo_doc	) VALUES ( ?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?,?,?)");
if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("issssisssssssssbbi",$naturagiu_id,$cognome,$nome,$luogo_nascita,$data_nascita,$cittadinanza,$residenza_pr,$residenza_città,$residenza_cap,
							$residenza_indirizzo,$cf,$partita_iva,$titolo_studio,$web,$mail,
							$allegatocv,$allegatodoc,$tipo_doc_id);

//$rc = $stmt->bind_param("isssdsssssss",$entefinanziante,$tipo,$codprog,$cup,$cc,$nomeprogetto,$resp,$rend,$iniziogenerale,$fineogenerale,$duratamesi,$avviso);
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


function updateAnagrafica($mysqli,$idanag,$naturagiu_id,$cognome,$nome,$luogo_nascita,$data_nascita,$cittadinanza,$residenza_pr,$residenza_città,$residenza_cap,
							$residenza_indirizzo,$cf,$partita_iva,$titolo_studio,$web,$mail,
							$allegatocv,$allegatodoc,$tipo_doc_id)
{

try
{
$stmt = $mysqli->prepare("UPDATE tb_anagrafica SET naturagiu_id=?,cognome=?,nome=?,luogo_nascita=?,data_nascita=?,cittadinanza=?,residenza_pr=?,residenza_città=?,residenza_cap=?,residenza_indirizzo=?,cf=?,partita_iva=?,titolo_studio=?,web=?,email=?,allegatocv=?,allegatodoc=?,tipo_doc_id=?	where anag_id=?"); 
if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("issssisssssssssbbii",$naturagiu_id,$cognome,$nome,$luogo_nascita,$data_nascita,$cittadinanza,$residenza_pr,$residenza_città,$residenza_cap,
							$residenza_indirizzo,$cf,$partita_iva,$titolo_studio,$web,$mail,
							$allegatocv,$allegatodoc,$tipo_doc,$idanag);

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


function deleteAnagrafica($mysqli,$idanag)
{

try
{
$stmt = $mysqli->prepare("DELETE from tb_anagrafica where id_anag=?");
if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("i",$idanag);

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
*/
}
?>


