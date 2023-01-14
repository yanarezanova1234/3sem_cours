<?php

$mysql = new mysqli(
  'localhost',
  'root',
  'root',
  'db'
 );

$id = $_POST['id'];

$q = "DELETE FROM `users_1` WHERE `id` = '$id'";
if (mysqli_query($mysql, $q))
{
  header('Location: /courswork/admin/index.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /courswork/admin/index.php');
}
mysqli_close($mysql);
?>
