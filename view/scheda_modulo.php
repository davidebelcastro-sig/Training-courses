                <div class="container-fluid">
				
	  		
							
		<?php
		require_once('../class/modulo.php');
		require_once('../configurazione/database.php');
		$modulocls= new modulo();								  
        $modulocls->getDettaglioModulo($mysqli,$_GET["id_modulo"]);
		
				if(isset($_GET["IDNOT"]))
		{
			require_once('../class/notifica.php');
			$notifica= new notifica();								  
        $notifica->deleteNotifica($mysqli,$_GET["IDNOT"]);
		}
		
		
		while ($row=$modulocls->moduloDett->fetch_assoc()) {
		?>
		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Modulo ID <?php echo $row["id_modulo"]?></h1>
					<form class="user" action="business/insertModulo.php" method="post"  onSubmit="return validate(this);">                   		

							<div class="row">
                                    <div class="col-sm-12">
                                   <label style="width:20%;">Nome corso*</label><select name = "corsoid" id= "corsoid" style="width:80%;" required><option value="">Seleziona Corso</option>
		<?php 
		require_once('../class/corso.php');
		$elencoCorsi = new corso();								  
        $elencoCorsi->getCorsi($mysqli);
		while ($row1=$elencoCorsi->corsi->fetch_assoc()) {
		if ($row1['id_corso']==$row['id_corso'])	
			$selezionato=" selected";
		else
			$selezionato="";		
		echo "<option value=".$row1['id_corso'].$selezionato.">".$row1['titolo']."</option>";
 		}
		?> 
</select>
					
								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Titolo*</label><input type="text" class="" id="titolo" name="titolo"  style="width:80%;" value='<?php echo $row["titolo"]?>'>
		
								<div class="row">
									<div class="col-sm-12">	
                                       <label style="width:20%;">Ore previste</label><input type="text" class="" id="durata" name= "durata" style="width:80%;" value='<?php echo $row["orepreviste"]?>'> </input>
                                    </div>
                                </div>
							
      	   <hr>		
						<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="modmodulo" onclick="Clicked(this);" value="Salva modifiche"></span>
                    </div>
					                     <div class="col-sm-6" style="text-align:left;">
					
                        <input type="submit" class="btn btn-danger btn-icon-split" name="delmodulo" onclick="Clicked(this);" value="Elimina"></span>
                    </div>
					<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;"></input>
					<input type="hidden" class="" id="idmodulo" name="idmodulo" value="<?php echo$row["id_modulo"] ?>" style="width:80%;"></input>
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
							
