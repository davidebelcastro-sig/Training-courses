  <html>
<head>
<title>User Login</title>
<link href="css/ltw.css" rel="stylesheet" type="text/css" />
 
</head>
<body>
    <div> 
	<center>	
    <img src="img/corsi_home.jpg" alt="CORSI FORMAZIONE" /><h1>CORSI DI FORMAZIONE</h1>
    </center>
        <form action="business/login_check.php" method="post" id="frmLogin" onSubmit="return validate();">
            <div class="demo-table">
                <div class="form-head">Login</div>
                <div class="field-column">
                    <div>
                        <label for="username">Username</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="user_name" id="user_name" type="text"
                            class="demo-input-box">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password" id="password" type="password"
                            class="demo-input-box">
                    </div>
                </div>
                <div class=field-column>
                    <div>
                        <input type="submit" name="login" value="Login"
                        class="btnLogin"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
   
<script>
    function validate() {
        var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var userName = document.getElementById("user_name").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }


  
		</script>
	</html>
