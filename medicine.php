<?php
require_once 'conn.php';

$sq = "SELECT * FROM medicines";
$result = mysqli_query($conn, $sq);

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>Service</title>

    <style>
        /* Basic Reset */
        *{ margin:0; 
            padding:0; 
            box-sizing: 
            border-box; 
        }

        body, html {
            height: 100%;
            font-family: 'Ubuntu', sans-serif;
            background: #f9f9f9;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1; /* Take available vertical space */
            display: flex;
            background-image:url('medicine.jpg');
            background-size: cover;
            background-position: center;
            flex-direction: column;
            align-items: center; /* center horizontally */
            justify-content: flex-start;
            padding: 40px 20px;
        }

        .add-medicine {
            padding: 15px 40px;
            background-color: rgb(78, 140, 197);
            color:white;
            border-radius: 5px;
            border: none;
            font-weight: 800;
            font-size: 18px;
            cursor: pointer;
            margin-bottom: 30px;
            transition: 0.3s;
        }

        .add-medicine:hover {
            background-color: green;
        }

        .medicine-table {
            width: 90%; /* wider table */
            max-width: 1200px; /* limit width */
            border-collapse: collapse;
            margin-bottom: 50px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        .medicine-table th, .medicine-table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .medicine-table th {
            background-color: #4e8cc5;
            color: white;
            font-weight: 500;
        }

        .medicine-table tr:hover {
            background-color: #f1f1f1;
        }

        .delete_button, .update_button {
            padding: 7px 15px;
            border-radius: 5px;
            border: none;
            color: #fff;
            cursor: pointer;
            transition: 0.3s;
        }

        .delete_button {
            background-color: red;
        }
        .delete_button:hover {
            background-color: black;
        }

        .update_button {
            background-color: green;
        }
        .update_button:hover {
            background-color: black;
        }

        /* Footer stick at bottom */
        footer {
            width: 100%;
            background: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        @media (max-width:768px){
            .medicine-table { width: 100%; }
            .add-medicine { width: 80%; }
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>
        
        <main>
            <button class="add-medicine" onclick="location.href='add_medicine.php'">Add Medicine</button><br><br>
            
            <?php
            echo "<table class='medicine-table'>
                    <tr>
                        <th>Name</th>
                        <th>Group</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Expiry Date</th>
                        <th>Actions</th>
                    </tr>";
            while($data = mysqli_fetch_assoc($result)){

    $id = $data['id'];
    $Name = $data['name'];
    $Group = $data['groupe'];
    $Quantity = $data['quantity'];
    $Price = $data['price'];
    $ExpiryDate = $data['expiry_date'];

    echo "<tr>
            <td>$Name</td>
            <td>$Group</td>
            <td>$Quantity</td>
            <td>$Price</td>
            <td>$ExpiryDate</td>
            <td>
                
                <a href='delete_medicine.php?deleteid=$id'  onclick=\"return confirm('Are you sure want to delete $Name Medicine ?')\"><button class='delete_button'>Delete</button></a>
                <a href='update_medicine.php?updateid=$id' ><button class='update_button'>Update</button?</a></td>
        </tr>";
            }
            echo "</table>";

            ?>
        </main>
            
    <?php include 'footer.php'; ?>
</body>
</html>