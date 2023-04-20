<?php 
require("include/calvars.inc");
?>
<html>
<head>
<title>Aggiungi lezione</title>
<link rel="stylesheet" href="styles/calstyles.css" type="text/css">
<SCRIPT SRC="include/functions.js"></SCRIPT>
</head>
<?php 
 require_once('../configurazione/database.php');



if(isset($_POST['addrec']))  // 'Add Record' BUTTON CLICKED
{
?>
<body class="popdetail">
<?php 
  $dstring = $_POST['dstring']; //$dstring." ".$TZONE;
  $datestamp = strtotime($dstring);
  $ststring= $_POST['ststring'];
  $etstring= $_POST['etstring'];
  $desc= $_POST['desc'];
  $recur= $_POST['recur'];
  $resource=$_POST['resource'];
 if((isset($_POST['progetto']))&& ($_POST['corso']!=""))
	$id_progetto= $_POST['progetto'];
else
	$id_progetto= 0;
if((isset($_POST['corso']))&& ($_POST['corso']!=""))
	$id_corso= $_POST['corso'];
else
	$id_corso= 0;
$id_modulo=$_POST['modulo'];
$id_doc=$_POST['docente'];
  if($time_standard == 0) //24 hour time
  {
     $stimestamp = strtotime($ststring); //$ststring);
     $etimestamp = strtotime($etstring); //$etstring);
 }
  else if($time_standard == 1) //12 hour time
  {
      $ststring = $ststring.$saorp;
      $stimestamp = strtotime($ststring);
      $etstring = $etstring.$eaorp;
      $etimestamp = strtotime($etstring);
  }

  if(!isset($resource) || $resource == "")
     $resource = "n/e";

$sql = "INSERT INTO ".$events_table." (`datestamp`, `stimestamp`, `etimestamp`, `resource`, `descr`, `id_progetto`, `id_corso`, `id_modulo`, `id_docente` ) VALUES (".$datestamp.",'".$stimestamp."','".$etimestamp."','".$resource."','".$desc."',".$id_progetto.",".$id_corso.",".$id_modulo.",".$id_doc.")";

$src=$stmt = $mysqli->prepare($sql); 
if ($src === false)
	//echo("Statement failed: ". $mysqli->error . "<br>");
	die('L\' aula potrebbe essere occupata e\o il modulo potrebbe avere una lezione in questo giorno');					  
$src=$stmt->execute();
if ($src === false)
	//echo("Statement failed: ". $mysqli->error . "<br>");
	die('L\' aula potrebbe essere occupata e\o il modulo potrebbe avere una lezione in questo giorno');			
if($recur != "none")
  {
	  $numrecur= $_POST['numrecur'];
      $i=1;
      while($i < $numrecur)
      {
          if($recur == "daily")
             $nextdstamp = future_date($datestamp,"d",1);
          else if($recur == "weekly")
             $nextdstamp = future_date($datestamp,"w",1);
          else if($recur == "monthly")
             $nextdstamp = future_date($datestamp,"m",1);
          else if($recur == "yearly")
             $nextdstamp = future_date($datestamp,"y",1);
          $datestamp = $nextdstamp;
          $sql = "INSERT INTO ".$events_table." (`datestamp`, `stimestamp`, `etimestamp`, `resource`, `descr`, `id_progetto`, `id_corso`, `id_modulo`, `id_docente` ) VALUES (".$datestamp.",".$stimestamp.",".$etimestamp.",'".$resource."','".$desc."',".$id_progetto.",".$id_corso.",".$id_modulo.",".$id_doc.")";
        $stmt = $mysqli->prepare($sql); 
	  
	  $stmt->execute();
          $i++;
      }
  }
 

  print "<CENTER><BR>Lezione aggiunta correttamente<BR><BR>";
  print "<a id='calendario' href='#' onClick=\"self.close()\">click per chiudere</a></CENTER>";

 // mysql_close($conn);
}
else  // HAVE NOT CLICKED 'Add Record' YET
{



	?>
<body class="popdetail" onLoad="document.AddEvnt.dstring.focus()">
<em><b>Aggiungi lezione</b></em>
<form action="add.php" method="POST" name="AddEvnt">
<?php 
if($date_standard == 0) // ISO Standard yyyy-mm-dd
{
?>
Giorno: <input type="text" size="10" readonly name="dstring" value="<?php echo $_GET['daystamp'] ?>"> (yyyy-mm-dd)
<?php 
} // end ISO Standard
else if($date_standard == 1) // American style mm/dd/yyyy
{
?>
Giorno: <input type="text" size="10" readonly  name="dstring" value="<?php echo $_GET['daystamp'] ?>"> (mm/dd/yyyy)
<?php 
} // end American style
if($time_standard == 0) //24 hour time
{
?>
<p>
Ora inizio: <input type="text" size="5" name="ststring" required> (Use hh:mm format)
</p>
<p>
Ora fine: <input type="text" size="5" name="etstring" required> (Use hh:mm format)
</p>
<?php 
} //end 24 hour time
else if($time_standard == 1)  //12 hour time
{
?>
<p>
Ora inizio: <input type="text" size="5" name="ststring"required>
<input type="radio" name="saorp" value="am">AM
<input type="radio" name="saorp" value="pm">PM (Use hh:mm format)
</p>
<p>
Ora fine: <input type="text" size="5" name="etstring"required>
<input type="radio" name="eaorp" value="am">AM
<input type="radio" name="eaorp" value="pm">PM (Use hh:mm format)
</p>
<?php 
} //end 12 hour time


$sql = "SELECT id_progetto,`nomeprogetto` FROM tb_progetto ORDER by `nomeprogetto`";

   $stmt = $mysqli->prepare($sql); 
	  
	  $stmt->execute();



$result = $stmt->get_result(); // get the mysqli result

 

?>

<select  id = "progetto" name="progetto" required>
		<option  value = "" >Seleziona il progetto </option > 
		<?php 
		  if (mysqli_num_rows($result)>0)
		  {
			 while($rs= $result->fetch_assoc())
   {
				echo  '<option value = "' . $rs['id_progetto']. '">' . $rs[ "nomeprogetto"]."</option>"; 
			} 
}
		?> 
	</select >
	<br/><br/>
<p>Corso:		<select  id = "corso" name = "corso" required> </p>
		<option value="">Seleziona il corso</option > 
	</select>

<br/><br/>
<p>Modulo:	<select  id = "modulo" name = "modulo" required></p>
		<option value="">Seleziona il modulo</option > 
	</select>
<br/><br/>
	<p>Docente:<select  id = "docente" name = "docente" required></p>
		<option value="">Seleziona docente</option > 
	</select>
<p>Aula: <select name="resource" id="resource" size="1" required></p>
<?php 
// Populate drop-down box with resources (locations)
$sql = "SELECT * FROM ".$locations_table." ORDER by nome";

   $stmt = $mysqli->prepare($sql); 
	  
	  $stmt->execute();



$result = $stmt->get_result(); // get the mysqli result
   if (mysqli_num_rows($result)>0)
{
   while($rs= $result->fetch_assoc())
   {
?>
    <OPTION><?php  echo $rs["nome"]; ?></OPTION>
<?php  }
}

?>
    </select></p>
	

<p>Descrizione: <input type="text" size=50 maxlength=50 name="desc" required></p>
<DIV id="recurdiv">
Ricorrenza:&nbsp;
<SELECT name="recur" id "recur" onChange="rbox_handler()">
  <OPTION value="none">none</OPTION>
  <OPTION value="daily">daily</OPTION>
  <OPTION value="weekly">weekly</OPTION>
  <OPTION value = "monthly">monthly</OPTION>
  <OPTION value="yearly">yearly</OPTION>
</SELECT>&nbsp;&nbsp;one time only
</DIV>
<BR>
<input type="submit" name="addrec" value="Aggiungi lezione">

</form>

</p>
</body>
</html>
<?php 
} //end top else
?>
 <script src="../vendor/jquery/jquery.min.js"></script>
