<?php
class Member
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "class/DataSource.php";
        $this->ds = new DataSource();
    }

    function getMemberById($memberId)
    {
        $query = "select * FROM utenti WHERE id = ?";
        $paramType = "i";
        $paramArray = array($memberId);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        return $memberResult;
    }
    
    public function processLogin($username, $password) {
        $passwordHash = md5($password);
        $query = "select * FROM utenti WHERE user_name = ? AND password = ?";
		$paramType = "ss";
        $paramArray = array($username, $passwordHash);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        if(!empty($memberResult)) {
	        $_SESSION["userId"] = $memberResult[0]["id"];
            return true;
        }
    }
}