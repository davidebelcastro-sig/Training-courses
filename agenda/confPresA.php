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
 
$id_modulo=$_GET['id_modulo'];
$id_lezione=$_GET['id'];
	?>
<em><b>Inserire le presenze</b></em>
<form action="../business/insertpresenzeA.php" method="POST" name="AddEvnt">

<p>Note: <textarea rows="4" cols="50" id="note" name="note"></textarea></p>
<p>Allievi presenti: <size=50 maxlength=50 name="all" required></p>
<?php 

		require_once('../class/allievo.php');
		require_once('../configurazione/database.php');
		$elencoAllievi = new allievo();
        $elencoAllievi->getAllieviModulo($mysqli,$id_modulo);

		while ($row=$elencoAllievi->allievi->fetch_assoc()) 
		{
			
		?>
		<input type="checkbox" id="chkallievi[]" name="chkallievi[]" value="<?php echo $row['id_anagrafica'] ?>"><?php echo $row['nome']." ".$row['cognome'] ?> <br />  
	  <?php
		}
		?> 
		<br>
		<input type="hidden" id="modid" name="modid" value="<?php echo $id_modulo ?>">
<input type="hidden" id="id_lezione" name="id_lezione" value="<?php echo $id_lezione ?>"> 
<input type="submit" name="Submit" value="Conferma">  

 </form>
</body>
</html>

 <script src="../vendor/jquery/jquery.min.js"></script>
<script>
 $("#calendario").on("click",function(){
        $("#content").load("agenda/index.php");
}); 

	</script>