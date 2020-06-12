<?php

include '../connect.php';
if(!isset($_SESSION['name']))
{
    header("location:logIn.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center bg-dark">
        <h1>Hello <?php  echo $_SESSION['name']; ?>Welcome to you profile.</h1>
        <button class="btn btn-primary" >
                <a href="logout.php">Logout</a>
        </button>
    </div>
</body>
</html>