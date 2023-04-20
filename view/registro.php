<select id="elencocorsi" name="elencocorsi"><option value=0><Seleziona il corso></option        
		<?php
		require_once('../configurazione/database.php');						
		require_once('../class/corso.php');
		if(isset($_POST['codProgetto']))
			$codprogetto=$_POST['codProgetto'];
		else
			$codprogetto=0;
		$corso= new corso();								  
        $corso->getCorsiConNomeProgetto($mysqli,$codprogetto);
		while ($row=$corso->corsiprog->fetch_assoc()) {
			echo "<option value=".$row['IDCorso'].">".$row['TITOLO']."</option>";
 		}
		?>                      
			</select>

<script>
$(" .dettaglio-corsi").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_corso.php?IDCorso="+id);
  });
	</script>