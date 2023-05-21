                <!-- Begin Page Content -->
                <div class="container-fluid">
				<?php
				require_once('../configurazione/database.php');
				?>
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Assegna docente ad un modulo</h1>
                   		
							<form id="select_form" class="user" action="insert_job/AssegnaDocente.php" method="post" onSubmit="return validate();">	
							
								 <div class="row">
                                    <div class="col-sm-12">
                                   <label style="width:20%;">Docente*</label><select name = "docenteid" id= "docenteid" style="width:80%;" required><option value="">Seleziona docente</option>
										<?php 
										require_once('../class/anagrafica.php');
										require_once('../configurazione/database.php');
										$elencoAnagrafiche = new anagrafica();								  
										$elencoAnagrafiche->getDocenti($mysqli);
										while ($row=$elencoAnagrafiche->anagrafiche->fetch_assoc()) {
											
										echo "<option value=".$row['id_anagrafica'].">".$row['nome']." ".$row['cognome']."</option>";
										}
										?> 
								</select>
								</div>
								</div>
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
                                   <label style="width:20%;">Nome modulo*</label><select name = "moduloid" id= "moduloid" style="width:80%;" required><option value="">Seleziona il modulo</option>
										<?php 
										//select-CorsiProgetto.php

										?> 
										
								</select>
								</div>
								</div>
								<div class="row">
									<div class="col-sm-12">	
                                       <label style="width:20%;">Costo orario*</label><input type="text" class="" id="costo" name="costo" style="width:80%;" required> </input>
                                    </div>
                                </div>	
		
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
		
		$("select#corsoid").html(scegli);
		$("select#corsoid").attr("disabled", "disabled");
		$("select#moduloid").html(scegli);
		$("select#moduloid").attr("disabled", "disabled");
		
		
		$("select#progettoid").change(function(){
			var id_prog = $("select#progettoid option:selected").attr('value');
			$("select#corsoid").html(attendere);
			$("select#moduloid").html(attendere);
			if (this.value == '')
			{
				$("select#corsoid").attr("disabled", "disabled");
				$("select#moduloid").attr("disabled", "disabled");
			}
			else
			{
			
			$.post("business/select-Corsiprog.php", {id_progetto:id_prog}, function(data){
			$("select#corsoid").removeAttr("disabled"); 
			
				$("select#corsoid").html(data);
var id_mod = $("select#corsoid option:selected").attr('value');
			$("select#moduloid").html(attendere);
			if (this.value == '')
			{
				$("select#moduloid").attr("disabled", "disabled");
			}
			else
			{
			
			$.post("business/select-ModCorsi.php", {id_corso:id_mod}, function(data){
			$("select#moduloid").removeAttr("disabled"); 
			
				$("select#moduloid").html(data);

				});
				};			
				});
				};	
				
		
				
			
		});	
		
		
		$("select#corsoid").change(function(){
			var id_mod = $("select#corsoid option:selected").attr('value');
			$("select#moduloid").html(attendere);
			if (this.value == '')
			{
				$("select#moduloid").attr("disabled", "disabled");
			}
			else
			{
			
			$.post("business/select-ModCorsi.php", {id_corso:id_mod}, function(data){
			$("select#moduloid").removeAttr("disabled"); 
			
				$("select#moduloid").html(data);

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
