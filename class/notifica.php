<?php
class Notifica
{
   public $notifiche=[];
   public $numeronotifiche=0;
  

    function __construct()
    {
	
    }  
function getNotifiche($mysqli)
{
	try
{
       require_once('functions/functions.php');
}
catch(\error $ex)
{
	var_dump($ex);
	die();
}	
try
{

$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("SELECT * FROM tb_notifica where id_user_modifica  <> ".$_SESSION['user_id']." order by `data` desc")){ 
      $stmt->execute(); //esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->notifiche= $result;
	  $this->numeronotifiche=  $num_of_rows;

   }
}
catch(\error $ex)
{
	var_dump($ex);
	die();
}

} 

function deleteNotifica($mysqli,$idnotifica)
{
try
{
$stmt = $mysqli->prepare("DELETE from tb_notifica  where id_notifica=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("i",$idnotifica);

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