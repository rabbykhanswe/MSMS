<?php
require_once 'conn.php';


$loginFailed = false;

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        
        header("Location: home.php");
        exit();
        
    } else {
        $loginFailed = true;
        // echo "<div class='login-failure'>Invalid username or password. Please try again.</div>";
    }   
}


?>

<?php

if(basename($_SERVER['PHP_SELF'])==='index.php'){
    ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="CSS/project.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>Log In</title>
    <style>
        :root{
    --red: rgb(185, 37, 37);
    --blue: rgb(78, 140, 197);
    --black: black;
    --white: white;
}

*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: "Ubuntu", sans-serif;
}

header img{
    height: 200px;
    width: auto;
    display: block;
    align-items: center;
    justify-items: center;
    justify-content: center;
    margin:0 auto;

}


header img:hover{
    height: 190px;
    width: auto;
    transition: 0.3s;
}
.login{
    background-image: url("bg4.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    height: 935px;
    width: auto;
        }

#font-a{
    color: var(--black);
}

.form2{
    margin-top: 20px;
    margin: 0 auto;
    background-color: transparent;
    backdrop-filter: blur(10px);
    height: 500px;
    max-width: 600px;
    border-radius: 10px;
    padding: 10px;
}

.form2 form{
    margin-top: 50px;
    margin-bottom: 20px;
}

.form2 h1{
    margin-top: 30px;
    text-align: center;
    color: var(--red);
    font-size: 35px;
    background-color: var(--blue);

}

input{
    height: 30px;
    width: 60%;
    background-color: transparent;
    border: 2px solid var(--black);
    border-radius: 5px;
    display: flex;
    margin: 0 auto;
    font-size: 18px;
}

.form2 p{
    color: var(--white);
    text-align: center;
    margin-top: 40px;
    font-size: 20px;
}

.form2 p a{
    margin-top: 20px; ;
    padding: 10px;
    text-decoration: none;
    color: var(--blue);
}

.form2 p a:hover{
    text-decoration:underline;
    color: var(--red);
    transition: 0.3s;
}

#notification {
  position: fixed;
  top: 20px;
  right: 20px;
  background-color: #f44336;
  color: white;
  padding: 15px 20px;
  border-radius: 5px;
  font-family: 'Ubuntu', sans-serif;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  z-index: 1000;
  transition: opacity 0.5s ease;
}

.hidden {
  opacity: 0;
  pointer-events: none;
}

label{
    color: var(--black);
    font-size: 20px;
    font-weight: 500;
    margin-left: 117px;
    
}

input:focus{
    height: 35px;
    width: 70%;
    background-color: var(--blue);
    border: 2px solid var(--red);
    border-radius: 5px;
    transition: 0.4s;
}

.submit{
    display: flex;
    justify-content: center;
    padding: 2px;
    margin: 0 auto;
    height: 45px;
    width: 150px;
    border-radius: 10px;
    font-size: 30px;
    font-weight: 600;
    background-color: var(--blue);

}

.submit:hover{
    background-color: var(--red);
    color: var(--white);
    transition: 0.3s;
}

    </style>
</head>
<body>
        
        <div class="login">

            <header>
            <a href="#"><img src="logo.png" alt="Logo"></a>
        </header>


            <main class="form2">

            <h1>Log In Form</h1>

            <form method="post" action="" >

                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" placeholder="Enter Your username" required><br><br>

                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" placeholder="Enter Your password" required><br><br>


                <button type="submit" class="submit" id="submit" value="login">Log In</button>

                <?php if ($loginFailed): ?>
                <div id="notification" class="hidden">❌ Invalid username or password!</div>
                <script src="JS/project.js"></script>
                <script>showNotification();</script>
            <?php endif; ?>

                <p id="font-a">Don't have an account | <a href="register.php">Create New</a> </p>



            </form>
        </main>
        </div>
        

        <?php include 'footer.php'; ?>
    
</body>
</html>

<?php
}
?>




