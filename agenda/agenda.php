<?php
function ShowCalendar($m,$y)
{
  if ((!isset($_GET['d']))||($_GET['d'] == ""))
  {
    $m = date('n');
    $y = date('Y');
  }else{
    $m = (int)strftime( "%m" ,(int)$_GET['d']);
    $y = (int)strftime( "%Y" ,(int)$_GET['d']);
    $m = $m;
    $y = $y;
  }

  $precedente = mktime(0, 0, 0, $m -1, 1, $y);
  $successivo = mktime(0, 0, 0, $m +1, 1, $y);

  $nomi_mesi = array(
    "Gen",
    "Feb",
    "Mar",
    "Apr",
    "Mag",
    "Giu", 
    "Lug",
    "Ago",
    "Set",
    "Ott",
    "Nov",
    "Dic"
  );
  $nomi_giorni = array(
    "Lun",
    "Mar",
    "Mer",
    "Gio",
    "Ven",
    "Sab",
    "Dom"
  );

  $cols = 7;
  $days = date("t",mktime(0, 0, 0, $m, 1, $y)); 
  $lunedi= date("w",mktime(0, 0, 0, $m, 1, $y));
  if($lunedi==0) $lunedi = 7;
  echo "<table>\n"; 
  echo "<tr>\n
  <td colspan=\"".$cols."\">
  <a href=\"?d=" . $precedente . "\">&lt;&lt;</a>
  " . $nomi_mesi[$m-1] . " " . $y . " 
  <a href=\"?d=" . $successivo . "\">&gt;&gt;</a></td></tr>";
  foreach($nomi_giorni as $v)
  {
    echo "<td><b>".$v."</b></td>\n";
  }
  echo "</tr>";

  for($j = 1; $j<$days+$lunedi; $j++)
  {
    if($j%$cols+1==0)
    {
      echo "<tr>\n";
    }

    if($j<$lunedi)
    {
      echo "<td> </td>\n";
    }else{
      $day= $j-($lunedi-1);
      $data = strtotime(date($y."-".$m."-".$day));
      $oggi = strtotime(date("Y-m-d"));
 require_once('../configurazione/database.php');
      $sql = "SELECT str_data FROM appuntamenti";
	  $stmt = $mysqli->prepare($sql); 
	  
	  $stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$user = $result->fetch_assoc(); // fetch data   
	  


        while($user = $result->fetch_assoc())
        {
          $str_data = $user['str_data'];
          if ($str_data == $data)
          {
            $day = "<a href=\"appuntamenti.php?day=$str_data\">$day</a>";
          }
        }


      if($data != $oggi)
      {
        echo "<td>".$day."</td>";
      }else{
        echo "<td><b>".$day."</b></td>";
      }
    }

    if($j%$cols==0)
    {
      echo "</tr>";
    }
  }
  echo "<tr></tr>";
  echo "</table>";
}
ShowCalendar(date("m"),date("Y")); 
?>