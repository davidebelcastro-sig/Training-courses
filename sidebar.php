  <?php
  //ggg
  ?>
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
           
                <div class="sidebar-brand-icon rotate-n-15">
                   <!-- <i class="fas fa-laugh-wink"></i>-->
				   <img src="img/corsi_img.jpg"  width='80px'>
                </div>
                <div class="sidebar-brand-text mx-3" style="text-align:right;font-size:20pt;">Corsi<sup>Formazione</sup></div>
            

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" id="menu_dash" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Amministrazione
            </div>
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProgetti"
                    aria-expanded="true" aria-controls="collapseProgetti">
                    <i class="fa fa-book fa-fw"></i>
                    <span>Progetti</span>
                </a>
                <div id="collapseProgetti" class="collapse" aria-labelledby="headingProgetti" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                        <a class="collapse-item" id="menu_prog" href="#">Elenco</a>
                        <a class="collapse-item" id="menu_ins_prog" href="#">Inserisci </a>
                    </div>
                </div>
            </li>
			
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnagrafica"
                    aria-expanded="true" aria-controls="collapseAnagrafica">
                    <i class="far fa-id-card	"></i>
                    <span>Anagrafiche</span>
                </a>
                <div id="collapseAnagrafica" class="collapse" aria-labelledby="headingAnagrafica" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                        <a class="collapse-item" id="menu_anag" href="#">Elenco</a>
                        <a class="collapse-item" id="menu_ins_anag" href="#">Inserisci </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEnti"
                    aria-expanded="true" aria-controls="collapseEnti">
                    <i class="fas fa-clipboard-list	"></i>
                    <span>Enti</span>
                </a>
                <div id="collapseEnti" class="collapse" aria-labelledby="headingEnti"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                     <a class="collapse-item" id="menu_enti" href="#">Elenco</a>
                        <a class="collapse-item" id="menu_ins_enti" href="#">Inserisci </a>
                    </div>
                </div>
            </li>


			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCorsi"
                    aria-expanded="true" aria-controls="collapseCorsi">
                    <i class="fas fa-book-reader	"></i>
                    <span>Corsi</span>
                </a>
                <div id="collapseCorsi" class="collapse" aria-labelledby="headingCorsi"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                        <a class="collapse-item" id="menu_corsi" href="#">Elenco</a>
                        <a class="collapse-item" id="menu_ins_corsi" href="#">Inserisci </a>
                    </div>
                </div>
            </li>
			
			
			
				<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseModuli"
                    aria-expanded="true" aria-controls="collapseModuli">
                    <i class="fas fa-book-reader	"></i>
                    <span>Moduli Didattici</span>
                </a>
                <div id="collapseModuli" class="collapse" aria-labelledby="headingCorsi"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                        <a class="collapse-item" id="menu_moduli" href="#">Elenco</a>
                        <a class="collapse-item" id="menu_ins_moduli" href="#">Inserisci </a>
                    </div>
                </div>
            </li>
			
			
			
				<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocenti"
                    aria-expanded="true" aria-controls="collapseDocenti">
                    <i class="fas fa-book-reader	"></i>
                    <span>Docenti</span>
                </a>
                <div id="collapseDocenti" class="collapse" aria-labelledby="headingCorsi"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                        <a class="collapse-item" id="menu_docenti" href="#">Elenco</a>
                        <a class="collapse-item" id="menu_ins_docenti" href="#">Inserisci </a>
                    </div>
                </div>
            </li>
			
			
			
			
			
			
			 <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAule"
                    aria-expanded="true" aria-controls="collapseAule">
                    <i class="fas fa-chalkboard-teacher	"></i>
                    <span>Aule</span>
                </a>
                <div id="collapseAule" class="collapse" aria-labelledby="headingAule"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                      <a class="collapse-item" id="menu_aule" href="#">Elenco</a>
                        <a class="collapse-item" id="menu_ins_aule" href="#">Inserisci </a>
                    </div>
                </div>
            </li>
			
			 <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAllievi"
                    aria-expanded="true" aria-controls="collapseAllievi">
                    <i class="fas fa-user-friends	"></i>
                    <span>Allievi</span>
                </a>
                <div id="collapseAllievi" class="collapse" aria-labelledby="headingAllievi"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                      <a class="collapse-item" id="menu_allievi" href="#">Elenco</a>
                        <a class="collapse-item" id="menu_ins_allievi" href="#">Inserisci </a>
                    </div>
                </div>
            </li>
			

			
			
			 <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCalendario"
                    aria-expanded="true" aria-controls="collapseCalendario">
                    <i class="fas fa-calendar"></i>
                    <span>Calendario</span>
                </a>
                <div id="collapseCalendario" class="collapse" aria-labelledby="headingCalendario"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                      <a class="collapse-item" id="menu_agenda" href="#">Visualizza lezioni</a>
                    </div>
                </div>
            </li>
			
			
			 <!-- Divider -->
            <hr class="sidebar-divider">
			
			 <!-- Heading -->
            <div class="sidebar-heading">
                Operazioni
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
			
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInser"
                    aria-expanded="true" aria-controls="collapseInser">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Inserimento</span>
                </a>
                <div id="collapseInser" class="collapse" aria-labelledby="headingInser" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                        <a class="collapse-item" id="menu_impostazioni1" href="#">Add modulo a docente</a>  
						  <a class="collapse-item" id="menu_impostazioni2" href="#">Add modulo ad allievo</a>
                    </div>
                </div>
            </li>
			
				<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCancel"
                    aria-expanded="true" aria-controls="collapseCancel">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Cancellazione</span>
                </a>
                <div id="collapseCancel" class="collapse" aria-labelledby="headingCancel" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                        <a class="collapse-item" id="menu_impostazioni3" href="#">Rem modulo a docente</a>  
						  <a class="collapse-item" id="menu_impostazioni4" href="#">Rem modulo ad allievo</a>
                    </div>
                </div>
            </li>
			
			
			
			
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Registro presenze
            </div>

            <!-- Nav Item - Registro Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRegistro"
                    aria-expanded="true" aria-controls="collapseRegistro">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Docente</span>
                </a>
                <div id="collapseRegistro" class="collapse" aria-labelledby="headingRegistro" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                     <a class="collapse-item" id="menu_reg" href="#">Gestisci</a>
                    </div>
                </div>
            </li>
			
			  <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAllievo"
                    aria-expanded="true" aria-controls="collapseAllivo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Allievo</span>
                </a>
                <div id="collapseAllievo" class="collapse" aria-labelledby="headingAllievo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Operazioni:</h6>
                     <a class="collapse-item" id="menu_reg_all" href="#">Gestisci</a>
                    </div>
                </div>
            </li>




	 <hr class="sidebar-divider d-none d-md-block">
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
		
		
