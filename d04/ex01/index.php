<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<?PHP
session_start();
if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] === "OK")
   {
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
   }
?>   
<form method="get" action="index.php"> 
	  Identifiant: <input type="text" name="login" value="<?PHP echo $_SESSION['login'] ?>" />
	  <br />
	  Mot de passe: <input type="password" name="passwd" value="<?PHP echo $_SESSION['passwd'] ?>" />
	  <br />
	  <input type="submit" name="submit" value="OK"/>
</form>
</body></html>

