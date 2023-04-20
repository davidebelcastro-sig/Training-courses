<?php
require("include/calvars.inc");
//print "ADMIN = $ADMIN";
?>
<html>
<head>
       <title>View</title>
<SCRIPT SRC="agenda/include/functions.js"></SCRIPT>
<link rel="stylesheet" href="agenda/styles/calstyles.css" type="text/css">
<?php
$today = getdate();
$y2 = $today['year'];
$m2 = $today['mon'];
$d2 = $today['mday'];
$hour = $today['hours'];
$min = $today['minutes'];
$todaystring = $y2."-".$m2."-".$d2;
//$hour = $hour + $hour_offset;
$localstring = $todaystring." ".$TZONE;
//print "today = $localstring<BR>";
//$todaystamp = strtotime($todaystring);
$todaystamp = strtotime($localstring);
//$test = strftime("%Y-%m-%d %H:%M",$todaystamp);
//print "todaystamp = $todaystamp<BR>";
//print "test = $test<BR>";
if(!isset($_GET['noinc']))
{
 $timestamp = $todaystamp;
 
}
else
{
$timestamp=$_GET['timestamp'];
}

$m = strftime("%m",$timestamp);
$y = strftime("%Y",$timestamp);
$monthname = strftime("%B",$timestamp);
$startcol = date("w",mktime(1,1,1,$m,1,$y));
$daysinmonth = date("t",mktime(1,1,1,$m,1,$y));


$nextstamp = strtotime("+1 month",$timestamp,);
$prevstamp = strtotime("-1 month",$timestamp);
//print "m = $m, y = $y<BR>";

?>

</head>
<body bgcolor="gray">
  <?php
if($time_standard == 0)
   echo "(24hr format)\n <br>";
else if($time_standard == 1)
  echo "(12hr format)\n <br>";

echo "\n <br>";
echo "Legenda\n <br>";
echo "Rosso=lezioni con presenza del docente confermata\n <br>";
echo "Verde=lezioni la cui presenza del docente è ancora da confermare";
?>
  </FONT><BR>
<table border="0" align="center">
  <tr align="center" valign="middle"> 
    <td align="right" id="meseprima"><a href="#"><< mese precedente</a></td>
    <td width="200"><FONT FACE="Verdana" SIZE=3 COLOR=black><B> 
      <?php echo "$monthname $y";?></B></FONT></td>
    <td align="left"  id="mesedopo"><a href="#">mese successivo >></a></td>
  </tr>
</table>
<table style="border: 2px solid white;" cellspacing=<?php echo $tb_cellspacing?> bordercolor="black" width="100%" align="center" height="80%">
<tr class="daytitle">
   <td align="center" height="<?php echo $rowht1?>" width="14%" class="daytitle" bgcolor=<?php echo $wkendbg?>>Dom</td>
   <td align="center" height="<?php echo $rowht1?>" width="14%" class="daytitle" bgcolor=<?php echo $wkbg?>>Lun</td>
   <td align="center" height="<?php echo $rowht1?>" width="14%" class="daytitle" bgcolor=<?php echo $wkbg?>>Mar</td>
   <td align="center" height="<?php echo $rowht1?>" width="14%" class="daytitle" bgcolor=<?php echo $wkbg?>>Mer</td>
   <td align="center" height="<?php echo $rowht1?>" width="14%" class="daytitle" bgcolor=<?php echo $wkbg?>>Gio</td>
   <td align="center" height="<?php echo $rowht1?>" width="14%" class="daytitle" bgcolor=<?php echo $wkbg?>>Ven</td>
   <td align="center" height="<?php echo $rowht1?>" class="daytitle" bgcolor=<?php echo $wkendbg?>>Sab</td>
</tr>
<?php
$d = 1;
$i = 0;
//start first row
print "<tr align=left valign=top bgcolor=$cellbg>";
//increment through the days before the start of the month
while($i < $startcol)
{
    print "<TD>&nbsp;</TD>";
    $i++;
}
//step through day 1 to day n
//make the timstamp for day 1 of the month/year
$daystring = $y."-".$m."-01 ".$TZONE;
$daystamp = strtotime($daystring);
 require_once('../configurazione/database.php');
