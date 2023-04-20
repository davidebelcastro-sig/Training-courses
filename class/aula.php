<?php
class aula
{
   public $aule=[];
   public $aulaDett=[];


    private $ds;

    function __construct()
    {
       
    }  
function getAule($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("SELECT * FROM tb_aula")){ 
      $stmt->execute(); //esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->aule= $result;

   }
} 

function getDettaglioAula($mysqli,$idaula)
{
$mysqli->select_db("ltw");
 
   if ($stmt = $mysqli->prepare("SELECT * FROM tb_aula where id_aula =?")){ 
		$stmt->bind_param("i",$idaula);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->aulaDett= $result;

   }
} 
function insertAula($mysqli,$nome,$indirizzo,$capienza,$dispDa,$dispA,$user_id)
{

try
{
$stmt = $mysqli->prepare("INSERT INTO tb_aula(nome,indirizzo,capienza,disponibilitada,disponibilitaa,id_user_modifica) VALUES (?,?,?,?,?,?)");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));	

$rc = $stmt->bind_param("ssissi",$nome,$indirizzo,$capienza,$dispDa,$dispA,$user_id);


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


function updateAula($mysqli,$idaula,$nome,$indirizzo,$capienza,$dispDa,$dispA,$user_id)
{

try
{

$stmt = $mysqli->prepare("UPDATE tb_aula set nome=?,indirizzo=?,capienza=?,disponibilitada=?,`disponibilitaa`=?,`id_user_modifica`=? where id_aula=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("ssissii",$nome,$indirizzo,$capienza,$dispDa,$dispA,$user_id,$idaula);

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

function deleteAula($mysqli,$idaula)
{
try
{
$stmt = $mysqli->prepare("DELETE from tb_aula  where id_aula=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("i",$idaula);

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