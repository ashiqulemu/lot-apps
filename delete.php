<?php



include 'function.php';

$obj = new crud();


$id = $_GET['userID'];

 $obj->destroy($id);


?>


 