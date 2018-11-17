<?php

final class Conexao{

  public function open(){
    define('user', 'root');
    define('host', 'mysql');
    define('pass', 'root');
    define('data', 'atServico');
    define('port', '3306');
    try {
      $conn = new PDO("mysql:dbname=".data."; host=".host."; port=".port, user, pass,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $conn;
  }

  public static function prepare($sql){
    return self::open()->prepare($sql);
  }

}

?>
