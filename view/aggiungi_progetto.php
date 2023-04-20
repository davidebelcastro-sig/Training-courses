
                <!-- Begin Page Content -->
                <div class="container-fluid">

                  
							
		
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Aggiungi progetto</h1>
                   		
							<form class="user" action="business/insertprog.php" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
									<label style="width:20%;">NOME PROGETTO*</label><input type="text" class=""name = "NOMEPROGETTO" id= "NOMEPROGETTO" style="width:80%;" required></input>
									
                                      </div>
                                </div>
								
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">ENTE FINANZIANTE</label><select name="enti" id="enti" style="width:80%;"><option value="">Seleziona ente</option>
		<?php 
		require_once('../class/entefinanziante.php');
		require_once('../configurazione/database.php');
		$elencoEnti= new Entefinanziante();								  
        $elencoEnti->getEnte($mysqli);
		while ($row=$elencoEnti->enti->fetch_assoc()) {
			
		echo "<option value=".$row['id_entefinanziante'].">".$row['denominazione']."</option>";
 		}
		?> 
</select>		
										
										
										
                                      </div>
								</div>
								 <div class="row">
									<div class="col-sm-12">						
                                      <label style="width:20%;">INIZIO GENERALE</label><input type="text" class="" id="INIZIOGENERALE" name="INIZIOGENERALE" style="width:80%;" > </input>
                                    </div>
								</div>
								<div class="row">
									<div class="col-sm-12">	
                                       <label style="width:20%;">FINE GENERALE</label><input type="text" class="" id="FINEGENERALE" name="FINEGENERALE"style="width:80%;" > </input>
                                    </div>
                                </div>
								
								<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">ALLIEVI PREVISTI</label><input type="text" class="" id="ALLIEVIPREVISTI"  name="ALLIEVIPREVISTI" style="width:80%;" > </input>   
                                    </div>
                                </div>
								<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">ORE PREVISTE</label><input type="text" class="" id="OREPREVISTE" name="OREPREVISTE" style="width:80%;"> </input>
                                    </div>
								 </div>
						  <hr>		
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="addproject" onclick="Clicked(this);" value="Aggiungi"></span>
                    </div>
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="addproject" style="width:80%;">
					                     <div class="col-sm-6" style="text-align:left;">
					
                        <input type="reset" class="btn btn-danger btn-icon-split" name="resproject" value="Annulla"></span>
                    </div>
                </div>
                            </form>
	
				</div>			
