<?php
require_once 'conn.php';

$search_phone = "";
if (isset($_POST['search'])) {
    $search_phone = trim($_POST['search_phone']);
    if($search_phone != "") {
        $memos = mysqli_query($conn, "SELECT * FROM memos WHERE customer_phone LIKE '%$search_phone%' ORDER BY created_at DESC");
    } else {
        $memos = mysqli_query($conn, "SELECT * FROM memos ORDER BY created_at DESC");
    }
} else {
    $memos = mysqli_query($conn, "SELECT * FROM memos ORDER BY created_at DESC");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Memo History</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap">
    <style>
        * { font-family: 'Ubuntu', sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
        .container{background-image:url('history.jpg');background-size: cover;background-position: center;}
        h2 { text-align: center; margin-bottom: 20px; color: #333; }
        .search-box { text-align: center; margin-bottom: 20px; }
        .search-box input { padding: 10px; width: 250px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; }
        .search-box button { padding: 10px 20px; background: #4e8cc5; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .search-box button:hover { background-color: #3a6ea5; }
        .memo { background: #fff; border-radius: 8px; padding: 20px; margin: 20px auto; width: 80%; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .memo p { margin: 5px 0; font-size: 16px; color: #333; }
        .bill-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        .bill-table th, .bill-table td { border: 1px solid #ddd; padding: 10px; text-align: center; font-size: 16px; }
        .bill-table th { background-color: #4e8cc5; color: white; }
        .bill-table tr:nth-child(even) { background-color: #f2f2f2; }
        .bill-table tr:hover { background-color: #e6f7ff; }
        .total-box { text-align: right; font-weight: bold; margin-top: 10px; font-size: 18px; color: #333; }
        @media (max-width: 768px) {
            .search-box input { width: 90%; margin-bottom: 10px; }
            .memo { width: 95%; }
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>Memo History</h2>

<div class="search-box">
    <form method="POST">
        <input type="text" name="search_phone" placeholder="Enter customer phone (leave empty for all)" value="<?= htmlspecialchars($search_phone); ?>">
        <button type="submit" name="search">Search</button>
    </form>
</div>

<?php
if ($memos && mysqli_num_rows($memos) > 0) {
    while ($memo = mysqli_fetch_assoc($memos)) {
        echo "<div class='memo'>";
        echo "<p><b>Customer:</b> ".htmlspecialchars($memo['customer_name'])." (".htmlspecialchars($memo['customer_phone']).")</p>";
        echo "<p><b>Date:</b> {$memo['created_at']}</p>";
        echo "<table class='bill-table'>
                <tr><th>Medicine</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";

        $memo_id = $memo['id'];
        $items = mysqli_query($conn, "SELECT m.name, i.price, i.quantity, i.subtotal 
                                      FROM memo_items i 
                                      JOIN medicines m ON i.medicine_id = m.id 
                                      WHERE i.memo_id = $memo_id");
        while ($item = mysqli_fetch_assoc($items)) {
            echo "<tr>
                    <td>".htmlspecialchars($item['name'])."</td>
                    <td>".number_format($item['price'],2)."</td>
                    <td>".htmlspecialchars($item['quantity'])."</td>
                    <td>".number_format($item['subtotal'],2)."</td>
                  </tr>";
        }
        echo "</table>";
        echo "<div class='total-box'>Total: ৳".number_format($memo['total_amount'],2)."</div>";
        echo "</div>";
    }
} else {
    echo "<p style='text-align:center; font-size:16px;'>No memos found.</p>";
}
?>

<?php include 'footer.php'; ?>

    </div>

</body>
</html>
