<?php 
require("include/calvars.inc");
require_once('../configurazione/database.php');
//$todaystamp = strtotime($localstring);
 
if(isset($dodel) && isset($delid) && ($dodel == 1))
{
$sql="DELETE FROM ".$events_table." WHERE id='".$delid."'";
 $stmt = $mysqli->prepare($sql); 
  $stmt->execute();
}
else
 $delresult = FALSE;
?>
<html>
<HEAD><TITLE>Day Schedule</TITLE>
<link rel="stylesheet" href="styles/calstyles.css" type="text/css">
<SCRIPT SRC="include/functions.js"></SCRIPT>
<BODY class="popday" onUnload="window.opener.location='index.php?timestamp=<?php echo $_GET['daystamp'] ?>&noinc=0'">
<CENTER>
<TABLE border=0 width="100%" cellspacing="0" cellpadding="5" class="popday">
  <TR bgcolor="#CCCCCC">
    <TD width=65><B>Start</B></TD>
    <TD width=65><B>End</B></TD>
    <TD><B>Description</B></TD>
    <TD><B>Location</B></TD>
    <TD width=75>&nbsp;</TD>
  </TR>
<?php 
$sql2="SELECT * FROM ".$events_table." WHERE `datestamp` = '".$_GET['daystamp']."'";



 $stmt = $mysqli->prepare($sql2); 
	  
	  $stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
	   if (mysqli_num_rows($result)>0)
	   {
     while($rs2= $result->fetch_assoc())
    {
     $datestamp = $rs2['datestamp'];
     if($date_standard == 0)
        $date = strftime("%Y-%m-%d",$datestamp);
     else if($date_standard == 1)
        $date = strftime("%m/%d/%Y",$datestamp);
     $thisid = $rs2['id'];
     $stimestamp = $rs2['stimestamp'];
     $etimestamp = $rs2['etimestamp'];
     $loc = $rs2['resource'];
     $desc = $rs2['descr'];
     if($time_standard == 0) //ISO Standard 24 hour time
     {
         $stime = strftime("%H:%M",$stimestamp);
         $etime = strftime("%H:%M",$etimestamp);
     }
     else if($time_standard == 1) // 12 hour time
     {
         $stime = strftime("%I:%M",$stimestamp);
         $saorp = strftime("%p",$stimestamp);
         $saorp = strtolower($saorp);
         $stime = $stime.$saorp;
         $etime = strftime("%I:%M",$etimestamp);
         $eaorp = strftime("%p",$etimestamp);
         $eaorp = strtolower($eaorp);
         $etime = $etime.$eaorp;
     }
?>
  <TR> 
    <TD><?php echo $stime ?></TD>
    <TD><?php echo $etime ?></TD>
    <TD><?php echo $desc ?></TD>
    <TD><?php echo $loc ?></TD>
    <TD width="20%" align=center>
    <?if($ADMIN){?>
    <A HREF="#" class="popday" onClick="window.open('mod.php?id=<?php echo $thisid?>&daystamp=<?php echo $daystamp?>','newwin1','height=400,width=450,top=120,left=150,scrollbars=auto'); self.close()">modify</A>
    |&nbsp;<A HREF="popday.php?daystamp=<?php echo $daystamp?>&dodel=1&delid=<?php echo $thisid?>&date=<?php echo $date?>" class="popday">delete</A>
    <?}?>
    </TD>
  </TR>
  <?php
    } // end while

}// end if(mysql_num_rows($result)>0)
?>
</TABLE>
<BR><BR>
<?php if($ADMIN){?>
|&nbsp;<A HREF="#" class="popday" onClick="popup('add.php?pasdstring=<?php echo $date?>', 'Win2', 450, 500); self.close()">Add new</A>&nbsp;|
<?php }?>
</CENTER>

</body>
</html>

