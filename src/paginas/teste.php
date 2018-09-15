<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Teste</title>
</head>
<body>
  <form style="margin-left: 2%;" action="#" method="post">
    <?php
    function my_autoload ($className) {
      include_once(__DIR__ . "/../classes/" . $className . ".class.php");
    }
    spl_autoload_register("my_autoload");
    $funcionario = new Cliente();


    ?>
  </form>
</body>
</html>
