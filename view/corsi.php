                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Corsi</h1>
                   <?php
					require_once('../configurazione/database.php');				   
				   require_once('../class/progetto.php');
		$elencoProgetti = new progetto();	
?>		
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="row">
						  <div class="col-sm-3">
                            <h6 class="m-0 font-weight-bold text-primary">Elenco corsi</h6>
                        </div> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="elenco_corsi">
                               
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
				   <script>
 
  
$(document).ready(function(){
   codProgetto = $(this).val();
      //  if(codProgetto!=0){
            $.ajax({
                type:'POST',
                url:'view/load_corsi.php', 
                data:'codProgetto='+codProgetto, 
                success:function(rispostahtml){
                   $('#elenco_corsi').html(rispostahtml);
                }
            }); 
    });
    $('#selprogetti').on('change', function(){ 
        codProgetto = $(this).val();
      //  if(codProgetto!=0){
            $.ajax({
                type:'POST',
                url:'view/load_corsi.php', 
                data:'codProgetto='+codProgetto, 
                success:function(rispostahtml){
                   $('#elenco_corsi').html(rispostahtml);
                }
            }); 
    });

	</script>
  
  

