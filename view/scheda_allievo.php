                            <div class="container-fluid">
				
	  		
							
		<?php	
		require_once('../class/modulo.php');
		require_once('../class/allievo.php');
		require_once('../configurazione/database.php');	
		require_once('../class/anagrafica.php');
		$allievo= new allievo();								  
        $allievo->getDettaglioAllievo($mysqli,$_GET["id_allievo"]);
		
		
				if(isset($_GET["IDNOT"]))
		{
			require_once('../class/notifica.php');
			$notifica= new notifica();								  
        $notifica->deleteNotifica($mysqli,$_GET["IDNOT"]);
		}
		
		while ($row=$allievo->allievoDett->fetch_assoc()) {
		?>
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Allievo ID <?php echo $row["id_anagrafica"]?></h1>
					<form class="user" action="business/insertAllievo.php" method="post"  onSubmit="return validate(this);">       
							<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Note</label><input type="text" class="" id="descrizione" name="descrizione" style="width:80%;" value="<?php echo $row['note'] ?>"> </input>                                    
                                    </div>
								</div>            		
							
                            								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Anagrafica*</label><select id="anagrid" name="anagrid" style="width:80%;" required><option value="">Seleziona Anagrafica</option>
                                   <?php 
	require_once('../class/anagrafica.php');
	$elencoAnagrafica = new anagrafica();								  
        $elencoAnagrafica->getAnagraficaMyPerson($mysqli,$row['id_anagrafica']);
		while ($row1=$elencoAnagrafica->anagrafiche->fetch_assoc()) {
		if ($row1['id_anagrafica']==$row['id_anagrafica'])	
				$selezionato=" selected";
			else
				$selezionato="";		
		echo "<option value=".$row1['id_anagrafica'].$selezionato.">".$row1['nome']." ".$row1['cognome']."</option>";
 		}
		?> 
</select>
	</div>	
		</div>		
      	   <div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Azienda</label><input type="text" class="" id="AZIENDA" name="AZIENDA" style="width:80%;"  value="<?php echo $row['id_azienda'] ?>"> </input>                                  
                                    </div>
								</div>
								<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Ccnl</label><input type="text" class="" id="CCNL" name="CCNL" style="width:80%;" value="<?php echo $row['id_ccnl'] ?>"> </input>                                
                                    </div>
								</div>
		  <hr>			
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="modallievo" onclick="Clicked(this);" value="Salva modifiche"></span>
                    </div>
					                     <div class="col-sm-6" style="text-align:left;">
					
                        <input type="submit" class="btn btn-danger btn-icon-split" name="delallievo" onclick="Clicked(this);" value="Elimina"></span>
                    </div>
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;"></input>
					<input type="hidden" class="" id="idallievo" name="idallievo" value="<?php echo $row["id_anagrafica"] ?>" style="width:80%;"></input>
                </div>
                            </form>
				<hr>	
	<?php					
		}	
		?>	
	
		<script>
function Clicked(button)
{
  document.getElementById("tipooperazione").value = button.name;
}
    function validate(form) {
		var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var userName = document.getElementById("user_name").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }


	   // Selezione form e definizione dei metodi di validazione
  
		</script>								
							
