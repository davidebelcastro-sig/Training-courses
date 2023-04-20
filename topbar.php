   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        
		  <script src="vendor/jquery/jquery.min.js"></script>			
	
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["display_name"]?></span>
                                <?php if($_SESSION["sesso"] == "M")
                                { ?>
                                <img class="img-profile rounded-circle"
                                    src= "img/uomo.svg">
                                <?php } else { ?>
                                <img class="img-profile rounded-circle"
                                    src= "img/donna.svg">
                                <?php } ?>
                               
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item menu-profilo" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item create-account" href="#" data-toggle="modal" data-target="#createAccount">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Create account
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                               
                            </div>
                        </li>

                    </ul>

                </nav>
						<script>
				
	$(document).ready( function() {			
 $(" .dettaglio-progetti").on("click",function(){
   alert($(this).attr('data-name') + ' ' + $(this).attr('data-lastname')+"&IDNOT="+$(this).attr('id_notifica'));
   
   if ($(this).attr('data-lastname')  == "tb_progetti" )
		{$("#content").load("view/scheda_progetto.php?id_progetto="+$(this).attr('data-name')+"&IDNOT="+$(this).attr('id_notifica'));}
	
   if ($(this).attr('data-lastname')  == "tb_corsi" )
   {$("#content").load("view/scheda_corso.php?id_corso="+$(this).attr('data-name')+"&IDNOT="+$(this).attr('id_notifica'));}

	if ($(this).attr('data-lastname')  == "tb_anagrafica" )
		{$("#content").load("view/scheda_anagrafica.php?id_anagrafica="+$(this).attr('data-name')+"&IDNOT="+$(this).attr('id_notifica'));}
	
	if ($(this).attr('data-lastname')  == "tb_entefinanz" )
		{$("#content").load("view/scheda_EnteFinanziante.php?id_entefinanziante="+$(this).attr('data-name')+"&IDNOT="+$(this).attr('id_notifica'));}
	
	
	if ($(this).attr('data-lastname')  == "tb_modulo" )
		{$("#content").load("view/scheda_modulo.php?id_modulo="+$(this).attr('data-name')+"&IDNOT="+$(this).attr('id_notifica'));}
	
	if ($(this).attr('data-lastname')  == "tb_docente" )
		{$("#content").load("view/scheda_docente.php?id_docente="+$(this).attr('data-name')+"&IDNOT="+$(this).attr('id_notifica'));}
	
	if ($(this).attr('data-lastname')  == "tb_aule" )
		{$("#content").load("view/scheda_aula.php?id_aula="+$(this).attr('data-name')+"&IDNOT="+$(this).attr('id_notifica'));}
	
	if ($(this).attr('data-lastname')  == "tb_allievi" )
		{$("#content").load("view/scheda_allievo.php?id_allievo="+$(this).attr('data-name')+"&IDNOT="+$(this).attr('id_notifica'));}
  });
  
  
  
  
  
   $(" .menu-profilo").on("click",function(){

$("#content").load("view/scheda_utente.php");
     });
     $(" .create-account").on("click",function(){

$("#content").load("view/create_account.php");
     });
     

  });
  

  </script>		
				