//$test = strftime("%Y-%m-%d %H:%M",$daystamp);
//print "daystamp = $daystamp<BR>";
//print "test = $test<BR>";
//$daystamp = mktime ($hour,0,0,$m,1,$y);
require_once('../class/presenza.php');
$presenza= new Presenza();
while($d <= $daysinmonth)
{
    $string1 = strftime("%Y-%m-%d",$daystamp);
    $string2 = strftime("%Y-%m-%d",$timestamp);
    $string3 = strftime("%Y-%m-%d",$todaystamp);
   // print "day = $string1<BR>time = $string2<BR>today = $string3<BR><BR>";
    
    if($i > 6)
    {
        //start new row
        print "</TR><tr align=left valign=top bgcolor=$cellbg>";
        $i = 0;
    }
    //print day
    /* THIS CHUNK DISPLAYS THE EVENTS ON EACH DAY FOR EACH DAY 
         $conn2=mysql_pconnect($host,$user,$pwd);
         mysql_select_db($db,$conn2);
         $sql2="SELECT * FROM ".$events_table." WHERE datestamp = ".$daystamp;
         $sql2=$sql2." ORDER BY stimestamp";
         $result2=mysql_query($sql2,$conn2);
		 
		 */
		 
  
  //$sql = "SELECT * FROM ".$events_table; //." WHERE datestamp =  ". $daystamp;
 
 // $sql = "SELECT ".$events_table.".*,`nomeprogetto`,titolo FROM ".$events_table." inner join tb_progetto on id_progetto=id_progetto inner join tb_corso on id_corso=id_corso";
  $sql= "SELECT ".$events_table.".*,`nomeprogetto`,tb_corso.titolo,tb_anagrafica.nome,tb_anagrafica.cognome, tb_modulo.titolo as tit2 FROM ".$events_table.",tb_progetto,tb_corso,tb_modulo,tb_anagrafica where tb_modulo.id_modulo = ".$events_table.".id_modulo and tb_modulo.id_corso = tb_corso.id_corso and tb_corso.id_progetto = tb_progetto.id_progetto and 
  ".$events_table.".id_progetto = tb_progetto.id_progetto and ".$events_table.".id_corso = tb_corso.id_corso and tb_anagrafica.id_anagrafica = ".$events_table.".id_docente";
	  $stmt = $mysqli->prepare($sql); 
	  
	  $stmt->execute();
$result = $stmt->get_result(); // get the mysqli result



         if (mysqli_num_rows($result)>=0)
         {
         ?>
        <td bgcolor=<?php if($todaystamp == $daystamp) echo $curcellbg; else echo $cellbg;?> height="<?php echo $rowht2 ?>" width="14%" class="dayno">
       <!-- <A HREF="#" onMouseOver="window.status='Click for popup day schedule';return true" onMouseOut="window.status='';return true" onClick="popup('popday.php?daystamp=<?php echo $daystamp?>', 'Win1', 600, 275); return false" class="daylink">-->
      
  <!--<A HREF="#" onMouseOver="window.status='Click for popup day schedule';return true" onMouseOut="window.status='';return true" onClick="popup('agenda/confPres.php?daystamp=<?php echo $string1?>', 'Win1', 600, 275); return false" class="daylink"> -->

	  <?php echo $d."  <i class='far fa-calendar-plus'></i>"?></A><BR>
	  <ul>
        <?php
            while($rs= $result->fetch_assoc())
            {
	//			 $string1 = strftime("%Y-%m-%d",$daystamp);
   // $string2 = strftime("%Y-%m-%d",$timestamp);
   // $string3 = strftime("%Y-%m-%d",$todaystamp);
   // print "day = $string1<BR>time = $string2<BR>today = $string3<BR><BR>";
   
   if(strftime("%Y-%m-%d",$rs['datestamp'])== $string1)
   {
               $thisid = $rs['id'];
               $datestamp = $rs['datestamp'];
               /*if($date_standard == 0)
                  $date = strftime("%Y-%m-%d",$datestamp);
               else if($date_standard == 1)
                  $date = strftime("%m/%d/%Y",$datestamp);
               */
               $stimestamp = $rs['stimestamp'];
               if($time_standard == 0)
                  $stime = strftime("%H:%M",$stimestamp);
               else if($time_standard == 1)
               {
                   $stime = strftime("%I:%M",$stimestamp);
                   $saorp = strftime("%p",$stimestamp);
                   $saorp = strtolower($saorp);
                   $stime = $stime.$saorp;
               }
               
               $etimestamp = $rs['etimestamp'];
               if($time_standard == 0)
                  $etime = strftime("%H:%M",$etimestamp);
               else if($time_standard == 1)
               {
                   $etime = strftime("%I:%M",$etimestamp);
                   $eaorp = strftime("%p",$etimestamp);
                   $eaorp = strtolower($eaorp);
                   $etime = $etime.$eaorp;
               }
                  
               $loc = $rs['resource'];
               $desc = $rs['descr'];
			   $id_progetto = $rs['nomeprogetto'];
               $id_corso = $rs['titolo'];
			   $id_modulo=$rs['tit2'];
			   $id_nome=$rs['nome'];
			   $id_cognome=$rs['cognome'];
			   $id_lez=$rs['id'];
			   $confermata = $presenza->getPresenzalezione($mysqli,$thisid);    
			
            if($confermata>0)
			{
				$colortesto="red";
				?>
				<span title="<?php echo "$desc  ($loc)";?>"><li>
				<A style="color:<?php echo $colortesto?>">
				<?php echo $stime."-".$etime."&nbsp".$loc.";Progetto:".$id_progetto.";Corso:".$id_corso.";Modulo:".$id_modulo.";Docente:".$id_nome." ".$id_cognome."<BR>";?>
				</a></li></span>
				<?php 
			}
			else
			{
				$colortesto="green";
					?>
				<span title="<?php echo "$desc  ($loc)";?>"><li>
				 <A HREF="#" alt="<?php echo $desc.'-'.$id_progetto.'-'.$id_corso?>" onMouseOver="window.status='Click for popup detail';return true" onMouseOut="window.status='';return true" onClick="popup('agenda/confPresD.php?loc=<?php echo $loc?>&id=<?php echo $id_lez?>&stime=<?php echo $stime?>&etime=<?php echo $etime?>&desc=<?php echo $desc?>&id=<?php echo $thisid?>&daystamp=<?php echo $daystamp?>', 'Win1', 600, 125); return false" class="eventlink" style="color:<?php echo $colortesto?>">
				<?php echo $stime."-".$etime."&nbsp".$loc.";Progetto:".$id_progetto.";Corso:".$id_corso.";Modulo:".$id_modulo.";Docente:".$id_nome." ".$id_cognome."<BR>";?>
				</a></li></span>
				<?php 
			}
		
		
       
        
		
   }
            } // end while
			?>
			</ul>
			<?php
      }// end if(mysql_num_rows($result2)>0)
         /* END DAY EVENTS CHUNK */
      else
      {?>
        <td bgcolor=<?php if($todaystamp == $daystamp)echo $curcellbg; else echo $cellbg;?> height="<?php echo $rowht2?>" width="14%" class="dayno">&nbsp;<?php echo $d?><BR>
      <?php }
    //print "day = $daystamp";
    print "</TD>";
    $daystamp = strtotime("+1 day",$daystamp);
    $i++;
    $d++;
}// end while($d < 4daysinmonth)
?>
</TABLE>
 <script>
 
 $("#meseprima").on("click",function(){
        $("#content").load("agenda/index.php?timestamp=<?php echo $prevstamp?>&noinc=0");
}); 
$("#mesedopo").on("click",function(){
          $("#content").load("agenda/index.php?timestamp=<?php echo $nextstamp?>&noinc=0");
}); 
 
 </script>