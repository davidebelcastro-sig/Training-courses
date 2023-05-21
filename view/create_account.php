<?php 
try{
require_once('../functions/functions.php');
ini_session_start();
?>

 <div class="container-fluid">
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">CREA NUOVO ACCOUNT</h1>
					<form class="user" action="business/insertUtente.php" method="post"  onSubmit="return validate(this);">                   		

                    <div class="row">
                            <div class="col-sm-6">
                            <label style="width:20%;">User*</label>
                                <input type="text" class="" id="user_name" name="user_name" style="width:79%;" value='' required></input>
                            </div>
                    </div>	
                    <div class="row">
                    <div class="col-sm-6">
                    <label style="width:20%;">Sesso*</label><select name="sesso" id="sesso" style="width:80%;"required><option value="">Seleziona sesso</option>
        <?php
        echo "<option value='M'>Maschio</option>";
        echo "<option value='F'>Femmina</option>";
        ?>
</select>		
                            </div>
                                </div>
                    <div class="row">
                            <div class="col-sm-6">
                            <label style="width:20%;">Display name*</label>
                                <input type="text" class="" id="display_name" name="display_name" style="width:79%;" value='' required></input>
                            </div>
                    </div>	
                    
                    
                    <div class="row">
                            <div class="col-sm-6">
                            <label style="width:20%;">E-mail*</label>
                                <input type="text" class="" id="email" name="email" style="width:79%;" value='' required></input>
                            </div>
                    </div>	
                    
                    <div class="row">
                            <div class="col-sm-6">
                            <label style="width:20%;">Password*</label>
                                <input type="password" class="" id="password" name="password" style="width:79%;" value="" required ></input>
                            </div>
                    </div>	
                
                    <hr>		
                <div class="row">
                <div class="col-sm-6" style="text-align:right;">
            
                <input type="submit" class="btn btn-success btn-icon-split" name="adduser"  value="Crea account"></span>
            </div>
                
            <input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="adduser" style="width:80%;"></input>
        
        </div>
                    </form>
        <hr>	
	<?php					
}
catch (Exception $ex) {
	echo "errore".$ex;
}
	?>		
		
	
		<script>
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
							
