<?php
function ini_session_start() {
 if (!isset($_SESSION)) {
			session_start(); // Avvia la sessione php.
      
    
		 session_regenerate_id(true); // Rigenera la sessione e cancella quella creata in precedenza.
		
}
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // ultima richiesta da più di 30 minuti
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
		header('Location: ../logout.php');
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
		if(($stmt->num_rows == 1) && (password_verify($password,$db_password))) { // se l'utente esiste
            // Password corretta!            
               //$user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
               $user_id = preg_replace("/[^0-9]+/", "", $user_id); // ci proteggiamo da un attacco XSS
               $_SESSION['user_id'] = $user_id; 
               $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
               $_SESSION['username'] = $username;
               $disaply_name = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $disaply_name); // ci proteggiamo da un attacco XSS
               $_SESSION['display_name'] = $disaply_name;
               $sesso = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $sesso); // ci proteggiamo da un attacco XSS
               $_SESSION['sesso'] = $sesso;
	
			   
              // $_SESSION['login_string'] = hash('sha512', $db_password.$user_browser);
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



?>