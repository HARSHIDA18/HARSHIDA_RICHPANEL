<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php'; // Include the database connection
    
    $showAlert = false;

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`username`, `email`, `password`, `date`) VALUES ('$username', '$email', '$hashedPassword', current_timestamp());";

    if ($conn->query($sql)) {
        $showAlert = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if   ($showAlert)
    {
        echo '<script>alert("You Can Now Login")</script>';
        header('Location: login.php?success=1');//Redirect To The Login Page
    }
    $conn->close();
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


     <!--
        Importing Google Font APIs So As To Give Styling To The Fonts
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@1,500&display=swap" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Create An Account</title>
    <style>
        body{
    margin:0;
    padding: 0;
    display:flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: 'Jost',sans-serif;
    background: linear-gradient(to bottom, #0f0c29,#302b63,#24243e);
}
.main
{
    width: 350px;
    height: 500px;
    background: red;
    overflow: hidden;
    background: url("bg.avif") no-repeat center/cover;
    border-radius: 10px;
    box-shadow: 5px 20ox ;
}
#chk
{
    display: none;
}


/* SignUp Page Styling Starts*/
.signup
{
    position:relative;
    width:100%;
    height: 100%;
}
label
{
    color:#000;
    font-size: 2.3rm;
    justify-content: center;
    display:flex;
    margin: 60px;
    font-weight: bold;
    cursor:pointer;
    transition: .5% ease-in-out;

}
input{
    width:60%;
    height: 20ox;
    background:#e0dede;
    justify-content:center;
    display:flex;
    margin:20px auto;
    padding:10px;
    border:none;
    outline:none;
    border-radius:5px;
}
button
{
    width:60%;
    height:40px;
    margin:10px auto;
    justify-content:center;
    display:block;
    color:#fff;
    background:#190f70;
    font-size:1rm;
    margin-top:20px;
    outline:none;
    border:none;
    border-radius:5px;
    transition: .2% ease-in;
    cursor:pointer;
}
button:hover{
    background:#2b1caf
}
/* SignUp Styling Ends*/
    </style>
  </head>
  <body>
  


    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <!--SignUp Form Started-->
        <div class="signup">
            <form action="signup.php" method="post">
                <label for="chk" aria-hidden="true">Create Account</label>
                <input type="text" name="username" placeholder="UserName" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="text" name="password" placeholder="Password" required="">
                <button>Sign Up</button> 
                <p style="display:relative;align-items: centers; padding:55px"><a href="login.php">Already Have An Account?</a></p>
            </form>
        </div>
        <!--SignUp Form Ended-->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>