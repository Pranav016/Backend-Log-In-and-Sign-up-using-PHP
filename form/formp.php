<?php

$con=mysqli_connect('localhost','root','');

mysqli_select_db($con, 'sample');

$email=$_POST['email'];
$pass=$_POST['password'];

$query= "insert into form (email, password) values('$email', '$pass')";

mysqli_query($con, $query);

header('location:form.html');

?>

