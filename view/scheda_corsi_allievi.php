   <div class="container-fluid">
<script>
   function clickme(valore) {
document.getElementById('tipooperazione').value=valore;
    }
</script>                        
							
		<?php
		require_once('../configurazione/database.php');
		require_once('../class/corso.php');
		$corso= new corso();								  
        $corso->getDettaglioCorso($mysqli,$_GET["id_corso"]);
		while ($row=$corso->corsoDett->fetch_assoc()) {
		?>	   
		
		     <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Allievi per il corso</h1>
                                  <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Elenco allievi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
												
											 <th>Seleziona</th>																          
                                            <th>Cognome</th>
											 <th>Nome</th>
											 <th>Codice fiscale</th>
											  <th>Note</th>
											 <th>Ore svolte</th>   
											  <th>Moduli</th>
											   <th>Corsi</th>
											    <th>Progetti</th>
											
								
                                        </tr>
                                    </thead>
                                   <tfoot>
                                        <tr>
                                        	 <th>Seleziona</th>																          
                                            <th>Cognome</th>
											 <th>Nome</th>
											 <th>Codice fiscale</th>
											   <th>Note</th>
											 <th>Ore svolte</th>   
											  <th>Moduli</th>
											   <th>Corsi</th>
											    <th>Progetti</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
									<?php 
		

		require_once('../class/allievo.php');
		require_once('../configurazione/database.php');
		$elencoAllievi = new allievo();								  
        $elencoAllievi->getAllieviPerCorso($mysqli,$row["id_corso"]);
		while ($row=$elencoAllievi->allievipercorso->fetch_assoc()) {
		echo "<tr><td align= 'center'><a class='dettaglio-allievi' id = ".$row["id_anagrafica"]." href='#'><i class='fas fa-edit'></i></a></td><td>".$row['cognome']."</td><td>".$row['nome']."</td><td>".$row['cf']."</td><td>".$row['note']."</td><td>".$row['oresvolte']."</td>
		<td align= 'center'><a class='dettaglio-allievi1' id = ".$row["id_anagrafica"]." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='dettaglio-allievi2' id = ".$row["id_anagrafica"]." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='dettaglio-allievi3' id = ".$row["id_anagrafica"]." href='#'><i class='fas fa-edit'></i></a></td>
		</tr>";
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
 $(" .dettaglio-allievi").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_allievo.php?id_allievo="+id);
  });
  </script> 


    <script>
 $(" .dettaglio-allievi1").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_allievi_moduli.php?id_allievo="+id);
  });
  </script> 
  
      <script>
 $(" .dettaglio-allievi2").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_allievi_corsi.php?id_allievo="+id);
  });
  </script> 
  
      <script>
 $(" .dettaglio-allievi3").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_allievi_progetti.php?id_allievo="+id);
  });
  </script> 
		
