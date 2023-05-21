
                <!-- Begin Page Content -->
                <div class="container-fluid">

	<script>
   function clickme(valore) {
document.getElementById('tipooperazione').value=valore;
    }
</script>                        
							
		<?php
		require_once('../configurazione/database.php');
		require_once('../class/entefinanziante.php');
		$ente= new Entefinanziante();								  
        $ente->getDettaglioEnte($mysqli,$_GET["id_entefinanziante"]);
		while ($row=$ente->enteDett->fetch_assoc()) {
		?>	   

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Progetti finanziati dall'ente</h1>
               
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Elenco progetti</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Seleziona</th>               
                                            <th>Nome</th>
											<th>Num. Allievi iscritti</th>
                                            <th>Ore previste</th>
											<th>Ore inserite</th>
											<th>Ore svolte</th>
                                            <th>Data inizio</th>
                                            <th>Data fine</th>
											<th>Allievi iscritti</th>
											<th>Enti finanzianti</th>
											<th>Corsi</th>
											<th>Docenti</th>
                                        </tr>
                                    </thead>
                                   <tfoot>
                                        <tr>
                                            <th>Seleziona</th>               
                                            <th>Nome</th>
											<th>Num. Allievi iscritti</th>
                                            <th>Ore previste</th>
											<th>Ore inserite</th>
											<th>Ore svolte</th>
                                            <th>Data inizio</th>
                                            <th>Data fine</th>
											<th>Allievi iscritti</th>
											<th>Enti finanzianti</th>
											<th>Corsi</th>
											<th>Docenti</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
								<?php 			
		require_once('../class/progetto.php');
		require_once('../configurazione/database.php');
		$elencoprogetti= new Progetto();								  
        $elencoprogetti->getProgettiEnte($mysqli,$row["id_entefinanziante"]);
		while ($row=$elencoprogetti->progetti->fetch_assoc()) {
		$sqla = "create view miavista as select distinct tb_anagrafica.*,tb_allievo.oresvolte,tb_allievo.note 
		   FROM tb_anagrafica,tb_allievo,`tb_allievo-modulo`,tb_progetto,tb_corso,tb_modulo 
		   where tb_anagrafica.id_anagrafica = tb_allievo.id_anagrafica and `tb_allievo-modulo`.id_allievo = tb_allievo.id_anagrafica 
		   and `tb_allievo-modulo`.id_allievo = tb_anagrafica.id_anagrafica and `tb_allievo-modulo`.id_modulo = tb_modulo.id_modulo 
		   and tb_modulo.id_corso = tb_corso.id_corso and tb_corso.id_progetto=tb_progetto.id_progetto and tb_progetto.id_progetto=".$row['id_progetto'].";";
		$result = $mysqli->query($sqla);
		$SQL ="select count(*) as numero from miavista;";
		$sql2 = "drop view miavista";
		$result = $mysqli->query($SQL);
		//$miaVar="";
		$row1 = $result->fetch_assoc();
		//$miaVar=$row1["numero"];
		echo "<tr><td align= 'center'><a class='dettaglio-progetti' id = ".$row['id_progetto']." href='#'><i class='fas fa-edit'></i></a></td>
		<td>".$row['nomeprogetto']."</td>
		<td>".$row1["numero"]."</td>
		<td>".$row['numorepreviste']."</td><td>".$row['numoreinserite']."</td><td>".$row['numorerealizzate']."</td><td>".$row['dtinizio']."</td><td>".$row['dtfine']."</td>
		<td align= 'center'><a class='dettaglio-progetti1' id = ".$row['id_progetto']." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='dettaglio-progetti2' id = ".$row['id_progetto']." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='dettaglio-progetti3' id = ".$row['id_progetto']." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='dettaglio-progetti4' id = ".$row['id_progetto']." href='#'><i class='fas fa-edit'></i></a></td>
		</tr>";
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
 $(" .dettaglio-progetti").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_progetto.php?id_progetto="+id);
  });
  </script>
  
  <script>
 $(" .dettaglio-progetti1").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_allievi_iscritti_progetto.php?id_progetto="+id);
  });
  </script>


<script>
 $(" .dettaglio-progetti2").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_enti_progetto.php?id_progetto="+id);
  });
  </script>


<script>
 $(" .dettaglio-progetti3").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_corsi_progetto.php?id_progetto="+id);
  });
  </script>

  
<script>
 $(" .dettaglio-progetti4").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_docenti_progetto.php?id_progetto="+id);
  });
  </script>
