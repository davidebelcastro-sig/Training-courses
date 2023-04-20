<?php
require("include/calvars.inc");
 require_once('../configurazione/database.php');

if(isset($_GET['id']))
{
	$id=$_GET['id'];
 $sql="DELETE FROM ".$events_table." WHERE id='".$id."'";
$src= $stmt = $mysqli->prepare($sql); 
if ($src === false)

	die('prepare() failed: ' . htmlspecialchars($mysqli->error));			 
$src=$stmt->execute();
if ($src === false)	
	die('execute() failed: ' . htmlspecialchars($mysqli->error));			
$result = $stmt->get_result();// get the mysqli result
$result = TRUE;
}
else
 $result = FALSE;
?>
<HTML>
<HEAD><TITLE>Delete page</TITLE>
<BASE TARGET="mymain">
<link rel="stylesheet" href="styles/calstyles.css" TYPE="text/css">
</HEAD>
<BODY class="popdetail">
<CENTER>
<BR><BR>
<?php if($result!=FALSE){?>
Event has been deleted<BR><BR><A HREF="../index.php?timestamp=<?php echo $_GET['daystamp'] ?>&noinc=0" onClick="self.close()">click here to close</A>
<?php }
else
    print "Delete FAILED";
?>
</BODY>
</HTML>
