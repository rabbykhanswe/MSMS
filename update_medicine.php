<?php
require_once 'conn.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM medicines WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

$name = $data['name'];
$group = $data['groupe'];
$quantity = $data['quantity'];
$price = $data['price'];
$expiry_date = $data['expiry_date'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $group = $_POST['group'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $expiry_date = $_POST['expiry_date'];

    $update = "UPDATE medicines SET name='$name', groupe='$group', quantity='$quantity', price='$price', expiry_date='$expiry_date' WHERE id=$id";
    $result = mysqli_query($conn, $update);

    if($result){
        header('location:medicine.php');
    } else{
        echo "Medicine Update Error, Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Medicine</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700&display=swap" rel="stylesheet">

<style>
:root {
    --blue: rgb(78, 140, 197);
    --green: rgb(28, 167, 69);
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
    background-image: url("log.jpg");
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

form {
    background-color: rgba(78,140,197,0.85); /* same blue variable */
    padding: 40px 30px;
    border-radius: 15px;
    width: 100%;
    max-width: 450px;
    text-align: center;
    color: var(--white);
}

form h1 {
    font-family: 'Oswald', sans-serif;
    font-size: 2rem;
    margin-bottom: 15px;
}

form p {
    margin-bottom: 25px;
}

label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: none;
    outline: none;
    font-size: 1rem;
    color: var(--black);
}

input:focus {
    border: 2px solid var(--blue);
}

.update-medicine {
    width: 100%;
    padding: 15px;
    background-color: var(--blue);
    border: none;
    border-radius: 10px;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    color: var(--white);
}

.update-medicine:hover {
    background-color: var(--green);
}

@media(max-width:500px){
    form {
        padding: 30px 20px;
    }

    form h1 {
        font-size: 1.8rem;
    }
}
</style>
</head>
<body>

<?php include 'navbar.php'; ?>

<main id="medicine-bg">
    <form method="post" action="">
        <h1>Update Medicine</h1>
        <p>Manage your medicine inventory efficiently.</p>

        <label for="medicine-name">Medicine Name</label>
        <input type="text" id="medicine-name" name="name" required value="<?php echo $name ?>">

        <label for="group">Group</label>
        <input type="text" id="group" name="group" required value="<?php echo $group ?>">

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" required value="<?php echo $quantity ?>">

        <label for="price">Price</label>
        <input type="number" id="price" name="price" required value="<?php echo $price ?>">

        <label for="expiry-date">Expiry Date</label>
        <input type="date" id="expiry-date" name="expiry_date" required value="<?php echo $expiry_date ?>">

        <button type="submit" class="update-medicine" name="submit">Update Medicine</button>
    </form>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
