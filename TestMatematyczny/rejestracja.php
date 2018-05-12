<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="stylowo.css">  
    </head>



<body>
 <div class="frame">
        <h1 class="ha">Rejestracja do testu</h1>
<form action="rejestracja.php" method="POST">
<table>
<tr><td>Imię:</td><td><input name="imie" type="text"></td></tr>
<tr><td>Nazwisko:</td><td><input name="nazwisko" type="text"></td></tr>
<tr><td>Login:</td><td><input name="login" type="text"></td></tr>
<tr><td>Hasło:</td><td><input name="haslo" type="password"></td></tr>
</table>
<input type="submit" value="Rejestruj">
<a href="index.php">Login</a>
</form><br>


<?php    
    require('config.inc.php');
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    } 

$imie=isset($_POST["imie"])?$_POST["imie"]:'';
$nazwisko=isset($_POST["nazwisko"])?$_POST["nazwisko"]:'';
$login=isset($_POST["login"])?$_POST["login"]:'';
$haslo=isset($_POST["haslo"])?$_POST["haslo"]:'';

if(($imie!="")&&($nazwisko!="")&&($login!="")&&($haslo!=""))
{
$sql = "INSERT INTO uczestnicy_testu (imie, nazwisko, login, haslo, ilosc_punktow)
VALUES ('$imie', '$nazwisko', '$login', '$haslo', '-1')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>


</div>
</div>









</body>
</html>
