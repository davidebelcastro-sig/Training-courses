
                <div class="container-fluid">
	
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Imposta Enti in dashboard</h1>	
							<form class="user" action="business/impostaDashboard.php" method="post"  onSubmit="return validate();">
                                <div class="row">
                                    <div class="col-sm-12">
									 <label style="width:20%;">Nome Ente*</label><select name = "enteid[]" id= "enteid[]" style="width:80%;" required multiple ><option value="">Seleziona ente</option>
									
		<?php 
		require_once('../class/entefinanziante.php');
		require_once('../configurazione/database.php');
		$elencoEnti = new Entefinanziante();								  
        $elencoEnti->getEnte($mysqli);
		while ($row=$elencoEnti->enti->fetch_assoc()) {
			
		echo "<option value=".$row['IDEntefinanz'].">".$row['denominazione']."</option>";
 		}
		?> 
</select>
                                      </div>
                                </div>
								
								
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="confermaimp"   value="Conferma"></span>
					
                    </div>
					
                </div>
                            </form>
						
		
	

