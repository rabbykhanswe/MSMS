<?php
require_once 'conn.php';

if(isset($_POST['medicine-name']) && isset($_POST['group']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['expiry-date'])) {

    $medicineName = $_POST['medicine-name'];
    $group = $_POST['group'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $expiryDate = $_POST['expiry-date'];


    $amq = "INSERT INTO medicines (name, groupe, quantity, price, expiry_date) VALUES ('$medicineName', '$group', '$quantity', '$price', '$expiryDate')";
    $result = mysqli_query($conn, $amq);

    if($result) {
        header("Location: medicine.php");
    } else {
        echo "<div class='error'>Error adding medicine: " . mysqli_error($conn) . "</div>";
    }
}   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue: #4e8cc5;
            --green: #28a745;
            --white: #fff;
            --black: #333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Ubuntu', sans-serif;
        }

        body, html {
            height: 100%;
            width: 100%;
        }

        #medicine-bg {
            background-image: url("5.png");
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Overlay for better readability */
        #medicine-bg::before {
            content: "";
            position: absolute;
            top:0; left:0;
            width:100%; height:100%;
            background-color: rgba(0,0,0,0.5);
            z-index:0;
        }

        form {
            position: relative;
            z-index: 1;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            padding: 40px 50px;
            border-radius: 15px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            text-align: center;
            color: var(--white);
        }

        form h1 {
            font-family: 'Oswald', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        form p {
            font-size: 1rem;
            margin-bottom: 25px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: 500;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 1rem;
        }

        input:focus {
            border: 2px solid var(--blue);
        }

        .add-medicine {
            width: 100%;
            padding: 15px;
            background-color: var(--blue);
            border: none;
            border-radius: 10px;
            color: var(--white);
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .add-medicine:hover {
            background-color: var(--green);
            transform: scale(1.05);
        }

        @media(max-width:500px){
            form {
                padding: 30px 20px;
            }

            form h1 {
                font-size: 2rem;
            }
        }

    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<main id="medicine-bg">
    <form method="post" action="">
        <h1>Medicine Management</h1>
        <p>Manage your medicine inventory efficiently</p>

        <label for="medicine-name">Medicine Name</label>
        <input type="text" id="medicine-name" name="medicine-name" placeholder="Enter Medicine Name" required>

        <label for="group">Group</label>
        <input type="text" id="group" name="group" placeholder="Enter Medicine Group" required>

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" required>

        <label for="price">Price</label>
        <input type="number" id="price" name="price" placeholder="Enter Price" required>

        <label for="expiry-date">Expiry Date</label>
        <input type="date" id="expiry-date" name="expiry-date" required>

        <button type="submit" class="add-medicine">Add Medicine</button>
    </form>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
