
                <!-- Begin Page Content -->
                <div class="container-fluid">


		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Aggiungi allievo</h1>
                   		
							<form class="user" action="business/insertAllievo.php" method="post" >	
							<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Note</label><input type="text" class="" id="descrizione" name="descrizione" style="width:80%;" value=""> </input>                                    
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Anagrafica*</label><select id="anagrid" name="anagrid" style="width:80%;" required><option value="">Seleziona Anagrafica</option>
                                   <?php 
		require_once('../class/anagrafica.php');
		require_once('../configurazione/database.php');
		$elencoAnagrafiche = new anagrafica();								  
        $elencoAnagrafiche->getAnagraficaAllievi($mysqli);
		while ($row=$elencoAnagrafiche->anagrafiche->fetch_assoc()) {
			
		echo "<option value=".$row['id_anagrafica'].">".$row['nome']." ".$row['cognome']."</option>";
 		}
		?> 
</select>
</div>
</div>	
		  <hr>		
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="addallievo"  value="Aggiungi"></span>
                    </div>
					 <div class="col-sm-6" style="text-align:left;">
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="addallievo" style="width:80%;">
					                   
					
                        <input type="reset" class="btn btn-danger btn-icon-split" name="resallievo" value="Annulla"></span>
                    </div>
                </div>
                            </form>
				<hr>					
			
								
	
							
