
<?php 
/* 
*  Nel tutorial "Select dinamiche  di regioni, province e comuni con  Php, JQuery e Ajax"
*  che si può scaricare nell'Area Download - Tutorial e approfondimenti del sito www.maurodeberardis.it
*  questo codice è corredato da commenti e spiegazioni
*/  
header("Content-type: text/html; charset=utf-8");
 require_once('../configurazione/database.php');
if(!empty($_POST["codProgetto"]))
{
	
    $codProgetto=$_POST["codProgetto"];
	
	
	$sql = "SELECT * FROM tb_corso where id_progetto = ".$codProgetto." ORDER by titolo";

   $stmt = $mysqli->prepare($sql); 
	  
	  $stmt->execute();
$result = $stmt->get_result(); 

    echo '<option value="">Seleziona il corso</option>'; 
     if (mysqli_num_rows($result)>0)
		{
   while($rs= $result->fetch_assoc())
   {
        echo '<option value="'.$rs['id_corso'].'">'.$rs['titolo'].'</option>'; 
   }
    }  
}	

?>