<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
	        header("Location: index.php");
	}
	else
	{
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
<script type="text/javascript">LatexIT.add('p',true)</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="stylowo2.css">  
    </head>
<?php
echo '<body>
 <div class="frame">
        <h1 class="ha">Test Matematyczny</h1>';


 require('config.inc.php');
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    } 


$x=$_SESSION["id"];
$sql = "SELECT * FROM pytania";
$result = $conn->query($sql);
        echo'<form action="fupload.php" method="POST">';
$i=1;
if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
    {
        echo'<p>' . $row["pytanie"] . '</br>
        <input type="radio" name='.$i.' value='. $row["odp1"].'>'. $row["odp1"].'</br>
        <input type="radio" name='.$i.' value='. $row["odp2"].'>'. $row["odp2"].'</br>
        <input type="radio" name='.$i.' value='. $row["odp3"].'>'. $row["odp3"].'</p></br>';
        $i=$i+1;
    }
} 
    echo'<button type="submit" value="submit">Sprawdź</button><p></p>';
    echo'</form>';

$odp[1]=isset($_POST["1"])?$_POST["1"]:'';
$odp[2]=isset($_POST["2"])?$_POST["2"]:'';
$odp[3]=isset($_POST["3"])?$_POST["3"]:'';
$odp[4]=isset($_POST["4"])?$_POST["4"]:'';
$odp[5]=isset($_POST["5"])?$_POST["5"]:'';
$score=-1;



$sql = "SELECT popodp FROM pytania";
$result = $conn->query($sql);
$i=1;
if (mysqli_num_rows($result) > 0) 
{
    $score=0;
    while($row = mysqli_fetch_assoc($result)) 
    {
        if($odp[$i]==$row["popodp"])
        $score++;
        $i++;
    }
}



        if($score!="")
echo'<h1>Twój wynik Wynosi : '.$score.' / 5 Gratulacje !!!</h1>';



if($score!="")
{
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "UPDATE uczestnicy_testu SET ilosc_punktow='$score' WHERE id=$x";
if ($conn->query($sql) === TRUE) {
    echo " ";
} else {
    echo "Error updating record: " . $conn->error;
}
}



echo'<center>';
$sql = "SELECT * FROM uczestnicy_testu Where ilosc_punktow>=0 order by ilosc_punktow DESC LIMIT 10";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) 
{
    echo"<table class=\"table\">";
    while($row = mysqli_fetch_assoc($result)) 
    {
        echo'<tr><td>'. $row["imie"] . '</td><td>' . $row["nazwisko"] .'</td><td>' . $row["ilosc_punktow"]. '</td></tr>';
    }
    echo "</table>";
} 
echo'</center>';




echo'
</br><center>
<a href="wyloguj.php">wyloguj</a>
</div>';
echo'</body></center>
</html>';
}
?>

