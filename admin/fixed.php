<?php
//Connect with Mysql
 $connection=mysqli_connect("localhost","root","","project");
 mysqli_select_db($connection,'fixed');

 //update query
 $sql = "UPDATE issues SET Name='$_POST[fixed]' WHERE ID=$_POST[issue_id]";
  

 //Execute the query

 if(mysqli_query($connection,$sql))
     header("refresh:1; url=index.php");
else
 echo "Not update";


?>