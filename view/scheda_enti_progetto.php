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
                    <h1 class="h3 mb-2 text-gray-800">Enti finanzianti per Progetto <?php echo $row["id_progetto"]?></h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Elenco enti</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
											 <th>Seleziona</th>																             
                                            <th>Denominazione</th>
											 <th>Progetti</th>
                                          
                                        </tr>
                                    </thead>
                                   <tfoot>
                                        <tr>
                                          	 <th>Seleziona</th>																           
                                            <th>Denominazione</th>
                                           <th>Progetti</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
									<?php 
		require_once('../class/entefinanziante.php');
		require_once('../configurazione/database.php');
		$elencoEnti= new Entefinanziante();								  
        $elencoEnti->getEnteProgetto($mysqli,$row["id_progetto"]);
		while ($row=$elencoEnti->enti->fetch_assoc()) {	
		echo "<tr><td align= 'center'><a class='dettaglio-enti' id = ".$row["id_entefinanziante"]." href='#'><i class='fas fa-edit'></i></a></td><td>".$row['denominazione']."</td>
		<td align= 'center'><a class='dettaglio-enti2' id = ".$row["id_entefinanziante"]." href='#'><i class='fas fa-edit'></i></a></td>
		</tr>" ;
 		}
		?>                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
		<?php					
		}	
		?>	
		
		 <script>
 $(" .dettaglio-enti").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_EnteFinanziante.php?id_entefinanziante="+id);
  });
  </script> 
 <script>
 $(" .dettaglio-enti2").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_EnteFinanziante_progetto.php?id_entefinanziante="+id);
  });
  </script> 
		