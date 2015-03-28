<?php
    if($_POST)
    {
        $username = mysql_real_escape_string($_POST['username']);
        $hash = hash('sha512', mysql_real_escape_string($_POST));
        
        $connection = mysql_connect("localhost", "root", "");
        mysql_select_db("friendportal", $connection);
        
        $query = mysql_query("SELECT * FROM accounts WHERE username='$username' AND hash='$hash'", $connection);
        
        $error = "";
        
        if(mysql_num_rows($query) == 1) {
            session_start();
            $_SESSION['user'] = $username;
            
            header("Location: index.php");
        } else {
            $error = "Username or password incorect";
        }
    }
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Friend Portal -- Login</title />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="stylesheet" href="main.css" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <base href="friendportal.github.io" />
</head>
<body>
    <form method='post'>
        Username: <input type='text' name='username' id='username' />
        Password: <input type='password' name='password' id='password' />
        <?php
            echo $error;
        ?>
        <br />
        <input type='submit' class="btn btn-primary btn-sm" />
    </form>
</body>
</html>
