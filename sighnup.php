<?php
    if($_POST)
    {
        $name_first = stripslashes(mysql_real_escape_string($_POST['first-name']));
        $name_last = stripslashes(mysql_real_escape_string($_POST['last-name']));
        $username = stripslashes(mysql_real_escape_string($_POST['username']));
        $hash = hash('sha512', stripslashes(mysql_real_escape_string($_POST['password'])));
        
        $connection = mysql_connect("localhost", "root", "");
        mysql_select_db("friendportal", $connection);
        
        $error = "";
        
        $query = mysql_query("SELECT * FROM accounts WHERE username='$username'", $connection);
        
        if(mysql_num_rows($query) == 0) {
            mysql_query("INSERT INTO accounts ('username', 'hash', 'first-name', 'last-name') VALUES ($username, $hash, $name_first, $name_last);", $connection);
        
            session_start();
            $_SESSION['user'] = $username;
            
            header("Location: index.php");
        } else {
            $error = "<br />You tried to make an account with a pre-existing username!";
        }
    }
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Friend Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="stylesheet" href="main.css" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <base href="friendportal.github.io" />
</head>
<body>
    <form method='post'>
        First Name: <input type='text' name='first-name' id='first-name' /> <br />
        Last Name: <input type='text' name='last-name' id='last-name' /> <br />
        
        Username: <input type='text' name='username' id='username' /> <br />
        Password: <input type='password' name='password' id='password' />
        
        <?php
            echo $error;
        ?>
        <br /><br />
        
        <input type='submit' class="btn btn-primary btn-sm" />
    </form>
</body>
</html>
