<?php



/**
*
*/
final class Sessao{


  public static function open()
  {
    session_start();
  }

  public static function setSessionData($dados){
    $_SESSION['status'] = True;
    foreach ($dados as $key => $value) {
      $_SESSION[$key] = $value;
    }
  }

  public static function unsetSessionDate(){
    $_SESSION['status'] = False;
    foreach ($_SESSION as $key => $value) {
      // if($key == "status") continue;
      unset($_SESSION[$key]);
    }
  }

}



?>
