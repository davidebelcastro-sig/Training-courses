<?php
class utente
{
   public $utenti=[];
   public $utenteDett=[];

function __construct()
    {
       
    }  
function getUtenti($mysqli)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("SELECT username,displayname,email FROM tb_account")){ 
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->utenti= $result;

   }
} 



/* da fare */
function getDettaglioUtente($mysqli,$idutente)
{
$mysqli->select_db("ltw");

   if ($stmt = $mysqli->prepare("SELECT username,displayname,email,sesso  FROM tb_account where id_account =?")){ 
		$stmt->bind_param("i",$idutente);
      $stmt->execute(); // esegue la query appena creata.
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      $this->utenteDett= $result;

   }
}
	

function insertUtente($mysqli, $user_name,$display_name,$email,$password,$sesso)
{

try
{

		$stmt = $mysqli->prepare("INSERT INTO `tb_account` (`username`, `displayname`, `password`, `email`,`sesso`) VALUES (?,?,?,?,?)");  								
		 if ($stmt === false)
			die('prepare() failed: ' . htmlspecialchars($mysqli->error));	
		$pass=password_hash( $password, PASSWORD_DEFAULT);
		$rc = $stmt->bind_param("sssss",$user_name,$display_name,$pass,$email,$sesso);


		if ($rc === false)
			die('bind_param() failed: ' . htmlspecialchars($stmt->error));
		$rc = $stmt->execute();
		if ($rc === false)
			die('execute() failed: ' . htmlspecialchars($stmt->error));
						
}

catch(Exception $e) {
    header("location: ../index.php"); 
	die("error");
}
}

function updateUtente($mysqli,$user_name,$display_name,$email,$password,$sesso,$user_id)
{
try
{
	$pass=password_hash( $password, PASSWORD_DEFAULT);
$stmt = $mysqli->prepare("UPDATE tb_account set `username`=?, `displayname`=?,`password`=?, `email`=?,`sesso`=?  where id_account=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("sssssi",$user_name,$display_name,$pass,$email,$sesso,$user_id);


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

function deleteUtente($mysqli,$user_id)
{
/*	
IDProg

*/
try
{
$stmt = $mysqli->prepare("DELETE from tb_account  where id_account=?");
 if ($stmt === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));										
$rc = $stmt->bind_param("i",$user_id);

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




