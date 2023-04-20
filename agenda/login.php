<?
require("include/calvars.inc");
?>
<html>
<head>
<title>Admin Login Page</title>
<link rel="stylesheet" href="styles/calstyles.css" type="text/css">
</head>
<?
if(isset($uname)){
?>
<body bgcolor="#FFFFFF" text="#000000" class="rightnow">
<CENTER>
<?
    mysql_connect($host,$user,$pwd);
    mysql_select_db($db);
    $sql = "SELECT * FROM `".$admin_table."` WHERE `username`='".$uname."' AND password='".$upass."'";
    $rs = mysql_query($sql);
    if(mysql_num_rows($rs))
    {
       $ADMIN = 1;
       print "Success!<BR><BR><A HREF=index.php TARGET=\"mymain\" onClick=\"self.close()\">return to the calendar</A>";
    }
    else
    {
       $ADMIN = 0;
       print "Login failed!<BR><BR><A HREF=# onClick=\"history.back()\">go back</A>";
    }
}
else
{
?>
<body bgcolor="#FFFFFF" text="#000000" onLoad="document.form1.uname.focus()" class="rightnow">
<form name="form1" method="post" action="login.php">
  <p> Username: 
    <input type="text" name="uname">
  </p>
  <p> Password: 
    <input type="password" name="upass">
  </p>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>
<?
}
?>
</CENTER>
</body>
</html>

