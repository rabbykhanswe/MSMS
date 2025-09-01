
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <style>

        @media (max-width:1160px ){
        .nav {
        height: 100%;
        width: 100%;
        background-color: var(--black);
        padding: 8px;
        margin-top: 20px;
        display: flex;
        justify-content: stretch;

    }


    }

    @media (max-width:1059px){
        .logo-img{
        margin-top:10px;
    }
}
        @media (max-width:1022px){
        .logo-img{
        margin-top:12px;
    }
}
    @media (max-width:775px){
        .logo-img{
        margin-top:20px;
    }
}

@media (max-width:625px){
        .logo-img{
        margin-top:35px;
    }
}

@media (max-width:605px){
        .logo-img{
        margin-top:45px;
    }
}
@media (max-width:582px){
        .logo-img{
        margin-top:60px;
    }
}


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

nav {
    height: 42px;
    width: 100%;
    background-color: var(--black);
    padding: 8px;
    margin-top: 20px;
    display: flex;
    justify-content: space-between;

}

nav ul li{
    margin: 0px 10px;
    float: left;
    color: var(--white);
    font-size: 20px;
    font-weight: 700;
    list-style-type: none;

}

nav ul li a{
    text-decoration: none;
    margin: 0px 20px;
    float: left;
    color: var(--white);
    font-size: 20px;
    font-weight: 700;

}

nav ul li a:hover{
    color: var(--red);
    cursor: pointer;
    width: auto;
    transition: 0.3s;
    
}





    </style>
</head>
<body>

<header>
            <a href="home.php"><img src="logo.png" alt="Logo"></a>
        </header>

        <nav class="nav">
            <a href="home.php"><img class="logo-img" src="Logo2.png" alt="logo"></a>
            <ul>
                <li><a href="home.php" >Home</a></li> 
                <li><a href="memo.php">Memo</a></li>
                <li><a href="medicine.php" >Medicine</a></li>
                <!-- <li><a href="service.php"  >Service</a></li> -->
                <li><a href="about.php" >About</a></li>
                <li><a href="index.php">Log Out</a></li>
            </ul>
            
        </nav>

    
</body>
</html>