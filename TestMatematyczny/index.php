<?
	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: fupload.php');
		exit();
	}
?>

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
        <h1 class="ha">Logowanie do testu</h1>
<form action="zaloguj.php" method="POST">
<table>
<tr><td>Login:</td><td><input name="urzytkownik" type="text"></td></tr>
<tr><td>Hasło:</td><td><input name="haslo" type="password"></td></tr>
</table>
<input type="submit" value="login" name="login">
<a href="rejestracja.php">Rejestracja</a>
</form><br>
<?
        if(isset($_SESSION['blad']))    echo $_SESSION['blad'];
?>
</div>
</div>









</body>
</html>

 