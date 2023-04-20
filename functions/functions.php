<?php
function ini_session_start() {
	$session_name = 'ini_session_id'; // Imposta un nome di sessione 
	session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
        $secure = false; // Imposta il parametro a true se si usa il protocollo 'https'.
        $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
  $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.	
  session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
 if (!isset($_SESSION)) {
			session_start(); // Avvia la sessione php.
      
      
        //ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
      
       
    
		 session_regenerate_id(true); // Rigenera la sessione e cancella quella creata in precedenza.
		
}
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // ultima richiesta da più di 30 minuti
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
		//header('location: '.$_SERVER[HTTP_HOST].'/area_riservata/logout.php');
		header('location: logout.php');
		}
		$_SESSION['LAST_ACTIVITY'] = time(); // aggiorna ultima richiesta
		
}
function login($username, $password, $mysqli) {

   if ($stmt = $mysqli->prepare("SELECT id_account,username,password,displayname,sesso FROM `tb_account` WHERE username=  ?")){ 
      $stmt->bind_param('s', $username); // esegue il bind del parametro '$username'.
	  $stmt->execute(); // esegue la query appena creata.
      $stmt->store_result();
      $stmt->bind_result($user_id,$username, $db_password,$disaply_name,$sesso); // recupera il risultato della query e lo memorizza nelle relative variabili.
      $stmt->fetch();
	  //echo $user_id.",".$username.",-----". $db_password;
	  //die();
		if(($stmt->num_rows == 1) && (password_verify($password,$db_password))) { // se l'utente esiste
            // Password corretta!            
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
               $user_id = preg_replace("/[^0-9]+/", "", $user_id); // ci proteggiamo da un attacco XSS
               $_SESSION['user_id'] = $user_id; 
               $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
               $_SESSION['username'] = $username;
               $disaply_name = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $disaply_name); // ci proteggiamo da un attacco XSS
               $_SESSION['display_name'] = $disaply_name;
               $sesso = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $sesso); // ci proteggiamo da un attacco XSS
               $_SESSION['sesso'] = $sesso;
	
			   
               $_SESSION['login_string'] = hash('sha512', $db_password.$user_browser);
			   $mysqli->close();	
               return true;    
        } else {
          return false;
       }
     } else {
		 echo $mysqli -> error;
		 return false;
      }
}


function login_check($mysqli) {
	$mysqli->select_db("area_riservata");
   // Verifica che tutte le variabili di sessione siano impostate correttamente
   if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
	 $user_id = $_SESSION['user_id'];
     $login_string = $_SESSION['login_string'];
     $username = $_SESSION['username'];     
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // reperisce la stringa 'user-agent' dell'utente.
     if ($stmt = $mysqli->prepare("SELECT password FROM utenti WHERE id = ? LIMIT 1")) { 
        $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$user_id'.
        $stmt->execute(); // Esegue la query creata.
        $stmt->store_result();
 
        if($stmt->num_rows == 1) { // se l'utente esiste
           $stmt->bind_result($password); // recupera le variabili dal risultato ottenuto.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$user_browser);
           if($login_check == $login_string) {
              // Login eseguito!!!!
              return true;
           } else {
              //  Login non eseguito
              return false;
           }
        } else {
            // Login non eseguito
            return false;
        }
     } else {
        // Login non eseguito
        return false;
     }
   } else {
     // Login non eseguito
     return false;
   }
}

?>