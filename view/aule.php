                <div class="container-fluid">
                <link rel="stylesheet" href="./vendor/datatables/jquery.dataTables.min.css">
                <script src="./vendor/datatables/jquery.dataTables.min.js"></script>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Aule</h1>
                    <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the-->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Elenco aule</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Seleziona</th>               
                                            <th>Nome</th>
											<th>Indirizzo</th>
                                            <th>Capienza</th>
                                            <th>Disponibilità da</th>
                                            <th>Disponibilità a</th>
                                        </tr>
                                    </thead>
                                   <tfoot>
                                        <tr>
                                            <th>Seleziona</th>               
                                            <th>Nome</th>
											<th>Indirizzo</th>
                                            <th>Capienza</th>
                                            <th>Disponibilità da</th>
                                            <th>Disponibilità a</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
									<?php 
		require_once('../class/aula.php');
		require_once('../configurazione/database.php');
		$elencoaule = new aula();								  
        $elencoaule->getAule($mysqli);
		while ($row=$elencoaule->aule->fetch_assoc()) {
		echo "<tr><td align= 'center'><a class='dettaglio-aule' id = ".$row["id_aula"]." href='#'><i class='fas fa-edit'></i></td><td>".$row['nome']."</td><td>".$row['indirizzo']."</td><td>".$row['capienza']."</td><td>".$row['disponibilitada']."</td><td>".$row['disponibilitaa']."</td></tr>";
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
 $(" .dettaglio-aule").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 $("#content").load("view/scheda_aula.php?id_aula="+id);
  });

  $(document).ready(function() {
  $('.table').DataTable();
});
  </script> 
        