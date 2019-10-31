<!DOCTYPE html>

<head>
<link rel="stylesheet" href="styles.css">
</head>

<body>
<?php


// set error handling
ini_set('display_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = 'localhost';
$username = 'root';
$password = ''; // use your own username and password for the server.

$dbversion = 0.1;
$dbname = 'EmployeeTraining';
$connection = new mysqli($servername, $username, $password, $dbname);

$emailError = "";
$passwordError = "";
$duplicateError = "";

if($connection -> connect_error){
	echo "Error connecting to database - " + $connection->connect_error;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (empty($_POST['email']) && empty($_POST['password'])) {
        $emailError = "Email is required";
        $emailError = "password is required";

    }
    else if (empty($_POST['email'])) {
        $emailError = "Email is required";
    }
    else if (empty($_POST['password'])) {
        $passwordError = "password is required";
    }
    else {

        $username = trim($_POST['email']);
        $usernamecheck = "SELECT * FROM  authentication WHERE email = '" . $username . "'"; 
        $usernamecheckquery = mysqli_query($connection, $usernamecheck);
        $usernamecheckcount = mysqli_num_rows($usernamecheckquery);

        if ($usernamecheckcount == 0) {

            $password = trim($_POST['password']);
            $currentusers = mysqli_query($connection, "SELECT COUNT(*) FROM authentication");
            $testid = mysqli_fetch_assoc($currentusers)["COUNT(*)"] + 1;
            $query = "INSERT INTO authentication(id, password, email, type) values ('$testid', '$password', '$username', '0')";
            $result = mysqli_query($connection, $query);
        }
        else
        {
            $duplicateError = "There is already an account with that email. Forgot password? Well, too bad. I haven't implemented that page yet.";
        }
    }
}

session_start();
?>

<form id="register_form" action="register.php" method="post">
<fieldset>
<legend>Sign Up</legend>
<div class="form-group">	
<label for="email">Email: </label>
<input class="form-control" type="text" name="email" id="email" maxlength="50" />
<span class="error"> <?php echo $emailError;?> </span> </div>

<div class="form-group">
<label for="password">Password: </label>
<input class="form-control" type="password" name="password" id="password" maxlength="10" />
<span class="error"> <?php echo $passwordError;?> </span> </div>

<input type="hidden" name="utype" value="2" />
<input class="btn btn-default" type="submit" name="submit" value="Sign me up!" />
</fieldset>
</form>

<span class="error"> <?php echo $duplicateError ?> </span>


</body>