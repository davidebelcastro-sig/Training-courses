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
}
?>


