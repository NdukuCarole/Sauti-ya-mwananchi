<?php
include('security.php');

$connection = mysqli_connect("localhost", "root","","project");
 if(isset($_POST['about_save']))
 
 {
     $title =$_POST['title'];
     $subtitle =$_POST['subtitle'];
     $description =$_POST['description'];
     $links =$_POST['links'];



     $query = "INSERT INTO display (title, subtitle, description, links) VALUES('$title', '$subtitle', '$description','$links')";
     $query_run = mysqli_query($connection, $query);
 }
 


 if($query_run)

 {
     $_SESSION['success'] = "success";
      header("Location: updateshow.php");
 }
 else{


$_SESSION['success' ] ="Not successful";
header("Location: updateshow.php");

 }


 ?>