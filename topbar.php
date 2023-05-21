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
                                <?php if($_SESSION["user_id"] == 1)
                                { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item create-account" href="#" data-toggle="modal" data-target="#createAccount">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Create account
                                </a>
                                <?php } ?>
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
  
   $(" .menu-profilo").on("click",function(){

$("#content").load("view/scheda_utente.php");
     });
     $(" .create-account").on("click",function(){

$("#content").load("view/create_account.php");
     });
     

  });
  

  </script>		
				