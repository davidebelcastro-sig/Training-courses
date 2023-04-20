    <div class="container-fluid">
<script>
   function clickme(valore) {
document.getElementById('tipooperazione').value=valore;
    }
</script>                  
							
		<?php
		require_once('../configurazione/database.php');
		require_once('../class/docente.php');
		$docente= new docente();								  
        $docente->getDettaglioDocente($mysqli,$_GET["id_docente"]);
		
		if(isset($_GET["IDNOT"]))
		{
			require_once('../class/notifica.php');
			$notifica= new notifica();								  
        $notifica->deleteNotifica($mysqli,$_GET["IDNOT"]);
		}
		while ($row=$docente->docenteDett->fetch_assoc()) {
		?>	   
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Moduli didattici del docente  <?php echo $row["id_anagrafica"]?></h1>
                                  <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Elenco moduli</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
												
											<th>Seleziona</th>																                               
                                            <th>Corso</th>
											<th>Titolo</th>																												           
                                            <th>Ore previste</th>
											<th>Ore inserite</th>
											<th>Ore svolte</th>
											<th>Num allievi iscritti</th>
											<th>Allievi iscritti</th>
											<th>Docenti</th>
                                        </tr>
                                    </thead>
                                   <tfoot>
                                        <tr>
										<th>Seleziona</th>																                               
                                            <th>Corso</th>
											<th>Titolo</th>																												           
                                            <th>Ore previste</th>
											<th>Ore inserite</th>
											<th>Ore svolte</th>
											<th>Num allievi iscritti</th>
											<th>Allievi iscritti</th>
											<th>Docenti</th>										
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
									<?php 
		require_once('../configurazione/database.php');
		require_once('../class/modulo.php');
		$modulocls= new modulo();								  
        $modulocls->getModuliDocente($mysqli,$row["id_anagrafica"]);
		
		
		
		
		while ($row=$modulocls->moduli->fetch_assoc()) {
		$var=0;	

		require_once('../class/corso.php');
	
		$elencoCorsi = new corso();								  
        $elencoCorsi->getCorsi($mysqli);
		while ($row1=$elencoCorsi->corsi->fetch_assoc()) {	
		if ($row1['id_corso']===$row['id_corso'])
		{			
			$nomeCorso=$row1['titolo'];
			$var=1;
		}
		
		}
		
		if ($var ==0)
		{$nomeCorso="assente";	}
		
		$sqla = "create view miavista as select distinct  tb_anagrafica.*,tb_allievo.oresvolte,tb_allievo.note FROM tb_allievo,tb_anagrafica,`tb_allievo-modulo`
   where 
   tb_anagrafica.id_anagrafica = tb_allievo.id_anagrafica and 
   tb_anagrafica.id_anagrafica = `tb_allievo-modulo`.id_allievo and
   `tb_allievo-modulo`.id_allievo = tb_allievo.id_anagrafica and 
   `tb_allievo-modulo`.id_modulo = ".$row['id_modulo'].";";
		$result = $mysqli->query($sqla);
		$SQL ="select count(*) as numero from miavista;";
		$sql2 = "drop view miavista";
		$result = $mysqli->query($SQL);
		//$miaVar="";
		$row2 = $result->fetch_assoc();
		//$miaVar=$row1["numero"];
		
		
		echo "<tr><td align= 'center'><a class='dettaglio-allievi' id = ".$row["id_modulo"]." href='#'><i class='fas fa-edit'></i></a></td><td>".$nomeCorso."</td><td>".$row['titolo']."</td><td>".$row['orepreviste']."</td><td>".$row['oreinserite']."</td><td>".$row['orerealizzate']."</td>
		<td>".$row2['numero']."</td>
		<td align= 'center'><a class='dettaglio-allievi1' id = ".$row["id_modulo"]." href='#'><i class='fas fa-edit'></i></a></td>
		<td align= 'center'><a class='dettaglio-allievi2' id = ".$row["id_modulo"]." href='#'><i class='fas fa-edit'></i></a></td>
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
 $("#content").load("view/scheda_modulo.php?id_modulo="+id);
  });
  </script> 
  
  
    <script>
 $(" .dettaglio-allievi1").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_modulo_allievi.php?id_modulo="+id);
  });
  </script> 
  
  
    <script>
 $(" .dettaglio-allievi2").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_modulo_docenti.php?id_modulo="+id);
  });
  </script> 
