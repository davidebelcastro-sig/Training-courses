
                <!-- Begin Page Content -->
                <div class="container-fluid">


		  <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Aggiungi ente</h1>
                   		
							<form class="user" action="business/insertEnte.php" method="post" onSubmit="return validate();">


								<div class="row">
                                    <div class="col-sm-12">
                                        <label style="width:20%;">DENOMINAZIONE*</label><input type="text" class="" name="denominazione" id="denominazione" style="width:80%;" required > </input>
                                    </div>
                                </div>
						  <hr>		
								<div class="row">
                    <div class="col-sm-6" style="text-align:right;">
					
                        <input type="submit" class="btn btn-success btn-icon-split" name="addente" onclick="Clicked(this);" value="Aggiungi ente"></span>
                    </div>
					                     <div class="col-sm-6" style="text-align:left;">
					
						<input type="hidden" class="" id="tipooperazione" name="tipooperazione" value="" style="width:80%;"></input>
                        <input type="reset" class="btn btn-danger btn-icon-split" name="resente" value="Annulla"></span>
                    </div>
                </div>
                            </form>
				<hr>	

	
		<script>
function Clicked(button)
{
  document.getElementById("tipooperazione").value = button.name;
}
</script>

