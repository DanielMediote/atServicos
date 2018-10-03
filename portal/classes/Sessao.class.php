<?php



/**
 *
 */
final class Sessao
{

  function __construct(){
    session_start();
  }

  public function openSession($dados)
  {
    $_SESSION['status'] = True;
    foreach ($dados as $key => $value) {
      $_SESSION[$key] = $value;
    }
  }

  public function closeSession($pessoa)
  {
    $_SESSION['status'] = False;
    foreach ($pessoa->getAll() as $key => $value) {
      unset($_SESSION[$key]);
    }
  }

}



 ?>
