<?PHP
function auth($login, $passwd)
{
   if (!$login || !$passwd || !($tab = file_get_contents("../private/passwd")))
   { 
      return FALSE;
   }
   $tab = unserialize($tab);
   $hashed_pwd = hash('whirlpool', $passwd);
   foreach ($tab as $elem)
   {
      if ($elem['login'] === $login && $elem['passwd'] === $hashed_pwd)
         return TRUE;
   }
   return FALSE;
}
?>
