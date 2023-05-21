<?php 
require("include/calvars.inc");
?>
<html>
<head>
<title>Conferma presenza</title>
<link rel="stylesheet" href="styles/calstyles.css" type="text/css">
<SCRIPT SRC="include/functions.js"></SCRIPT>
</head>
<?php 
 require_once('../configurazione/database.php');




?>
<body class="popdetail">
<?php 


if ((isset( $_POST['ststring'])) && (isset($_POST['etstring'])) && (isset($_POST['desc'])))
{
  $ststring= $_POST['ststring'].":00";
  $etstring= $_POST['etstring'].":00";
  $desc= $_POST['desc'];
  
  $id_lez=$_POST['lezioneid'];


	

$sql = "INSERT INTO tb_regpresdoc (`id_lezione_modulo`, `inizio`, `fine`,  `note`) VALUES (".$id_lez.",'".$ststring."','".$etstring."','".$desc."')";


$src=$stmt = $mysqli->prepare($sql); 
if ($src === false)
die("Presenza gia confermata!");					  
$src=$stmt->execute();
if ($src === false)
die("Presenza gia confermata!");			


  print "<CENTER><BR>Presenza del docente confermata correttamente<BR><BR>";
  print "<a id='calendario' href='#' onClick=\"self.close()\">click per chiudere</a></CENTER>";


}
else{
$id_lez=$_GET['id'];
	?>
<body class="popdetail" onLoad="document.AddEvnt.dstring.focus()">
<em><b>Conferma</b></em>
<form action="confPresD.php" method="POST" name="AddEvnt">
<p>
Ora inizio: <input type="text" size="5" id="ststring" name="ststring" required> (Use hh:mm format)
</p>
<p>
Ora fine: <input type="text" size="5" id ="etstring" name="etstring" required> (Use hh:mm format)
</p>

<p>Descrizione: <input type="text" size=50 maxlength=50 name="desc"></p>
<input type="hidden" id="lezioneid" name="lezioneid" value="<?php echo $id_lez ?>">
<input type="submit" name="addrec" value="Conferma">

</form>

</p>
</body>
</html>
<?php
}
?>
 <script src="../vendor/jquery/jquery.min.js"></script>
<script>
 $("#calendario").on("click",function(){
        $("#content").load("agenda/index.php");
}); 

	</script>