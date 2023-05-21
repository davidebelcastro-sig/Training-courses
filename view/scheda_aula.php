                <div class="container-fluid">

                  
							
		<?php
		require_once('../class/aula.php');
		require_once('../configurazione/database.php');
		$aula= new aula();								  
        $aula->getDettaglioAula($mysqli,$_GET["id_aula"]);
		while ($row=$aula->aulaDett->fetch_assoc()) {
		?>
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Scheda Aula</h1>
                   		
							<form class="user" action="business/insertAula.php" method="post"  onSubmit="return validate(this);">
                                <div class="row">
                                    <div class="col-sm-12">
									 <label style="width:20%;">NOME*</label><input type="text" class="" id="Nome" name="Nome" style="width:80%;" value=<?php echo $row["nome"]?> required></input>
                                      </div>
                                </div>
								
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">INDIRIZZO</label><input type="text" class="" id="Indirizzo" name="Indirizzo" style="width:80%;" value=<?php echo $row["indirizzo"]?>> </input>
                                    </div>
								</div>	
								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">CAPIENZA*</label><input type="text" class="" id="Capienza" name="Capienza" style="width:80%;" value=<?php echo $row["capienza"]?> required></input>
                                    </div>
                                </div>
								
								
								 <div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">DISPONIBILITA' DA</label><input type="text" class="" id="DisponibilitaDa" name="DisponibilitaDa" style="width:80%;" value=<?php echo $row["disponibilitada"]?>> </input>
                                    </div>
								 </div>	
								<div class="row">
                                    <div class="col-sm-12">
                                      <label style="width:20%;">DISPONIBILITA' A</label><input type="text" class="" id="DisponibilitaA" name="DisponibilitaA" style="width:80%;" value=<?php echo $row["disponibilitaa"]?>> </input>
                                    </div>
                                </div>

 
	  <hr>		
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="modaula" onclick="Clicked(this);" value="Salva modifiche"></span>
                    </div>
					                     <div class="col-sm-6" style="text-align:left;">
					
                        <input type="submit" class="btn btn-danger btn-icon-split" name="delaula" onclick="Clicked(this);" value="Elimina"></span>
                    </div>
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;"></input>
					<input type="hidden" class="" id="idaula" name="idaula" value="<?php echo $row["id_aula"]?>" style="width:80%;"></input>
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
							
