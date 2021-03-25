<?php

include('security.php');


if(isset($_POST['login_btn']));
{
    $email_login=$_POST['username'];
    $password_login= $_POST['passwordd'];

$query="SELECT * FROM register WHERE username='$email_login' AND password=''$password_login'";
$query_run = mysqli_query($connection, $query);

if(mysqli_fetch_array($query_run))
{
    $_SESSION['username']= $username_login;
    header('Location:index.php');
}
else{
    $_SESSION['status']='Email id /Password is Invalid';
    header('Location:login.php');
}


}



?>