
                <div class="container-fluid">

                  
			  <!-- Page Heading -->
		  
                    <h1 class="h3 mb-2 text-gray-800">Aggiungi anagrafica </h1>
                   		
								<form class="user" action="business/insertAnagrafica.php" method="post"  onSubmit="return validate();">		
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Cognome*</label><input type="text" class="" id="cognome" name="cognome" style="width:80%;" required value=""> </input>
                                    </div>
								</div>	
								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Nome*</label><input type="text" class="" id="nome" name="nome" style="width:80%;" required value=""> </input>
                                    </div>
                                </div>
								
								
								 <div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">Provincia di nascita*</label><input type="text" class="" id="provincia_nascita" name="provincia_nascita" style="width:80%;" required value=""> </input>
                                    </div>
								 </div>	
								<div class="row">
                                    <div class="col-sm-12">
                                      <label style="width:20%;">Data di nascita*</label><input type="text" class="" id="data_nascita" name="data_nascita" style="width:80%;" required value=""> </input>
                                    </div>
                                </div>
								
								
								 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Cittadinanza*</label><select name="cittadinanza" id="cittadinanza" style="width:80%;" required <option value="">Seleziona cittadinanza</option>
										<?php 
		require_once('../class/cittadinanza.php');
		require_once('../configurazione/database.php');
		$elencocittadinanze= new cittadinanza();								  
        $elencocittadinanze->getCittadinanza($mysqli);
		while ($row1=$elencocittadinanze->cittadinanze->fetch_assoc()) {
		echo "<option value=".$row1['ID'].">".$row1['descrizione_cittadinanza']."</option>";
 		}
		?> 
</select>		
                                      </div>
								</div>
								<div class="row">
                                    <div class="col-sm-12">
                                       <label style="width:20%;">Comune nascita*</label><input type="text" name="comune_nascita" id="comune_nascita" style="width:80%;" required value=""> </input>
		
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-sm-12">
                                        <label style="width:20%;">CAP*</label><input type="text" class="" id="cap" name="cap" style="width:80%;" required value=""> </input>
                                    </div>                 
                                </div>
								 <div class="row">
									<div class="col-sm-12">						
                                      <label style="width:20%;">Indirizzo residenza*</label><input type="text" class="" id="residenza_indirizzo" name="residenza_indirizzo" style="width:80%;" required value=""> </input>
                                    </div>
								</div>
									 <div class="row">
									<div class="col-sm-12">						
                                      <label style="width:20%;">Provincia residenza*</label><input type="text" class="" id="residenza_provincia" name="residenza_provincia" style="width:80%;" required value=""> </input>
                                    </div>
								</div>
								 <div class="row">
									<div class="col-sm-12">						
                                      <label style="width:20%;">Comune residenza*</label><input type="text" class="" id="residenza_comune" name="residenza_comune" style="width:80%;" required value=""> </input>
                                    </div>
								</div>
								
								<div class="row">
									<div class="col-sm-12">	
                                       <label style="width:20%;">Codice Fiscale*</label><input type="text" class="" id="cf" name="cf" style="width:80%;" required value=""> </input>
                                    </div>
                                </div>
									<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Titolo di studio</label><input type="text" class="" id="titolo_studio" name="titolo_studio" style="width:80%;" value=""> </input>                                    
                                    </div>
								</div>
									<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Sito Web</label><input type="text" class="" id="web" name="web" style="width:80%;" value=""> </input>                                    
                                    </div>
								</div>
								
									<div class="row">
									<div class="col-sm-12">	
                                        <label style="width:20%;">Indirizzo e-mail*</label><input type="text" class="" id="email" name="email" style="width:80%;" required value=""> </input>                                    
                                    </div>
								</div>
					 	<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="addanagrafica" onclick="Clicked(this);" value="Aggiungi"></span>
                    </div>
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="addanagrafica" style="width:80%;">
					                     <div class="col-sm-6" style="text-align:left;">
					
                        <input type="reset" class="btn btn-danger btn-icon-split" name="resanagrafica" value="Annulla"></span>
                    </div>
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
</script>
