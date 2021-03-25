<?php

if($_POST['issue_id']){
    $issueid = $_POST['issue_id'];

    $sql = "update issues set fixed_at = now() where issue_id = '$issueid'";

    $connection=mysqli_connect("localhost","root","","project");

    mysqli_query($connection,$sql);

     header('Location: index.php');
}
?>