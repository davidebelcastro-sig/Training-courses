<!DOCTYPE html>
   <?php 
   require_once('functions/functions.php');
   ini_session_start();
   ?>
<html lang="en">
 <?php require_once('head.php');?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
    <?php require_once('sidebar.php');
	require_once('configurazione/database.php');
	?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
           

                <!-- Topbar -->
             <?php require_once('topbar.php');?>
                <!-- End of Topbar -->
 <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                       
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Progetti</h6>
                                </div>
								<?php
								require_once('class/progetto.php');
		$elencoprogetti= new Progetto();								  
        $elencoprogetti->getProgettiDashboard($mysqli);
		while ($row=$elencoprogetti->progettiDashboard->fetch_assoc()) {
		if ((is_numeric($row["numorepreviste"]) and is_numeric($row["numorerealizzate"])) && ($row["numorepreviste"]!=0))
           $salprogetto	=	$row["numorerealizzate"]/$row["numorepreviste"]*100;
	   else
		    $salprogetto	=0;
		if ($salprogetto<=40)
			$classcolor="progress-bar bg-danger";
		else if ($salprogetto>40 && $salprogetto<=70)
			$classcolor="progress-bar bg-warning";
		else if ($salprogetto>70 && $salprogetto<100)
			$classcolor="progress-bar bg-info";
		else if  ($salprogetto= 100)
			$classcolor="progress-bar bg-success";
			?>
	                               <div class="card-body">
                                    <h4 class="small font-weight-bold"><?php echo $row["nomeprogetto"]?><span
                                            class="float-right"><?php echo strval(round($salprogetto))."%"?></span></h4>
                                    <div class="progress mb-4">
                                        <div class="<?php echo $classcolor ?>" role="progressbar" style="width: <?php echo $salprogetto?>%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </div>
								<?php 
		}
		if(isset($elencoprogetti))
			$elencoprogetti=NULL
		?>
                            </div>
							
											<div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Completato fino al 40%
                                            <div class="text-white-50 small"></div>
                                        </div>
                                    </div>
                                </div>
								<div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Completato tra il 41% e il 70%
                                            <div class="text-white-50 small"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Completato tra il 71% e il 99%
                                            <div class="text-white-50 small"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Completato al 100%
                                            <div class="text-white-50 small"></div>
                                        </div>
                                    </div>
                                </div>							
</div>

<div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Dettaglio Progetti</h6>
                                </div>
								<?php
								$elencoprogetti= new Progetto();								  
        $elencoprogetti->getProgettiDashboard($mysqli);
		while ($row=$elencoprogetti->progettiDashboard->fetch_assoc()) {							
					?>			    
                                <div class="card-body">

                                    <p>  <a class="dettaglio-progetti" id ='<?php echo $row["id_progetto"]?>' rel="nofollow" href="#"><b><?php echo $row["nomeprogetto"]?></b></a><br>Inizio <b><?php echo $row["dtinizio"]?></b><br>termine è previsto <b><?php echo $row["dtfine"]?></b><br>Ore realizzate <b><?php echo $row["numorerealizzate"]?></b><br>Ore previste <b><?php echo $row["numorepreviste"]?></b>

									</p>
                                </div>
                                           
		<?php }
		?>
</div>
                        </div>
  </div>

                

                    </div>

                </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Corsi Formazione</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sicuro di uscire?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Seleziona "Logout" se tu vuoi uscire dalla corrente sessione.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    
 <script src="js/script_menu.js"></script>
<script>
 $(" .dettaglio-progetti").on("click",function(){
	var select = $(this);
    var id = select.attr('id');

 // var value=$(id).text();
 // alert(id);
  //alert(value);
 $("#content").load("view/scheda_progetto.php?id_progetto="+id);
  });
  </script>
</body>

</html>

 

