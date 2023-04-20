<?php
try {
    $hostname = "host_name";
    $dbname = "database_name";
    $user = "nome utente";
    $pass = "password";
    $mysqli = new mysqli($hostname, $user, $pass, $dbname);
}
catch(Exception $e)
{
    echo $e->getMessage();
}

?>
