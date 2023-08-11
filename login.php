<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php'; // Include the database connection
    
    $login = false;

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password securely

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $login = true;
        } else {
            $showError = "Invalid Credentials";
        }
    } else {
        $showError = "Invalid Credentials";
    }
    if   ($showAlert)
    {
        echo '<script>alert("You Can Now Logged In")</script>';
        header('Location: index.html?success=1');//Redirect To The Login Page
    }
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
        Importing Google Font APIs So As To Give Styling To The Fonts
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@1,500&display=swap" rel="stylesheet">

    <title>Login Form</title>
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
.login
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

    <?php
    if   ($login)
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!!!!!</strong> Ypu Are Logged In.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    }
    ?>


    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <!--Login Form Started-->
        <div class="login">
            <form action="/harshida/login.php" method="post">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="text" name="password" placeholder="Password" required="">
                <button>login</button> 
                <p style="display:relative;align-items: centers; padding:60px"><a href="./signup.php">Don't have an Account?</a></p>
            </form>
        </div>
        <!--Login Form Ended-->
    </div>
</body>
</html>