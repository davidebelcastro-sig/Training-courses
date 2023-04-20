
                <div class="container-fluid">
	
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Aggiungi corso</h1>	
							<form class="user" action="business/insertCorso.php" method="post"  onSubmit="return validate();">
                                <div class="row">
                                    <div class="col-sm-12">
									 <label style="width:20%;">PROGETTO*</label><select name = "progettoid" id= "progettoid" style="width:80%;" required><option value="">Seleziona progetto</option>
									
		<?php 
		require_once('../class/progetto.php');
		require_once('../configurazione/database.php');
		$elencoProgetti = new Progetto();								  
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
                                        <label style="width:20%;">TITOLO</label><input type="text" class="" name="TITOLO" id="TITOLO" style="width:80%;" > </input>
                                    </div>
                                </div>					
								
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">INIZIO</label><input type="text" class="" name="INIZIO" id="INIZIO" style="width:80%;" > </input>
                                      </div>
								</div>
								<div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">FINE</label><input type="text" class="" name="FINE" id="FINE" style="width:80%;"  > </input>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">ORE PREVISTE</label><input type="text" class="" name="HPREV" id="HPREV" style="width:80%;" > </input>
                                    </div>
								</div>
                                <div class="row">
									<div class="col-sm-12">
                                        <label style="width:20%;">N_ALLIEVI PREVISTI</label><input type="text" class="" name="NALLIEVIPREV" id="NALLIEVIPREV"  style="width:80%;" > </input>
                                    </div>                 
                                </div>			
						  <hr>		
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="addcorso" onclick="Clicked(this);"  value="Inserisci corso"></span>
						<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;">
                    </div>
					            <div class="col-sm-6" style="text-align:left;">
					
                        <input type="reset" class="btn btn-danger btn-icon-split" name="rescorso" value="Annulla"></span>
                    </div>       
                </div>
                            </form>
				</div>				
		
	<script>
	function Clicked(button)
{
  document.getElementById("tipooperazione").value = button.name;
}
    function validate() {
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
							