<script>
 $("#calendario").on("click",function(){
        $("#content").load("agenda/index.php");
}); 
$(document).ready(function(){
	
		var scegli = '<option value="0">Scegli...</option>';
		var attendere = '<option value="0">Attendere...</option>';
		
		$("select#corso").html(scegli);
		$("select#corso").attr("disabled", "disabled");
		$("select#modulo").html(scegli);
		$("select#modulo").attr("disabled", "disabled");
		$("select#docente").html(scegli);
		$("select#docente").attr("disabled", "disabled");
	
		$("select#progetto").change(function(){
			var id_prog = $("select#progetto option:selected").attr('value');
			$("select#corso").html(attendere);
			$("select#modulo").html(attendere);
			$("select#docente").html(attendere);
			if (this.value == '')
			{
		$("select#corso").html(scegli);
		$("select#corso").attr("disabled", "disabled");
		$("select#modulo").html(scegli);
		$("select#modulo").attr("disabled", "disabled");
		$("select#docente").html(scegli);
		$("select#docente").attr("disabled", "disabled");
			}
			else
			{
			
			$.post("../business/select-Corsiprog.php", {id_progetto:id_prog}, function(data){
			$("select#corso").removeAttr("disabled");
			$("select#corso").html(data);
			var id_cor = $("select#corso option:selected").attr('value');
			
			$("select#modulo").html(attendere);
			$("select#docente").html(attendere);
			if (this.value == '')
			{
				$("select#modulo").attr("disabled", "disabled");
				$("select#docente").attr("disabled", "disabled");
			}
			else
			{
			$.post("../business/select-ModCorsi.php", {id_corso:id_cor}, function(data){
			$("select#modulo").removeAttr("disabled");
			
			$("select#modulo").html(data);
			var id_mod = $("select#modulo option:selected").attr('value');
			$("select#docente").html(attendere);
if (this.value == '')
			{
			
				$("select#docente").attr("disabled", "disabled");
			}

			else
			{
				
			$.post("../business/select-ModDoc.php", {id_modulo:id_mod}, function(data){
			$("select#docente").removeAttr("disabled"); 
			
				$("select#docente").html(data);
				});
				}
				});	
			




				}				
				});
				};	
				
		
				
			
		});	
	
	
	
	
	
	
	

		$("select#corso").change(function(){
			var id_mod = $("select#corso option:selected").attr('value');
			$("select#modulo").html("Seleziona modulo");
			if (this.value == '')
			{
				$("select#modulo").attr("disabled", "disabled");
			}
			else
			{
			$.post("../business/select-ModCorsi.php", {id_corso:id_mod}, function(data){
			$("select#modulo").removeAttr("disabled"); 
			$("select#modulo").html(data);
			var id_mod = $("select#modulo option:selected").attr('value');
			if (this.value == '')
			{
				$("select#docente").attr("disabled", "disabled");
			}
						else
			{
				
			$.post("../business/select-ModDoc.php", {id_modulo:id_mod}, function(data){
			$("select#docente").removeAttr("disabled"); 
			
				$("select#docente").html(data);
				});
				}




				});
				};	
			
		});
		
		
		
		
		
		$("select#modulo").change(function(){
			var id_mod = $("select#modulo option:selected").attr('value');
	if (this.value == '')
			{
				$("select#docente").attr("disabled", "disabled");
			}
						else
			{
				
			$.post("../business/select-ModDoc.php", {id_modulo:id_mod}, function(data){
			$("select#docente").removeAttr("disabled"); 
			
				$("select#docente").html(data);
				});
				}
			
		});	
	   });
	</script>