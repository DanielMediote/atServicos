<?php



/**
*
*/
final class Sessao{


  public static function open()
  {
    session_start();
  }

  public static function setSessionData($dados)
  {
    $_SESSION['status'] = True;
    foreach ($dados as $key => $value) {
      $_SESSION[$key] = $value;
    }
  }

  public static function unsetSessionDate($pessoa)
  {
    $_SESSION['status'] = False;
    foreach ($pessoa->getAll() as $key => $value) {
      unset($_SESSION[$key]);
    }
  }

}



?>
