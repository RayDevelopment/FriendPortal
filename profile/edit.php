
<?php
    session_start();
    
    if($_SESSION AND !$_POST) {
        $username = $_SESSION['user'];
        
        $connection = mysql_connect("localhost", "root", "");
        mysql_select_db("friendportal", $connection);
        
        $query = mysql_query("SELECT * FROM 'accounts' WHERE username='$username'", $connection);
        
        $data = mysql_fetch_array($query, MYSQL_ASSOC);
        $description = htmlspecialchars($data['description'], ENT_QUOTES);
    }

    if($_POST) {
        $username = $_SESSION['user'];
        $description = mysql_real_escape_string($_POST['description']);
        
        mysql_query("INSERT INTO profile ('username', 'description') VALUES ($username, $description", $connection);
        
        header("Location: profile.php");
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
    
    <base href="friendportal.github.io" /></head>
<body>
    <form method="post">
        <textarea name="description" id="description" maxlength="16777215">
            <?php echo $description; ?>
        </textarea>
    </form>
</body>
</html>
