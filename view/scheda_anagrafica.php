                <div class="container-fluid">

                  
							
		<?php
		require_once('../configurazione/database.php');
		require_once('../class/anagrafica.php');
		$anagrafica= new anagrafica();								  
        $anagrafica->getDettaglioAnagrafica($mysqli,$_GET["id_anagrafica"]);
		while ($row=$anagrafica->anagraficaDett->fetch_assoc()) {
		?>
		  <!-- Page Heading -->
		  
                    <h1 class="h3 mb-2 text-gray-800">Scheda Anagrafica</h1>
                   		
							<form class="user" action="business/insertAnagrafica.php" method="post"  onSubmit="return validate(this);" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-12">
									
								
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Cognome*</label><input type="text" class="" id="cognome" name="cognome" style="width:80%;" required value='<?php echo $row["cognome"]?>'> </input>
                                    </div>
								</div>	
								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Nome*</label><input type="text" class="" id="nome" name="nome" style="width:80%;" required value='<?php echo $row["nome"]?>'> </input>
                                    </div>
                                </div>
								
								
								 <div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">Provincia di nascita*</label><input type="text" class="" id="provincia_nascita" name="provincia_nascita" style="width:80%;" required value='<?php echo $row["provincia_nascita"]?>'> </input>
                                    </div>
								 </div>	
								<div class="row">
                                    <div class="col-sm-12">
                                      <label style="width:20%;">Data di nascita*</label><input type="text" class="" id="data_nascita" name="data_nascita" style="width:80%;" required value='<?php echo $row["data_nascita"]?>'> </input>
                                    </div>
                                </div>
								
								
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Cittadinanza*</label><select name="cittadinanza" id="cittadinanza" style="width:80%;" required <option value="">Seleziona cittadinanza</option>
										<?php 
		require_once('../class/cittadinanza.php');

		$elencocittadinanze= new cittadinanza();								  
        $elencocittadinanze->getCittadinanza($mysqli);
		while ($row1=$elencocittadinanze->cittadinanze->fetch_assoc()) {
		if ($row1['ID']==$row['cittadinanza_id'])
				$selezionato=" selected";
		else
				$selezionato="";			
		echo "<option value=".$row1['ID'].$selezionato.">".$row1['descrizione_cittadinanza']."</option>";
 		}
		?> 
</select>		
                                      </div>
								</div>

							

								<div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">Comune nascita*</label><input type="text" class="" id="comune_nascita" name="comune_nascita" style="width:80%;" required value='<?php echo $row["comune_nascita"]?>'> </input>
                                    </div>
								</div>
                                <div class="row">
									<div class="col-sm-12">
                                        <label style="width:20%;">CAP*</label><input type="text" class="" id="cap" name="cap" style="width:80%;" required value='<?php echo $row["cap_residenza"]?>'> </input>
                                    </div>                 
                                </div>
								 <div class="row">
									<div class="col-sm-12">						
                                      <label style="width:20%;">Indirizzo residenza*</label><input type="text" class="" id="residenza_indirizzo" name="residenza_indirizzo" style="width:80%;" required value='<?php echo $row["indirizzo_residenza"]?>'> </input>
                                    </div>
								</div>
									<div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">Provincia residenza*</label><input type="text" class="" id="residenza_provincia" name="residenza_provincia" style="width:80%;" required value='<?php echo $row["comune_residenza"]?>'> </input>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">Comune residenza*</label><input type="text" class="" id="residenza_comune" name="residenza_comune" style="width:80%;" required value='<?php echo $row["comune_residenza"]?>'> </input>
                                    </div>
								</div>	
								<div class="row">
									<div class="col-sm-12">	
                                       <label style="width:20%;">Codice Fiscale*</label><input type="text" class="" id="cf" name="cf" style="width:80%;" required value='<?php echo $row["cf"]?>'> </input>
                                    </div>
                                </div>
									<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Titolo di studio</label><input type="text" class="" id="titolo_studio" name="titolo_studio" style="width:80%;" value='<?php echo $row["titolo_studio"]?>'> </input>                                    
                                    </div>
								</div>
									<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Sito Web</label><input type="text" class="" id="web" name="web" style="width:80%;" value='<?php echo $row["web"]?>'> </input>                                    
                                    </div>
								</div>
									<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Indirizzo e-mail*</label><input type="text" class="" id="email" name="email" style="width:80%;" required value='<?php echo $row["email"]?>'> </input>                                    
                                    </div>
								</div>

						
						<div class="row">
                    <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="updanagrafica" onclick="Clicked(this);" value="Salva modifiche">
                    </div>
					                     <div class="col-sm-3" style="text-align:left;">
					
                        <input type="submit" class="btn btn-danger btn-icon-split" name="delanagrafica" onclick="Clicked(this);" value="Elimina">
                    </div>
				
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;"></input>
					<input type="hidden" class="" id="anag_id" name="anag_id" value="<?php echo $row["id_anagrafica"]?>" style="width:80%;"></input>
                </div>
  </form>
				<hr>		
					
					
				</div>	
		<?php					
		}	
		?>	
	
		<script>
function Clicked(button)
{
  document.getElementById("tipooperazione").value = button.name;
}
function Clickeddoc(button)
{
  document.getElementById("tipodocumento").value = button.name;
}
</script>
