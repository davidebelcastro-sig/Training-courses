<?php
if(isset($_GET['day']) && is_numeric($_GET['day']))
{
  $day = $_GET['day'];
   require_once('../configurazione/database.php');
  $sql = "SELECT * FROM appuntamenti WHERE str_data=$day";
  
    
	  $stmt = $mysqli->prepare($sql); 
	  
	  $stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$user = $result->fetch_assoc(); // fetch data   

    while($user = $result->fetch_assoc())
    {
      $id = stripslashes($user['id']);
      $titolo = stripslashes($user['titolo']);
      $testo = stripslashes($user['testo']);
      $data = date("d-m-Y", $user['str_data']); 
      echo "Appuntamenti del <b>$data</b><br>" . $titolo . "<br>" . $testo . "<br>
      <a href=\"cancella.php?id=$id\">Cancella</a> |
      <a href=\"modifica.php?id=$id\">Modifica</a>
      <hr>";
    }
 
}
?>