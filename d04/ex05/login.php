<?PHP
session_start();
require ('auth.php');
if (auth($_POST['login'], $_POST['passwd']) === TRUE && $_POST['Connexion'] === "OK")
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo "OK\n";
	}
else
	{
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}

?>