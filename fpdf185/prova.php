<?php
// Prints a cell with given text 
$id_docente = $_GET['id_docente'];
//prendere nome e cognome
require_once('../class/docente.php');
require_once('../configurazione/database.php');
$docente = new docente();								  
$docente->getDocente($mysqli,$id_docente);
$row=$docente->docenti->fetch_assoc();
$nome=$row['nome'];
$cognome=$row['cognome'];
$comune_nascita=$row['comune_nascita'];
$provincia_nascita=$row['provincia_nascita'];
$data_nascita=$row['data_nascita'];
$provincia_residenza=$row['provincia_residenza'];
$comune_residenza=$row['comune_residenza'];
$indirizzo_residenza=$row['indirizzo_residenza'];
$cf=$row['cf'];
$email=$row['email'];
$oresvolte=$row['oresvolte'];
$guadagno=$row['guadagno'];
$data=date("d/m/Y");
require_once('../class/presenza.php');
$presenze= new presenza();
$presenze->getPresenze($mysqli,$id_docente);
require_once('../class/modulo.php');
$mod= new modulo();
$stringa=[];
$i=0;
$totale=0;
$svoltetot=0;
while($row=$presenze->presenze->fetch_assoc())
{

	$mod->getMCP($mysqli,$row['id_modulo']);
	$res=$mod->moduloDett->fetch_assoc();
	$stringa[$i] = "Nome Progetto: ".$res['progetto']."\nNome Corso: ".$res['corso']."\nNome Modulo: ".$res['modulo']."\nCosto orario(in euro) per il modulo: ".$row['costoorario']."\nOre svolte: ".$row['ore']."\nCompenso: ".$row['guadagno']." euro\n\n";
	$i++;
	$totale = $totale + $row['guadagno'];
	$svoltetot=$svoltetot + $row['ore'];
}


	
ob_end_clean();
require('fpdf.php');
  
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage();
  
// Set the font for the text
$pdf->SetFont('Arial', 'B', 10);
  
$pdf->MultiCell(0, 5, "Contratto per il docente ".$nome." ".$cognome . "\n\n\n" . "Il docente ".$nome." ".$cognome.", codice fiscale ".$cf.", nato a ".$comune_nascita." in provincia di ".$provincia_nascita." il ".$data_nascita.", residente a ".$comune_residenza." in provincia di ".$provincia_residenza." in ".$indirizzo_residenza." ed email ".$email." ha svolto ".$oresvolte." ore fino al ".$data.".\n\nDi seguito vengono illustrate le ore svolte ed il costo orario per ogni singolo modulo e infine l'importo totale da ricevere in euro.\n\n\n", 0, 'center');
for($v=0;$v<$i;$v++)
{
	$pdf->MultiCell(0, 4,$stringa[$v]."\n" , 'center');
}


$pdf->MultiCell(0,5,"Compenso totale: ".$totale." euro\nOre svolte totali: ".$svoltetot." ore",0,'center');
$pdf->Cell(0, 50,"Roma,".$data);


//$pdf->Cell(0,40,"Il docente ".$nome." ".$cognome.", codice fiscale ".$cf.", nato a ".$comune_nascita." in provincia di ".$provincia_nascita." il ".$data_nascita.", residente a ".$comune_residenza." in provincia di ".$provincia_residenza." in ".$indirizzo_residenza);
// return the generated output
$pdf->Output();
  
?>
