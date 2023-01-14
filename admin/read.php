<?php

$mysql = new mysqli(
  'localhost',
  'root',
  'root',
  'db'
 );

$name = filter_var(trim($_POST['name']),
 FILTER_SANITIZE_STRING);
$id = $_POST['id'];

//create


$q = "UPDATE `users_1` SET  `name` = '$name' WHERE `id` = '$id'";
if (mysqli_query($mysql, $q))
{
  header('Location: /courswork/admin/index.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /courswork/admin/index.php');
}
mysqli_close($mysql);
?>
