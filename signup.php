
<?php
    if($_POST)
    {
        $name_first = mysql_real_escape_string($_POST['first-name']);
        $name_last = mysql_real_escape_string($_POST['last-name']);
        $username = mysql_real_escape_string($_POST['username']);
        $hash = hash('sha512', mysql_real_escape_string($_POST['password']));
        $age_year = $_POST['age-year'];
        $age-month = $_POST['age-month'];
        $age-day = $_POST['age-day'];
        
        $connection = mysql_connect("localhost", "root", "");
        mysql_select_db("friendportal", $connection);
        
        $error = "";
        
        $query = mysql_query("SELECT * FROM accounts WHERE username='$username'", $connection);
        
        if(mysql_num_rows($query) == 0) {
            mysql_query("INSERT INTO accounts ('username', 'hash', 'first-name', 'last-name', 'age-year', 'age-month', 'age-day') VALUES ($username, $hash, $name_first, $name_last);", $connection);
        
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
        First Name: <input type='text' name='first-name' id='first-name' maxlength="255" /> <br />
        Last Name: <input type='text' name='last-name' id='last-name' maxlength="255" /> <br />
        
        Username: <input type='text' name='username' id='username' maxlength="255" /> <br />
        Password: <input type='password' name='password' id='password' maxlength="255" /> <br /><br />

        Age (Year): <input type="number" name="age-year" id="age-year" maxlength="4" /> <br />
        Age (Month): <select name="age-month" id="month">
            <option value="JANUARY">January</option>
            <option value="FEBRUARY">February</option>
            <option value="MARCH">March</option>
            <option value="APRIL">April</option>
            <option value="MAY">May</option>
            <option value="JUNE">June</option>
            <option value="JULY">July</option>
            <option value="AUGUST">August</option>
            <option value="SEPTEMBER">September</option>
            <option value="OCTOBER">October</option>
            <option value="NOVEMBER">November</option>
            <option value="DECEMBER">December</option>
        </select> <br />
        Age (Day): <select name="age-day" id="age-day">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>
        
        <?php
            echo $error;
        ?>
        <br /><br />
        
        <input type='submit' class="btn btn-primary btn-sm" />
    </form>
</body>
</html>
