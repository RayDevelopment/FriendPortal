
<?php
    if($_GET) {
        $user = mysql_real_escape_string($_GET['user']);
        
        $connection = mysql_connect("localhost", "root", "");
        mysql_select_db("friendportal", $connection);
        
        $queryProfile = mysql_query("SELECT * FROM 'profile' WHERE username='$user'", $connection);
        $queryNames = mysql_query("SELECT * FROM 'accounts' WHERE username='$user'", $connection);
        
        $dataProfile = mysql_fetch_array($queryProfile, MYSQL_ASSOC);
        $dataNames = mysql_fetch_array($queryNames, MYSQL_ASSOC);
        
        $name-first = htmlspecialchars($dataNames['first-name'], ENT_QUOTES);
        $name-last = htmlspecialchars($dataNames['last-name'], ENT_QUOTES);
        $description = htmlspecialchars($dataProfile['description'], ENT_QUOTES);
        
        $title = $name-first." \"".$user."\" ".$name-last;
    }
?>

<DOCTYPE html>

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
    <pre>Goto: <form method='get'><input type='text' name='user' id='user' maxlength='255' /></pre> <br /><br />
    
    <h3><?php echo $title; ?></h3>
    <p class="text text-info"><?php echo $description; ?></p>
</body>
</html>
