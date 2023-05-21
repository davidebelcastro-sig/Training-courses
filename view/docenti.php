
                <div class="container-fluid">
                <link rel="stylesheet" href="./vendor/datatables/jquery.dataTables.min.css">
                <script src="./vendor/datatables/jquery.dataTables.min.js"></script>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Docenti</h1>
                                  <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Elenco docenti</h6>
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
											  <th>Guadagno in euro</th>
											  <th>Moduli</th>
											   <th>Corsi</th>
											    <th>Progetti</th>
											<th>Genera contratto</th>
								
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
											  <th>Guadagno in euro</th>
											  <th>Moduli</th>
											   <th>Corsi</th>
											    <th>Progetti</th>
												<th>Genera contratto</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
									<?php 
		

		require_once('../class/docente.php');
		require_once('../configurazione/database.php');
		$elencoDocenti = new docente();								  
        $elencoDocenti->getDocenti($mysqli);
		while ($row=$elencoDocenti->docenti->fetch_assoc()) {
		echo "<tr><td align= 'center'><a class='dettaglio-docenti' id = ".$row["id_anagrafica"]." href='#'><i class='fas fa-edit'></i></a></td><td>".$row['cognome']."</td>
		<td>".$row['nome']."</td><td>".$row['cf']."</td><td>".$row['note']."</td>
		<td>".$row['oresvolte']."</td><td>".$row['guadagno']."</td>
		<td align= 'center'><a class='dettaglio-docenti1' id = ".$row["id_anagrafica"]." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='dettaglio-docenti2' id = ".$row["id_anagrafica"]." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='dettaglio-docenti3' id = ".$row["id_anagrafica"]." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='contratto' id = ".$row["id_anagrafica"]." href='./fpdf185/prova.php?id_docente=".$row["id_anagrafica"]."'><i class='fas fa-edit'></i></a></td>
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

    <script>
 $(" .dettaglio-docenti").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 $("#content").load("view/scheda_docente.php?id_docente="+id);
  });

 $(" .dettaglio-docenti1").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 $("#content").load("view/scheda_docente_moduli.php?id_docente="+id);
  });

 $(" .dettaglio-docenti2").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 $("#content").load("view/scheda_docente_corsi.php?id_docente="+id);
  });

 $(" .dettaglio-docenti3").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 $("#content").load("view/scheda_docente_progetti.php?id_docente="+id);
  });

  $(document).ready(function() {
  $('.table').DataTable();
});


  </script> 
