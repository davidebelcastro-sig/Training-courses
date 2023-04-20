<?
require("include/calvars.inc");
?>
<html>
<head>
       <title>Purge Old</title>
<link rel="stylesheet" href="styles/calstyles.css" type="text/css">
</head>
<body class="rightnow">
<B><EM>Purge Old Entries</EM></B>
<CENTER>
<?
if(!isset($bound))
{
$today = getdate();
$y2 = $today['year'];
$m2 = $today['mon'];
$d2 = $today['mday'];
$todaystring = $y2."-".$m2."-".$d2;
?>
<FORM name="form1" ACTION="purgeold.php" METHOD="POST">
Purge entries older than:
<INPUT TYPE="text" size="10" maxlength=10 name="bound" value=<?=$todaystring?>>
<?
if($date_standard == 0)
   print "&nbsp;(yyyy-mm-dd)<BR>";
else if($date_standard == 1)
   print "&nbsp;(mm/dd/yyyy)<BR>";
?>
<p><INPUT TYPE=submit value="Submit">
</FORM>
<?
}
else
{
    $boundstamp = strtotime($bound);
    //purge_old($boundstamp);
    mysql_connect($host,$user,$pwd);
    mysql_select_db($db);
    $sql = "DELETE FROM ".$events_table." WHERE datestamp < ".$boundstamp;
    mysql_query($sql);
    print "<BR><a href=\"index.php\" target=\"mymain\" onClick=\"self.close()\">Done</a>";
}
?>
</CENTER>
</body>
</html>
