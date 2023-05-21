

                <!-- Begin Page Content -->
                <div class="container-fluid">
				<?php
				require_once('../configurazione/database.php');
				?>
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Aggiungi modulo didattico</h1>
                   		
							<form id="select_form" class="user" action="business/insertModulo.php" method="post" onSubmit="return validate();">	
							
								 <div class="row">
                                    <div class="col-sm-12">
                                   <label style="width:20%;">Nome progetto*</label><select name = "progettoid" id= "progettoid" style="width:80%;" required><option value="">Seleziona il progetto</option>
										<?php 
										require_once('../class/progetto.php');
										$elencoProgetti = new progetto();								  
										$elencoProgetti->getProgetti($mysqli);
										while ($row=$elencoProgetti->progetti->fetch_assoc()) {
											
										echo "<option value=".$row['id_progetto'].">".$row['nomeprogetto']."</option>";
										}
										?> 
								</select>
								</div>
								</div>
								  <div class="row">
                                    <div class="col-sm-12">
                                   <label style="width:20%;">Nome corso*</label><select name = "corsoid" id= "corsoid" style="width:80%;" required><option value="">Seleziona il corso</option>
										<?php 
										//select-CorsiProgetto.php

										?> 
								</select>
								</div>
								</div>
								 <div class="row">
									<div class="col-sm-12">						
                                      <label style="width:20%;">Titolo</label><input type="text" class="" id="titolo" name="titolo" style="width:80%;"> </input>
                                    </div>
								</div>
								<div class="row">
									<div class="col-sm-12">	
                                       <label style="width:20%;">Ore previste</label><input type="text" class="" id="durata" name="durata" style="width:80%;"> </input>
                                    </div>
                                </div>
								
						  <hr>		
		
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="addmodulo" onclick="Clicked(this);"  value="Aggiungi"></span>
                    </div>
					 <div class="col-sm-6" style="text-align:left;">
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="addmodulo" style="width:80%;">
					                   
					
                        <input type="reset" class="btn btn-danger btn-icon-split" name="resmodulo" value="Annulla"></span>
                    </div>
                </div>
                            </form>
				<hr>					
	<script type="text/javascript" src="vendor/jquery/jquery3.6.1.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){

		var scegli = '<option value="0">Scegli...</option>';
		var attendere = '<option value="0">Attendere...</option>';
		
		$("select#corsoid").html(attendere);
		$("select#corsoid").attr("disabled", "disabled");
	
		
		
		$("select#progettoid").change(function(){
			var id_prog = $("select#progettoid option:selected").attr('value');
			$("select#corsoid").html(attendere);
			if (this.value == '')
			{
				$("select#corsoid").attr("disabled", "disabled");
			}
			else
			{
			
			$.post("business/select-Corsiprog.php", {id_progetto:id_prog}, function(data){
			$("select#corsoid").removeAttr("disabled"); 
			
				$("select#corsoid").html(data);

				});
				};	
			
		});	
		
		
	});
	
	</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</script>
		
		<script>
	function Clicked(button)
{
  document.getElementById("tipooperazione").value = button.name;
}
    function validate() {
      /*  var $valid = true;
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
        }*/
        return $valid;
    }


	   // Selezione form e definizione dei metodi di validazione
  
		</script>			

