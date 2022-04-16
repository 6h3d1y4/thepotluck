<!DOCTYPE html>

<!-- //Connect to a database and retreive value from  -->
<!-- //Establishing connection with our database -->
<?php


session_start();

$servername = 'localhost';
$database_name = 'recipe';
$username = "root";
$password = "";

$database = new mysqli($servername, $username, $password, $database_name);

if($database->connect_error) {
    die("connection failed: " . $database->connect_error);
}



$email = "";
$password = "";


// Checking if the username and password have values
if(isset($_POST["login"])){
    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = mysqli_real_escape_string($database, md5($_POST['password']));

    $checker = mysqli_query($database, "SELECT * FROM users WHERE email = '$email' && '$password'");

    $row_num = mysqli_num_rows($checker);

    if($row_num == 1){
        $_SESSION['email'] = $email;
        header('Location:home.php');
    }else{
        $php_errormsg ="User does not exist";
    }

    }
 


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!empty($php_errormsg)){echo $php_errormsg;}?>
    <form method="post" action="">
        <p>Email: </p>
        <input type="email" name="email"> 
        <p>Password: </p> 
        <input type="password" name="password">
        <input type="submit" name="login">
    </form>

</body>
</html>