<?php 
require("include/calvars.inc");
?>
<html>
<head>
<title>Modifica lezione</title>
<link rel="stylesheet" href="styles/calstyles.css" type="text/css">
<SCRIPT SRC="include/functions.js"></SCRIPT>
</head>
<body class="popdetail">
<?php 
require_once('../configurazione/database.php');
$id_lezione=$_GET['id'];
$sql2 = "SELECT * FROM ".$events_table." WHERE id = ".$id_lezione;
$src=$stmt = $mysqli->prepare($sql2); 
 if ($src === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));						  
$src=$stmt->execute();
if ($src === false)
	die('execute() failed: ' . htmlspecialchars($mysqli->error));						  
$result2 = $stmt->get_result(); // get the mysqli result

 if (mysqli_num_rows($result2)>0)
 {
	
$rs2= $result2->fetch_assoc();

$datestamp = $rs2['datestamp'];
$stimestamp = $rs2['stimestamp'];
$etimestamp = $rs2['etimestamp'];
$loc = $rs2['resource'];
$desc = $rs2['descr'];
$id_modulo=$rs2['id_modulo'];
if($date_standard == 0) // ISO Standard yyyy-mm-dd
$ddata = strftime("%Y-%m-%d",$datestamp);
if($date_standard == 1) // American style mm/dd/yyyy
$ddata = strftime("%m/%d/%Y",$datestamp);
$stdata = strftime("%H:%M",$stimestamp);
$etdata = strftime("%H:%M",$etimestamp);
 }
 else{
	 
$ddata = "";
$stdata = "";
$etdata = "";
$loc = "";
$desc = "";
$id_modulo=""; 
 }

?>

<p><em><b>Modifica lezione</b></em></p>
<form action="../business/modcalendario.php" method="POST">

Giorno: <input readonly type="text" size="10" id="dstring" name="dstring" value=<?php echo $ddata?>> (Use yyyy-mm-dd Format)
</p>

<p>
Inizio: <input type="text" size="5" id="ststring" name="ststring" value=<?php echo $stdata?> required> (Use hh:mm format)
</p>
<p>
Fine: <input type="text" size="5" id="etstring" name="etstring" value=<?php echo $etdata?> required> (Use hh:mm format)
</p>
<?php 


 
// Populate drop-down box with resources (locations)

$sql="SELECT * FROM ".$locations_table." ORDER by nome";  
  $src=$stmt = $mysqli->prepare($sql); 

 if ($src === false)
	die('prepare() failed: ' . htmlspecialchars($mysqli->error));						  
$src=$stmt->execute();
if ($src === false)
	die('execute() failed: ' . htmlspecialchars($mysqli->error));						  
$result = $stmt->get_result(); // get the mysqli result
?>
<p>Aula: <select id="resource" name="resource" size="1" required>
<?php
if (mysqli_num_rows($result)>0)
{
  while($rs= $result->fetch_assoc())
   {
?>
    <OPTION <?php if($loc == $rs['nome']) echo "selected" ?>><?php  echo $rs["nome"]; ?></OPTION>
<?php  }
}

?>
    </select></p>
	
<p>Docente: <select id="docente" name="docente" size="1">
<?php
require_once('../class/docente.php');

$elencoDocenti = new docente();								  
$elencoDocenti->getDocentiModulo($mysqli,$id_modulo);
while ($row=$elencoDocenti->docenti->fetch_assoc()) {
	echo "<option value=".$row['id_anagrafica'].">".$row['nome']." ".$row['cognome']."</option>";
		}

?>
    </select></p>
    <p>Descrizione: <input type="text" size=50 maxlength=50 name="desc" value="<?php echo $desc?>" required></p>
	<input type="hidden" name="tipooperazione"  id="tipooperazione" value="modifica">
	<input type="hidden" name="id_lezione"  id="id_lezione" value="<?php echo $id_lezione ?>">
<table border="0" cellspacing="0" cellpadding="3">
<tr>
<td><input type="submit" name="update" value="Update"></td>
</tr>
</table>
</form>


</body>
</html>

