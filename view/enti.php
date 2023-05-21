
                <div class="container-fluid">
                <link rel="stylesheet" href="./vendor/datatables/jquery.dataTables.min.css">
                <script src="./vendor/datatables/jquery.dataTables.min.js"></script>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Enti</h1>
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
        $elencoEnti->getEnte($mysqli);
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
   <script>
 $(" .dettaglio-enti").on("click",function(){
	var select = $(this);
    var id = select.attr('id');
 $("#content").load("view/scheda_EnteFinanziante.php?id_entefinanziante="+id);
  });

 $(" .dettaglio-enti2").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 $("#content").load("view/scheda_EnteFinanziante_progetto.php?id_entefinanziante="+id);
  });

  $(document).ready(function() {
  $('.table').DataTable();
});



  </script> 
  
