<?php
	session_start();
	
	if ((!isset($_POST['urzytkownik'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

$urzytkownik=isset($_POST["urzytkownik"])?$_POST["urzytkownik"]:'';
$haslo=isset($_POST["haslo"])?$_POST["haslo"]:'';

require('config.inc.php');
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    } 


$sql = "SELECT * FROM uczestnicy_testu WHERE login='$urzytkownik' AND haslo='$haslo'";

$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
            echo"<table border=\"1\">";
    while($row = mysqli_fetch_assoc($result)) 
    {
        echo'<tr><td>' . $row["id"] . '</td><td>'. $row["imie"]. '</td><td>' . $row["nazwisko"] . '</td><td>' . $row["login"] . '</td><td>' . $row["haslo"] . '</td><td>' . $row["ilosc_punktow"] . '</td></tr>';
           $_SESSION["id"]=$row["id"];
		$_SESSION['zalogowany'] = true;
		unset($_SESSION['blad']);
                header("Location: fupload.php");
                exit();
        
    }
    echo "</table>";
}
else
{
 $komunikat='Niepoprawny identyfikator lub hasło';
    	$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
		header('Location: index.php');
}
?>

			