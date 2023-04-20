<?php
if (isset($_POST['submit']) && $_POST['submit']=="invia")
{
  $titolo = addslashes($_POST['titolo']);
  $testo = addslashes($_POST['testo']);
  $str_data = strtotime($_POST['data']);
 require_once('../configurazione/database.php');
  $sql = "INSERT INTO appuntamenti (titolo,testo,str_data ) VALUES ('$titolo', '$testo', '$str_data')";
  if($result = mysql_query($sql) or die (mysql_error()))
  {
    echo "Inserimento avvenuto con successo.<br>
    Vai al <a href=\"index.php\">Calendario</a>";
  }
}else{
  ?>
 <h1 class="h3 mb-2 text-gray-800">Aggiungi corso</h1>	
							<form class="user" action="<?php echo $_SERVER['PHP_SELF'];?> method="post"  onSubmit="return validate();">
                                <div class="row">
                                    <div class="col-sm-12">
									 <label style="width:20%;">Titolo</label><select name = "titolo" id= "titolo" style="width:80%;" required><option value="">Seleziona progetto</option> 
  
	<?php 
		require_once('../class/progetto.php');
		require_once('../configurazione/database.php');
		$elencoProgetti = new Progetto();								  
        $elencoProgetti->getProgetti($mysqli);
		while ($row=$elencoProgetti->progetti->fetch_assoc()) {
			
		echo "<option value=".$row['IDProg'].">".$row['NOME PROGETTO']."</option>";
 		}
		?> 
</select>
                                      </div>
                                </div>

			 <div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Testo</label><textarea class="" name="testo" id="testo" style="width:80%;" > </textarea><br>
                                    </div>
								</div>	
								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">Data</label><input type="text" class="" name="data" id="data" style="width:80%;" > </input>
                                    </div>
                                </div>

  <?php
}
?>
			<div class="row">
                     <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="addcorso" onclick="Clicked(this);"  value="Inserisci corso"></span>
						<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;">
                    </div>
					            <div class="col-sm-6" style="text-align:left;">
					
                        <input type="reset" class="btn btn-danger btn-icon-split" name="resproject" value="Annulla"></span>
                    </div>       
                </div>
                            </form>
				</div>				
