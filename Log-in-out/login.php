<?php

// session_start();
include '../connect.php';

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
    echo $pass;
    echo "<br>";
    $email_search="select * from formm where email='$email'";
    $query=mysqli_query($con, $email_search);

    $emailcount=mysqli_num_rows($query);

    if($emailcount)
    {
        echo "entered";
        echo "<br>";
        $email_pass=mysqli_fetch_assoc($query);//this function returns an array of that particular row in the database
        $dbpass=$email_pass['password'];
        $_SESSION['name']=$email_pass['name'];
        echo $dbpass;
        $pass_decode=password_verify($pass, $dbpass);
        echo $pass_decode;
        if($pass_decode)
        {
            // echo '<script> alert("Log in successful");';
            // echo 'window.location.href="homepage.php"';
            // echo ' </script>';
        }
        else
        {
            // echo '<script> alert("Incorrect password");';
            // echo 'window.location.href="logIn.html"';
            // echo ' </script>';
        }
    }
    else
    {
        echo '<script> alert("Invalid email");';
        echo 'window.location.href="logIn.html"';
        echo ' </script>';
    }
}

?>