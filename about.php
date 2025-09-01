<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/project.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <title>About & Contact</title>
  <!--  Correct Font Awesome CDN -->
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

    body {
      background: linear-gradient(135deg, var(--red), var(--blue), var(--white));
      color: var(--black);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .about-container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 30px;
      padding: 50px 20px;
      max-width: 1100px;
      margin: 30px auto;
    }

    .card-box {
      flex: 1;
      background: var(--white);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0px 10px 25px rgba(0,0,0,0.15);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .card-box:hover {
      transform: translateY(-5px);
    }

    .card-box h1, .card-box h2 {
      font-family: "Oswald", sans-serif;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .card-box h1 { color: var(--red); }
    .card-box h2 { color: var(--blue); }

    /* About section */
    .about-bg img {
      height: 200px;
      width: 200px;
      border-radius: 50%;
      border: 5px solid var(--blue);
      object-fit: cover;
      margin-bottom: 20px;
      transition: transform 0.3s ease;
    }
    .about-bg img:hover {
      transform: scale(1.05);
    }
    .about-bg h3 {
      font-size: 1rem;
      color: #555;
      margin-bottom: 8px;
    }


    .contact-section {
      margin-top: 30px;
      border-top: 2px solid #eee;
      padding-top: 20px;
    }

    .contact-section h2 {
      color: var(--red);
      margin-bottom: 15px;
    }

    .contact-item {
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 1.1rem;
      margin: 12px 0;
      justify-content: flex-start;
      color: var(--red);
    }
    .contact-item i {
      font-size: 1.3rem;
      min-width: 30px;
      text-align: center;
    }
    .contact-item a {
      text-decoration: none;
      color: var(--red);
      transition: color 0.3s;
    }
    .contact-item a:hover {
      color: var(--blue);
    }

    footer {
      width: 100%;
      background: var(--black);
      color: var(--white);
      padding: 15px 0;
      text-align: center;
    }

    @media(max-width: 900px){
      .about-container {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="about-container">

    <div class="card-box about-bg">
      <h1>About Us</h1>
      <img src="Images/Rabby.jpg" alt="Owner Image">
      <h2>Md. Rabby Khan</h2>
      <h3>Sena Shoping Complex, Ashuliya, Savar, Dhaka</h3>
      <h3>Phone : +880 1611 135313</h3>


      <div class="contact-section">
        <h2>Contact Information</h2>
        <div class="contact-item">
          <i class="fab fa-facebook"></i>
          <a href="https://facebook.com/themateofblacks" target="_blank">themateofblacks</a>
        </div>
        <div class="contact-item">
          <i class="fab fa-linkedin"></i>
          <a href="https://linkedin.com/in/rabbykhanswe" target="_blank">rabbykhanswe</a>
        </div>
        <div class="contact-item">
          <i class="fas fa-envelope"></i>
          <a href="mailto:rabbykhanswe@gmail.com">rabbykhanswe@gmail.com</a>
        </div>
        <div class="contact-item">
          <i class="fab fa-github"></i>
          <a href="https://github.com/rabbykhanswe" target="_blank">github.com/rabbykhanswe</a>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>
</body>
</html>
