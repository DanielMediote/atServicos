<?php


class File{

  protected $name;
  protected $type;
  protected $tmp_name;
  protected $error;
  protected $size;
  protected $base64;

  function __construct($file){
    $arrayObj = get_object_vars($this);
    foreach ($arrayObj as $key => $value) {
      $this->$key = $file[$key];
    }
    $this->base64 = base64_encode(file_get_contents($file['tmp_name']));
  }

  public function detalhesFile(){
    foreach (get_object_vars($this) as $key => $value) {
      echo "{$key} = $value \n";
    }
  }

  public function readBase64(){
    return base64_decode($this->base64);
  }

  public function get($atributo){
    if (isset($atributo)) {
      return $this->$atributo;
    } else {
      return $this->NULL;
    }
  }
}





?>
