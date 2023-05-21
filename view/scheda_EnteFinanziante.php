               <div class="container-fluid">

                  
							
		<?php
		require_once('../class/entefinanziante.php');
		require_once('../configurazione/database.php');
		$entefinanziante= new Entefinanziante();								  
        $entefinanziante->getDettaglioEnte($mysqli,$_GET["id_entefinanziante"]);
		while ($row=$entefinanziante->enteDett->fetch_assoc()) {
		?>
		  <!-- Page Heading -->
		  
	

                    <h1 class="h3 mb-2 text-gray-800">Scheda Ente</h1>
                   		
							<form class="user" action="business/insertEnte.php" method="post"  onSubmit="return validate(this);">
								
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">DENOMINAZIONE*</label><input type="text" class="" id="denominazione" name="denominazione" style="width:80%;" value='<?php echo $row["denominazione"]?>' required> </input>
                                    </div>
								</div>	
	  <hr>		
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="updente" onclick="Clicked(this);" value="Salva modifiche"></span>
                    </div>
					                     <div class="col-sm-6" style="text-align:left;">
					
                        <input type="submit" class="btn btn-danger btn-icon-split" name="delente" onclick="Clicked(this);"  value="Elimina"></span> 
					</div>
						<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;">
					    <input type="hidden" class="" id="idente" name="idente" value="<?php echo $row["id_entefinanziante"]?>" style="width:80%;">
                   
                </div>
                            </form>
				<hr>	
							
		<?php
		}	
		?>					

		<script>
function Clicked(button)
{
  document.getElementById("tipooperazione").value = button.name;
}
    function validate(form) {
		var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var userName = document.getElementById("user_name").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }


	   // Selezione form e definizione dei metodi di validazione
  
		</script>								
							
							
							
