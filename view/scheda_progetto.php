                <!-- Begin Page Content -->
                <div class="container-fluid">

<script>
   function clickme(valore) {
document.getElementById('tipooperazione').value=valore;
    }
</script>                  
							
		<?php
		require_once('../configurazione/database.php');
		require_once('../class/progetto.php');
		$progetto= new Progetto();								  
        $progetto->getDettaglioProgetto($mysqli,$_GET["id_progetto"]);
		
		if(isset($_GET["IDNOT"]))
		{
			require_once('../class/notifica.php');
			$notifica= new notifica();								  
        $notifica->deleteNotifica($mysqli,$_GET["IDNOT"]);
		}
		while ($row=$progetto->progettoDett->fetch_assoc()) {
		?>
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Progetto ID <?php echo $row["id_progetto"]?></h1>
                   		
							<form class="user" action="business/insertprog.php" method="post"  onSubmit="return validate(this);">
                                <div class="row">
                                    <div class="col-sm-12">
						
									 <label style="width:20%;">NOME PROGETTO*</label><input type="text" class="" id="NOMEPROGETTO" name="NOMEPROGETTO" style="width:80%;" value='<?php echo $row["nomeprogetto"]?>' required></input>
                                      </div>
                                </div>
								
								
								 <div class="row">
                                    <div class="col-sm-12">
									
									 <label style="width:20%;">ENTE FINANZIANTE</label><select name="enti" id="enti" style="width:80%;"><option value="">Seleziona ente</option>
		<?php 
		require_once('../class/entefinanziante.php');
		$elencoEnti= new Entefinanziante();								  
        $elencoEnti->getEnte($mysqli);
		while ($row1=$elencoEnti->enti->fetch_assoc()) {
		if ($row1['id_entefinanziante']==$row['id_entefinanziante'])
				$selezionato=" selected";
		else
				$selezionato="";			
		echo "<option value=".$row1['id_entefinanziante'].$selezionato.">".$row1['denominazione']."</option>";
 		}
		?> 
</select>		
									
									  </div>
								</div>
								 <div class="row">
									<div class="col-sm-12">						
                                      <label style="width:20%;">INIZIO GENERALE</label><input type="text" class="" id="INIZIOGENERALE" name="INIZIOGENERALE" style="width:80%;" value='<?php echo $row["dtinizio"]?>'> </input>
                                    </div>
								</div>
								<div class="row">
									<div class="col-sm-12">	
                                       <label style="width:20%;">FINE GENERALE</label><input type="text" class="" id="FINEGENERALE" name="FINEGENERALE" style="width:80%;" value='<?php echo $row["dtfine"]?>'> </input>
                                    </div>
                                </div>
								<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">ALLIEVI PREVISTI</label><input type="text" class="" id="ALLIEVIPREVISTI" name="ALLIEVIPREVISTI" style="width:80%;"  value='<?php echo $row["numallieviprevisti"]?>'> </input>   
                                    </div>
                                </div>
								<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">ORE PREVISTE</label><input type="text" class="" id="OREPREVISTE" name="OREPREVISTE" style="width:80%;" value='<?php echo $row["numorepreviste"]?>'> </input>
                                    </div>
								 </div>
								
 
	  <hr>		
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="modproject" id="modproject"onclick="clickme(this.id);" value="Salva modifiche"></span>
                    </div>
					                     <div class="col-sm-6" style="text-align:left;">
					
                        <input type="submit" class="btn btn-danger btn-icon-split" name="delproject" id="delproject" onclick="clickme(this.id);" value="Elimina"></span>
                    </div>
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;"></input>
					<input type="hidden" class="" id="idprogetto" name="idprogetto" value="<?php echo $row["id_progetto"]?>" style="width:80%;"></input>
                </div>
                            </form>
				<hr>	
		<?php					
		}	
		?>	
</div>