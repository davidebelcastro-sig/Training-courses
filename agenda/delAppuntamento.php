<?php
include 'config.php';
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
  $del_id = $_GET['id'];
  $query = mysql_query("SELECT titolo, str_data FROM appuntamenti WHERE id ='$del_id'");
  $fetch = mysql_fetch_array($query);
  $titolo = $fetch['titolo'];
  $data = date("d-m-Y", $fetch['str_data']); 
  ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h1>Attenzione!</h1>
Si sta per eliminare l'appuntamento
<b><?php echo stripslashes($titolo); ?></b> 
del <?php echo stripslashes($data); ?>.<br>
Confermare per eseguire l'operazione.<br>
<br>
<input name="del_id" type="hidden" value="<?php echo $del_id; ?>">
<input name="submit" type="submit" value="Cancella">
</form>
  <?php
}
elseif(isset($_POST['del_id']) && is_numeric($_POST['del_id']))
{
  $del_id2 = $_POST['del_id'];
  if (mysql_query("DELETE FROM appuntamenti WHERE id = '$del_id2'")or die(mysql_error()))
  {
    echo "Cancellazione del servizio avvenuta con successo<br>
    <a href=\"index.php\">Torna al calendario</a>";
  }
}
?>