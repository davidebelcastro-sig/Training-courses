<?php
class Presenza
{
   public $presenze=[];
   public $registro;

function __construct()
    {
       
    }  
function getPresenzalezione($mysqli,$id_lezione)
{
	

    $stmt = $mysqli->prepare("select * FROM tb_regpresdoc where id_lezione_modulo= ?");
    if ($stmt === false)
		die('prepare() failed: ' . htmlspecialchars($mysqli->error));
	$stmt->bind_param('i', $id_lezione);
	if ($stmt === false)
		die('bind_param() failed: ' . htmlspecialchars($stmt->error));
    $stmt->execute(); // esegue la query appena creata.
	if ($stmt === false)
			die('lezione cancellata!');
   	$stmt->store_result();//Transfers a result set from a prepared statement
	return$stmt->num_rows;

      
   
}
function getPresenze($mysqli,$id_doc)
{
	

    $stmt = $mysqli->prepare("select sum(tb_regpresdoc.fine-tb_regpresdoc.inizio)/10000 as ore, tb_calendario.id_modulo,tb_docentemodulo.costoorario,((sum(tb_regpresdoc.fine-tb_regpresdoc.inizio)/10000) * costoorario) as guadagno from tb_regpresdoc,tb_calendario,tb_docentemodulo where tb_regpresdoc.id_lezione_modulo =tb_calendario.id  and tb_docentemodulo.id_modulo = tb_calendario.id_modulo and tb_docentemodulo.id_docente = tb_calendario.id_docente and  tb_calendario.id_docente = ? group by id_modulo");
    if ($stmt === false)
		die('prepare() failed: ' . htmlspecialchars($mysqli->error));
	$stmt->bind_param('i', $id_doc);
	if ($stmt === false)
		die('bind_param() failed: ' . htmlspecialchars($stmt->error));
    $stmt->execute(); // esegue la query appena creata.
	if ($stmt === false)
			die('errore!');
   $result = $stmt->get_result();
	$this->presenze= $result;
}

 




function insertPresenza($mysqli,$allievi,$id_lezione)
{

try
{ 
		
$stmt = $mysqli->prepare("INSERT INTO tb_regpresenzeanag (id_lezione_modulo,id_anagrafica,note) VALUES (?, ?, ?)");
if ($stmt === false)
			die('prepare() failed: ' . htmlspecialchars($mysqli->error));	

$N = count($allievi);
    for($i=0; $i < $N; $i++)
	{
		$rc = $stmt->bind_param('iis', $id_lezione, $allievi[$i], $note);
		if ($rc === false)
			die('bind_param() failed: ' . htmlspecialchars($stmt->error));
		$rc = $stmt->execute();
		if ($rc === false)
			die('Uno o più degli allievi selezionati hanno gia confermato la loro presenza per questa lezione!');
	}
}
catch(Exception $e) {
	echo "<CENTER><BR>Alcuni allievi sono già stati inseriti<BR><BR>";
print "<a id='calendario' href='#' onClick=\"self.close()\">click per chiudere</a></CENTER>"; 
	die();
}
}


}
?>




