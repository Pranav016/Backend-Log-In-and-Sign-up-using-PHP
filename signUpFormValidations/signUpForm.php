<?php
 
include '../connect.php';

if(isset($_POST['submit']))
{
    //mysqli_real_escape_string() is used to ensure no special characters such as null, \n etc
    $name=mysqli_real_escape_string($con, $_POST['name']);  
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $mobile=mysqli_real_escape_string($con, $_POST['mobile']);
    $password=mysqli_real_escape_string($con, $_POST['password']);
    $cpassword=mysqli_real_escape_string($con, $_POST['cpassword']);

    $pass=password_hash($password, PASSWORD_BCRYPT);  //encrypting the password
    $cpass=password_hash($cpassword, PASSWORD_BCRYPT);
    $emailquery="select * from formm where email='$email'";
    $query=mysqli_query($con, $emailquery);
    $emailCount=mysqli_num_rows($query);  
    if($emailCount>0)
    {
            echo '<script> alert("email entered has already been registered on this website");';
            echo 'window.location.href="formm.html"';            //to redirect to a different page
            echo ' </script>';
    }
    elseif($password===$cpassword)
    {
       $insertquery="insert into formm(name, mobile, email, password) values('$name', '$mobile','$email','$pass')";
       $iquery=mysqli_query($con, $insertquery);

       if($iquery)
       {
            echo '<script> alert("form submitted");';
            echo 'window.location.href="../Log-in-out/logIn.html"';
            echo ' </script>';
       }
    }
    else
    {
        echo '<script> alert("password does not match confirmation password");'; 
        echo 'window.location.href="formm.html"';
        echo ' </script>';
    }
}

?>

    <!-- header("location:form.html");       used to send http request for redirection -->