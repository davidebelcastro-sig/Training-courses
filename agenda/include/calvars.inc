<?php
session_start();
//$_SESSION['ADMIN'];
if(!isset($ADMIN))
   $ADMIN = 0;
//*********************************************/
// COnfigure these for your database connection
//*********************************************/
$host = "localhost";            // 'localhost' or 'www.yoursiteurl.com' if on a remote site
$user = "user";           // username
$pwd = "password";               // password
$db = "Schedule";               // the name of your database
$events_table = "tb_calendario";        // the name of your events table (the default is "sched")
$locations_table = "tb_aula"; // the name of your locations table (the default is "resources")
$admin_table = "admin";         // the name of the table to store admin users

//******************/
// GLOBAL VARIABLES
//******************/
//   date/time standards for phpplanner
//   these are the date/time formats that phpplanner will display
//   0 - ISO International standard  (yyyy-mm-dd)
//   1 - American Style  (mm/dd/yyyy)
$date_standard = 0;
//   time standard
//   0 - ISO Standard 24 hour time 
//   1 - 12 hour time
$time_standard = 0;
//   set this variable if the host of your site is in a different timezone than you
//   For example: I live in the Eastern Standard Timezone, but my host is in a different
//                timezone, which is 5 hours ahead of mine.  
//                The only effect of setting this incorrectly is that sometimes the current
//                day will be highlighted incorrectly. 
//                (i.e. it's Jan 1st 11:00 pm where you are, but your host time is Jan 2nd 4:00 am)
//
// Set this to the timezone you live in. For example: I live in the EST Eastern Timezone, 
// but my host is in a different timezone that is 5 hours ahead of mine. 
// Use the 3 letter abbreviation ONLY for timezones, do NOT use numerical offsets.
// Timezone abbreviations can be found at: http://www.gnu.org/manual/tar-1.12/html_chapter/tar_7.html
$TZONE = "EST";

//*******************/
//  OTHER VARIABLES
//*******************/
//These variables are used in 'viewmonth.php'
$rowht1 = 30; 		//row height for the day titles i.e 'Sun' 'Mon' etc.
$rowht2 = 60;  		// row height for the calendar days (where the data goes)
$cellbg = "lightgray"; 	// the cell background for each day
$curcellbg = "1E90FF";  // the cell background for the current day
$wkendbg = "orange";    // cell background for the weekend days (Sat and Sun)
$wkbg = "F5DEB3";	// cell background for the weekdays (Mon-Fri)
$tb_border = 0;	// table border
$tb_cellspacing = 1;	// table cellspacing

//*********************/
// FUNCTIONS
//*********************/
function future_date( $start_stamp, $incrementer, $value  )
{
   list($y,$m,$d) = explode("-",strftime("%Y-%m-%d",$start_stamp));
   $m_off = 0;
   $d_off = 0;
   $y_off = 0;
   switch($incrementer)
   {
       case "d":
            $d_off = $value;
            break;
       case "w":
            $d_off = ($value * 7);
            break;
       case "m":
            $m_off = $value;
            break;
       case "y":
            $y_off = $value;
            break;
   }
   $stamp = mktime(0,0,0,($m+$m_off),($d+$d_off),($y+$y_off));

   return $stamp;
}

?>
