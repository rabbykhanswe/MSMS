<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/project.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --red: rgb(185, 37, 37);
            --blue: rgb(78, 140, 197);
            --black: #333;
            --white: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Ubuntu", sans-serif;
        }

        body, html {
            height: 100%;
        }

        #home-bg {
            background-image: url("bg3.jpg");
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--white);
            text-align: center;
            position: relative;
        }

        #home-bg::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 0;
        }

        .home-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            padding: 20px;
        }

        .home-content h1 {
            font-family: "Oswald", sans-serif;
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
        }

        .home-content p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 6px rgba(0,0,0,0.7);
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .feature-box {
            background: linear-gradient(135deg, #4e8cc5, #78a1d1);
            padding: 25px 30px;
            border-radius: 15px;
            transition: 0.4s;
            width: 220px;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.2);
            color: #fff;
        }

        .feature-box i {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .feature-box h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .feature-box p {
            font-size: 1rem;
        }

        .feature-box:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0px 12px 25px rgba(0,0,0,0.4);
        }

        @media(max-width:768px){
            .home-content h1 { font-size: 2.5rem; }
            .home-content p { font-size: 1.2rem; }
            .features { gap: 20px; }
            .feature-box { width: 180px; padding: 20px; }
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<main id="home-bg">
    <div class="home-content">
        <h1>Welcome to MSMS</h1>
        <p>Smart, fast, and reliable medicine management system for your shop and customers.</p>

        <div class="features">
            <div class="feature-box">
                <i class="fas fa-pills"></i>
                <h3>Medicines</h3>
                <p>Keep track of all medicine stocks efficiently.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-notes-medical"></i>
                <h3>Prescriptions</h3>
                <p>Generate and view prescriptions instantly.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-bolt"></i>
                <h3>Instant Billing</h3>
                <p>Quick billing and full memo generation in seconds.</p>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>    

</body>
</html>
