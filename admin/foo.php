<?php


//$name=$_POST['name'];
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
//$get_id =$_GET['id'];
$mysql = new mysqli('localhost','root','root','db');
if (isset($_POST['add'])){
/*  $sql =("INSERT INTO users_1 (name) VALUES (name)");
  $query = $pdo->prepare($sql);
  $query->execute([$name]);
  if ($query){
    header("Location: ". $_SERVER['HTTP_REFERER']);
  }*/
  $mysql -> query("INSERT INTO `users_1` (`name`) VALUES('$name')");

  $mysql -> close();

  header('Location: /courswork/admin/index.php');
}

//read
/*$id=$_POST['id']
$q ="UPDATE `users_1` SET 'name'='$name' WHERE `id`='$id'";
if (mysql_query($mysql, $q)){
  header('Location: /courswork/admin/index.php');
}else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /courswork/admin/index.php');
   mysqli_close($mysql);*/
 ?>
