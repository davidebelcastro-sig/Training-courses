
                <div class="container-fluid">

                  
							
		
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Aggiungi aula</h1>
                   		
							<form class="user" action="business/insertAula.php" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
									 <label style="width:20%;">NOME*</label><input type="text" class="" id="Nome" name="Nome" style="width:80%;" required></input>
                                      </div>
                                </div>
								
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">INDIRIZZO</label><input type="text" class="" id="Indirizzo" name="Indirizzo" style="width:80%;" > </input>
                                    </div>
								</div>	
								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">CAPIENZA*</label><input type="text" class="" id="Capienza" name="Capienza" style="width:80%;" ></input>
                                    </div>
                                </div>
								
								
								 <div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">DISPONIBILITA' DA</label><input type="text" class="" id="DisponibilitaDa" name="DisponibilitaDa" style="width:80%;" > </input>
                                    </div>
								 </div>	
								<div class="row">
                                    <div class="col-sm-12">
                                      <label style="width:20%;">DISPONIBILITA' A</label><input type="text" class="" id="DisponibilitaA" name="DisponibilitaA" style="width:80%;" > </input>
                                    </div>
                                </div>
								
	
						  <hr>		
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="addaula" onclick="Clicked(this);" value="Aggiungi"></span>
                    </div>
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;">
					                     <div class="col-sm-6" style="text-align:left;">
					
                        <input type="reset" class="btn btn-danger btn-icon-split" name="resaula" value="Annulla"></span>
                    </div>
                </div>
                            </form>
				<hr>					
		
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
							
