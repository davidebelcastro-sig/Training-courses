                <div class="container-fluid">
                <link rel="stylesheet" href="./vendor/datatables/jquery.dataTables.min.css">
                <script src="./vendor/datatables/jquery.dataTables.min.js"></script>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Anagrafiche</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Elenco anagrafiche</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>		
											<th>Seleziona</th>   
                                            <th>Cognome</th>               
                                            <th>Nome</th>
											<th>CF</th>
                                        </tr>
                                    </thead>
                                   <tfoot>
                                        <tr>		
											<th>Seleziona</th>   
                                            <th>Cognome</th>               
                                            <th>Nome</th>
											<th>CF</th>  
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
									<?php 
		require_once('../class/anagrafica.php');
		require_once('../configurazione/database.php');
		$elencoanagrafiche= new Anagrafica();								  
        $elencoanagrafiche->getAnagrafica($mysqli);
		while ($row=$elencoanagrafiche->anagrafiche->fetch_assoc()) {
		echo "<tr><td align= 'center'><a class='dettaglio-anagrafiche' id = ".$row["id_anagrafica"]." href='#'><i class='fas fa-edit'></i></a></td><td>".$row['cognome']."</td><td>".$row['nome']."</td><td>".$row['cf']."</td></tr>";
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
  $(" .dettaglio-anagrafiche").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_anagrafica.php?id_anagrafica="+id);
  });


  $(document).ready(function() {
  $('.table').DataTable();
});

  </script> 