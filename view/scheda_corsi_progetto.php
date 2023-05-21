 
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
		while ($row=$progetto->progettoDett->fetch_assoc()) {
		?>	
		

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Corsi per il progetto</h1>
               
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Elenco corsi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>Seleziona</th>																
                                            <th>Nome progetto</th>               
                                            <th>Titolo</th>              
                                            <th>Inizio</th>
                                            <th>Fine</th>
											<th>Ore previste</th>
											<th>Ore inserite</th>
											<th>Ore svolte</th>
                                            <th>Num allievi previsti</th>               												
                                            <th>Allievi iscritti</th>               												             
											<th>Allievi</th>
											<th>Moduli</th>
                                        </tr>
                                    </thead>
                                   <tfoot>
                                        <tr>
                                        <th>Seleziona</th>																
                                            <th>Nome progetto</th>               
                                            <th>Titolo</th>              
                                            <th>Inizio</th>
                                            <th>Fine</th>
											<th>Ore previste</th>
											<th>Ore inserite</th>
											<th>Ore svolte</th>
                                            <th>Num allievi previsti</th>               												
                                            <th>Allievi iscritti</th>               												             
											<th>Allievi</th>
											<th>Moduli</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
		<?php 
			


		require_once('../configurazione/database.php');						
		require_once('../class/corso.php');
		$corso= new corso();	
        $corso->getCorsiConNomeProgetto2($mysqli,$row["id_progetto"]);
	

			
		while ($row=$corso->corsiprog->fetch_assoc()) {
			$sqla="create view miavista as select distinct  tb_anagrafica.*,tb_allievo.note,tb_allievo.oresvolte from tb_anagrafica,`tb_allievo-modulo`,tb_modulo,tb_allievo where tb_allievo.id_anagrafica = tb_anagrafica.id_anagrafica and tb_anagrafica.id_anagrafica = `tb_allievo-modulo`.id_allievo and `tb_allievo-modulo`.id_modulo = tb_modulo.id_modulo and tb_modulo.id_corso=".$row['id_corso'].";";
			$result = $mysqli->query($sqla);
			$SQL ="select count(*) as numero from miavista;";
			$sql2 = "drop view miavista";
			$result = $mysqli->query($SQL);
			$row1 = $result->fetch_assoc();	
			
		echo "<tr><td align= 'center'><a class='dettaglio-corsi' id = ".$row['id_corso']." href='#'><i class='fas fa-edit'></i></a></td><td>".$row["nomeprogetto"]."</td><td>".$row['titolo']."</td>
		<td>".$row['dtinizio']."</td><td>".$row['dtfine']."</td><td>".$row['orepreviste']."</td>
		<td>".$row['oreinserite']."</td><td>".$row['orerealizzate']."</td>
		<td>".$row['numallieviprevisti']."</td>
		<td>".$row1["numero"]."</td>
		<td align= 'center'><a class='dettaglio-corsi1' id = ".$row["id_corso"]." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='dettaglio-corsi2' id = ".$row["id_corso"]." href='#'><i class='fas fa-edit'></i></a></td></tr>";
		$result = $mysqli->query($sql2);
 		}
         
		?>                      
                                    </tbody>
                                </table>		
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
			
			
				<?php					
		}	
		?>	

  <script>
$(" .dettaglio-corsi").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_corso.php?id_corso="+id);
  });
  $(" .dettaglio-corsi1").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_corsi_allievi.php?id_corso="+id);
  });
   $(" .dettaglio-corsi2").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_corsi_moduli.php?id_corso="+id);
  });
	</script>
	
	
	

  
  
  
  
  
  

