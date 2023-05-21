                <div class="container-fluid">

                  
							
		<?php
		require_once('../class/corso.php');
		require_once('../configurazione/database.php');
		$corso= new corso();								  
        $corso->getDettaglioCorso($mysqli,$_GET["id_corso"]);
		while ($row=$corso->corsoDett->fetch_assoc()) {
		?>
		  <!-- Page Heading -->
		  
                    <h1 class="h3 mb-2 text-gray-800">Scheda Corso</h1>
                   		
							<form class="user" action="business/insertCorso.php" method="post"  onSubmit="return validate(this);">
                                <div class="row">
                                    <div class="col-sm-12">
									 <label style="width:20%;">PROGETTO*</label><select name="progettoid" id="progettoid" style="width:80%;"required><option value="">Seleziona progetto</option>
		<?php 
		require_once('../class/progetto.php');
		
		$elencoprogetti= new Progetto();								  
        $elencoprogetti->getProgetti($mysqli);
		while ($row1=$elencoprogetti->progetti->fetch_assoc()) {
		if ($row1['id_progetto']==$row['id_progetto'])
				$selezionato=" selected";
		else
				$selezionato="";			
		echo "<option value=".$row1['id_progetto'].$selezionato.">".$row1['nomeprogetto']."</option>";
 		}
		?> 
</select>		
                            </div>
                                </div>
								
								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">TITOLO</label><input type="text" class="" id="TITOLO" name="TITOLO" style="width:80%;" value='<?php echo $row["titolo"]?>'> </input>
                                    </div>
                                </div>
											
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">INIZIO</label><input type="text" class="" id="INIZIO" name="INIZIO" style="width:80%;" value='<?php echo $row["dtinizio"]?>'> </input>
                                      </div>
								</div>
								<div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">FINE</label><input type="text" class="" id="FINE" name="FINE" style="width:80%;"  value='<?php echo $row["dtfine"]?>'> </input>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">H PREV</label><input type="text" class="" id="HPREV" name="HPREV" style="width:80%;" value='<?php echo $row["orepreviste"]?>'> </input>
                                    </div>
								</div>
                                <div class="row">
									<div class="col-sm-12">
                                        <label style="width:20%;">N_ALLIEVI PREV</label><input type="text" class="" id="NALLIEVIPREV" name="NALLIEVIPREV" style="width:80%;" value='<?php echo $row["numallieviprevisti"]?>'> </input>
                                    </div>                 
                                </div>
								
							
					  <hr>		
						<div class="row">
                    <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="updcorso" onclick="Clicked(this);" value="Salva modifiche"></span>
                    </div>
					                     <div class="col-sm-6" style="text-align:left;">
					
                        <input type="submit" class="btn btn-danger btn-icon-split" name="delcorso" onclick="Clicked(this);" value="Elimina"></span>
                    </div>
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;"></input>
					<input type="hidden" class="" id="idcorso" name="idcorso" value="<?php echo $row["id_corso"]?>" style="width:80%;"></input>
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

   function validate() {
        var $valid = true;
        document.getElementById("nomeprogetto").innerHTML = "";
        document.getElementById("enti").innerHTML = "";
        var nomeprog = document.getElementById("nomeprogetto").value;
        var ente = document.getElementById("enti").value;
        if(nomeprog == "") 
        {
            document.getElementById("nomeprogetto").innerHTML = "required";
        	$valid = false;
        }
        if(ente == "") 
        {
        	document.getElementById("enti").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }

</script>
