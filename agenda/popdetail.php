<?
require("include/calvars.inc");
?>
<html>
<HEAD><title>Event Detail</title>
<SCRIPT>
function confirmdel( thisid, daystamp )
{
  if(confirm("Are you sure you want to delete this event?"))
  {
    var loc = "del.php?id="+thisid+"&daystamp="+daystamp;
    window.location = loc;
  }
}
</SCRIPT>
<link rel="stylesheet" type="text/css" href="styles/calstyles.css">
</HEAD>
<BODY class="popdetail">
<CENTER>
<TABLE border=0 widht=100% width="100%" cellspacing="0" cellpadding="5" class="popdetail">
  <TR bgcolor="#CCCCCC">
    <TD><b>Start</b></TD>
    <TD><b>End</b></TD>
    <TD><b>Description</b></TD>
    <TD><b>Location</b></TD>
	 <TD><b>Nome Docente</b></TD>
	  <TD><b>Cognome Docente</b></TD>
  </TR>
  <TR>
    <TD><?php echo $_GET['stime'] ?></TD>
    <TD><?php echo $_GET['etime'] ?></TD>
    <TD><?php echo $_GET['desc'] ?></TD>
    <TD><?php echo $_GET['loc'] ?></TD>
	<TD><?php echo $_GET['nome'] ?></TD>
	<TD><?php echo $_GET['cognome'] ?></TD>
  </TR>
</TABLE>
<BR><BR>
<?if($ADMIN){?>
|&nbsp;<A HREF="#" class="popdetail" onClick="window.open('mod.php?id=<?php echo $_GET['id'] ?>&daystamp=<?php echo $_GET['daystamp'] ?>','newwin1','height=400,width=450,top=120,left=150,scrollbars=auto,resizable=yes'); self.close()">Modifica</A>
&nbsp;|&nbsp;<A HREF="#" class="popdetail" onClick="confirmdel(<?php echo $_GET['id'] ?>, <?php echo $_GET['daystamp'] ?>)">Elimina</A>&nbsp;|
<?}?>
</CENTER>
</BODY>
</HTML>
