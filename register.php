<?php
require_once 'conn.php';

if(isset($_POST['fname']) && isset($_POST['lname']) && 
    isset($_POST['Bdate']) && isset($_POST['nid']) && 
    isset($_POST['username']) && isset($_POST['password']) && 
    isset($_POST['confirmpassword'])) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname']; 
        $email = $_POST['email'];
        $Bdate = $_POST['Bdate'];
        $nid = $_POST['nid'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        $checkemail = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $checkemail);
            if(mysqli_num_rows($result) > 0) {
                echo "<div class='regsuc'>Email already exists. Please use a different email.</div>";
                exit;
        }

        $checknid = "SELECT * FROM users WHERE nid='$nid'";
        $result2 = mysqli_query($conn, $checknid);
            if(mysqli_num_rows($result2) > 0) {
                echo "<div class='regsuc'>NID already used. Please use a different NID.</div>";
                exit;
        }

        $checkusername = "SELECT * FROM users WHERE username='$username'";
        $result3 = mysqli_query($conn, $checkusername);
            if(mysqli_num_rows($result3) > 0) {
                echo "<div class='regsuc'>NID already used. Please use a different NID.</div>";
                exit;
        }



        if($password < 7) {
            echo "<div class='regsuc'>Passwords is short. Please try again.</div>";
            exit;
        }

        

        if($password !== $confirmpassword) {
            echo "<div class='regsuc'>Passwords do not match. Please try again.</div>";
            exit;
        }
        else{
            $confirmpassword = $password;
            $stq = "insert into users (first_name, last_name,  email, birth_date, nid, username, password) values ('$fname', '$lname', '$email', '$Bdate', '$nid', '$username', '$password')";

        if(mysqli_query($conn, $stq)) {
            include 'index.php';
        } else {
            echo "Error: " . $conn->error;
        }
        }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>Registration</title>
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

.registration{
    background-image: url("1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
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

.form{
    margin-top: 20px;
    margin: 0 auto;
    background-color: transparent;
    backdrop-filter: blur(10px);
    height: auto;
    max-width: 600px;
    border-radius: 10px;
    padding: 10px;
}

.form form{
    margin-top: 50px;
    margin-bottom: 20px;
}

.form h1{
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

.form p{
    color: var(--white);
    text-align: center;
    margin-top: 40px;
    font-size: 20px;
}

.form p a{
    margin-top: 20px; ;
    padding: 10px;
    text-decoration: none;
    color: var(--blue);
}

.form p a:hover{
    text-decoration:underline;
    color: var(--red);
    transition: 0.3s;
}

.regsuc{
    margin-top: 20px;
    margin: 0 auto;
    background-color: transparent;
    backdrop-filter: blur(10px);
    height: 500px;
    max-width: 600px;
    border-radius: 10px;
    padding: 10px;
}

    </style>
</head>
<body>
        
        <div class="registration">

            <header>
            <a href="#"><img src="logo.png" alt="Logo"></a>
        </header>


            <main class="form">

            <h1>Registration Form</h1>

            <form method="post" action="" >

                <label for="fname">First Name</label><br>
                <input type="text" id="fname" name="fname" placeholder="Enter Your First Name" required><br><br>

                <label for="lname">Last Name</label><br>
                <input type="text" id="lname" name="lname" placeholder="Enter Your Last Name" required><br><br>

                <label for="email">E - mail</label><br>
                <input type="email" id="email" name="email" placeholder="Enter Your E-mail" required><br><br>

                <label for="Bdate">Date of Birth</label><br>
                <input type="date" id="Bdate" name="Bdate" required><br><br>

                <label for="nid">NID Number</label><br>
                <input type="number" id="nid" name="nid" placeholder="Enter Your NID Number" required><br><br>

                <label for="username">Username</label><br>
                <input type="username" id="username" name="username" placeholder="Setup Your username" required><br><br>

                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" placeholder="Setup Your password" required><br><br>

                <label for="confirmpassword">Confirm Password</label><br>
                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Re-enter Your password" required><br><br>

                <button type="submit" class="submit" id="submit" value="submit">Submit</button>

                <p>Already have an account | <a href="index.php">Log In Here</a> </p>



            </form>
        </main>
        </div>

       <?php include 'footer.php'; ?>
        
    
</body>
</html>