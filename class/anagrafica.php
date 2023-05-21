<?php
class anagrafica
{
   public $anagrafiche=[];
   public $anagraficaDett=[];
function __construct()
    {
       
    }  
function getAnagrafica($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_anagrafica")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->anagrafiche= $result;

   }
}

function getDocenti($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_anagrafica.* FROM tb_anagrafica,tb_docente where tb_anagrafica.id_anagrafica = tb_docente.id_anagrafica")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->anagrafiche= $result;

   }
} 

function getAllievi($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  tb_anagrafica.* FROM tb_anagrafica,tb_allievo where tb_anagrafica.id_anagrafica = tb_allievo.id_anagrafica")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->anagrafiche= $result;

   }
} 


function getAnagraficaDocente($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  id_anagrafica,nome,cognome FROM tb_anagrafica where id_anagrafica not in((select distinct  id_anagrafica from tb_docente) union (select distinct  id_anagrafica from tb_allievo))")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->anagrafiche= $result;

   }
} 





function getAnagraficaAllievi($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  id_anagrafica,nome,cognome FROM tb_anagrafica where id_anagrafica not in((select distinct  id_anagrafica from tb_docente) union (select distinct  id_anagrafica from tb_allievo))")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->anagrafiche= $result;

   }
} 


function getAnagraficaMyPerson($mysqli,$anag)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  id_anagrafica,nome,cognome FROM tb_anagrafica where id_anagrafica=?")){ 
     $stmt->bind_param("i",$anag);
	 $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->anagrafiche= $result;

   }
} 




function getDettaglioAnagrafica($mysqli,$idanag)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("select distinct  * FROM tb_anagrafica where id_anagrafica =?")){ 
		$stmt->bind_param("i",$idanag);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->anagraficaDett= $result;

   }
} 



function insertAnagrafica($mysqli,$cognome,$nome,$provincia_nascita,$data_nascita,$cittadinanza,$comune_nascita,$cap,
							$residenza_indirizzo,$residenza_provincia,$residenza_comune,$cf,$titolo_studio,$web,$mail,
							$user_id)
{

try
{



$stmt = $mysqli->prepare("INSERT INTO tb_anagrafica(cognome,nome,provincia_nascita,data_nascita,cittadinanza_id,comune_nascita,cap_residenza,
indirizzo_residenza,provincia_residenza,comune_residenza,cf,titolo_studio,web,email,id_user_modifica	) VALUES ( ?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?)");
if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("ssssisssssssssi",$cognome,$nome,$provincia_nascita,$data_nascita,$cittadinanza,$comune_nascita,$cap,
							$residenza_indirizzo,$residenza_provincia,$residenza_comune,$cf,$titolo_studio,$web,$mail,
							$user_id);

if ($rc === false)
	die('bind_param() failed: ' . htmlspecialchars($stmt->error));
$rc = $stmt->execute();
if ($rc === false)
	die('Inserire valori corretti!');
					
}

catch(Exception $e) {
	echo "Inserire valori corretti";die();
    //echo 'Message: ' .$e->getMessage();
	echo "error";	
}
}	


function updateAnagrafica($mysqli,$idanag,$cognome,$nome,$provincia_nascita,$data_nascita,$cittadinanza,$comune_nascita,$cap,
							$residenza_indirizzo,$residenza_provincia,$residenza_comune,$cf,$titolo_studio,$web,$mail,
							$user_id)
{

try
{
$stmt = $mysqli->prepare("UPDATE tb_anagrafica SET cognome=?,nome=?,provincia_nascita=?,data_nascita=?,cittadinanza_id=?,comune_nascita=?,cap_residenza=?,
indirizzo_residenza=?,provincia_residenza=?,comune_residenza=?,cf=?,titolo_studio=?,web=?,email=?,id_user_modifica=?	where id_anagrafica=?"); 

if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("ssssisssssssssii",$cognome,$nome,$provincia_nascita,$data_nascita,$cittadinanza,$comune_nascita,$cap,
							$residenza_indirizzo,$residenza_provincia,$residenza_comune,$cf,$titolo_studio,$web,$mail,
							$user_id,$idanag);
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
$stmt = $mysqli->prepare("DELETE from tb_anagrafica where id_anagrafica=?");
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

}
?>


