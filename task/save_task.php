<?php
var_dump($_POST);
include('../conn.php');
// Create connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bn = $_POST['task'];
    $yn = $_POST['url'];
    $date=date('d-m-Y');

    $sql = "INSERT INTO `task`(`task`, `url`, `date`, `user_id`) VALUES ('$bn', '$yn','$date','1')";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        header('Location:../index.php?page=2&msg=datasave');
      } else {
        header('Location:../index.php?page=2&msg=data-no-save');
      }
    
}


?>