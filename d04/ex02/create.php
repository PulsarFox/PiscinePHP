<?PHP
if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "OK")
   {
   echo "ERROR\n";
   return ;
   }
$pwd = hash('whirlpool', $_POST['passwd']);
$login = $_POST['login'];
$new = array(
      "login" => "$login",
      "passwd" => "$pwd",
      ); 
if (!file_exists("../private") || !file_exists("../private/passwd"))
   {
   mkdir ("../private");
   $tab = array($new);
   }
else
   {
      $tab = unserialize(file_get_contents("../private/passwd"));
      foreach ($tab as $elem)
         if ($elem['login'] === $login)
            {
               echo "ERROR\n";
               return ;
            }
      $tab []= $new;
   }
$tab = serialize($tab);
file_put_contents("../private/passwd", $tab);
echo "OK\n";
?>
