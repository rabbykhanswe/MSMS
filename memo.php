<?php
require_once 'conn.php';

if (isset($_POST['save_memo'])) {
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $total_amount = $_POST['total_amount'];
    $items = json_decode($_POST['items'], true);


    $sql = "INSERT INTO memos (customer_name, customer_phone, total_amount) 
            VALUES ('$customer_name', '$customer_phone', '$total_amount')";
    mysqli_query($conn, $sql);
    $memo_id = mysqli_insert_id($conn);


    foreach ($items as $item) {
        $medicine_id = $item['id'];
        $qty = $item['qty'];
        $price = $item['price'];
        $subtotal = $item['subtotal'];

        mysqli_query($conn, "INSERT INTO memo_items (memo_id, medicine_id, quantity, price, subtotal)
                             VALUES ('$memo_id', '$medicine_id', '$qty', '$price', '$subtotal')");


        mysqli_query($conn, "UPDATE medicines SET quantity = quantity - $qty WHERE id = $medicine_id");
    }

    echo "<script>alert('Memo saved successfully!'); window.location='home.php';</script>";
    exit;
}


$medicines = mysqli_query($conn, "SELECT * FROM medicines WHERE quantity > 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate Memo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap">
    <style>
        * { font-family: 'Ubuntu', sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
        .container{background-image:url('memo.avif');background-size: cover;background-position: center;width: 100%;height: 80vh;}
        :root{--red: rgb(185, 37, 37);--blue: rgb(78, 140, 197);--black: black;--white: white;}
        h1 {;argin-top:30px;margin-bottom:20px;text-align: center; margin-bottom: 20px; color: #333; }
        #select{outline:solid 2px var(--blue);justify-content:center;text-align: center; margin-top:30px; margin-bottom: 20px;}
        .input-group { display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-bottom: 20px; }
        .input-group input { padding: 10px; width: 250px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; }
        #search { width: 60%; padding: 10px; margin: 0 auto 15px; display: block; border-radius: 5px; border: 1px solid #ccc; font-size: 16px; }
        .medicine-list { border: 1px solid #ddd; max-height: 200px; overflow-y: auto; background: #fff; border-radius: 5px; width: 60%; margin: 0 auto; }
        .medicine-item { padding: 10px; cursor: pointer; border-bottom: 1px solid #eee; transition: background 0.2s; }
        .medicine-item:hover { background-color: #f0f8ff; }
        .bill-table { width: 80%; margin: 20px auto; border-collapse: collapse; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .bill-table th, .bill-table td { border: 1px solid #ddd; padding: 10px; text-align: center; font-size: 16px; }
        .bill-table th { background-color: #4e8cc5; color: white; }
        .bill-table tr:nth-child(even) { background-color: #f2f2f2; }
        .bill-table tr:hover { background-color: #e6f7ff; }
        .total-box { width: 80%; margin: 10px auto; font-size: 20px; font-weight: bold; text-align: right; color: #333; }
        .history a{text-decoration:none;color:white;}
        .save-btn { display: block; padding: 12px 30px; margin: 20px auto; font-size: 16px; font-weight: 500; color: #fff; background-color: #4e8cc5; border: none; border-radius: 5px; cursor: pointer; transition: 0.3s; }
        .history { display: block; padding: 12px 30px; margin: 20px auto; font-size: 16px; font-weight: 500; color: #fff; background-color: #4e8cc5; border: none; border-radius: 5px; cursor: pointer; transition: 0.3s; }
        .save-btn:hover { background-color: #3a6ea5; }
        @media (max-width: 768px) {
            #search { width: 90%; }
            .medicine-list { width: 90%; }
            .input-group input { width: 90%; }
            .bill-table { width: 95%; }
            .total-box { width: 95%; }
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

<div class="container">
    <h1>Generate Memo</h1>



<div class="input-group">
    <input type="text" id="customer_name" placeholder="Customer Name">
    <input type="text" id="customer_phone" placeholder="Customer Phone">
</div>

<input type="text" id="search" placeholder="Search medicine...">

<p id="select">Please Select Medicine & Add into Memo</p>

<div class="medicine-list" id="medicineList">
    
    <?php while($m = mysqli_fetch_assoc($medicines)) { ?>
        <div class="medicine-item" 
             data-id="<?= $m['id'] ?>" 
             data-name="<?= $m['name'] ?>" 
             data-price="<?= $m['price'] ?>" 
             data-stock="<?= $m['quantity'] ?>">
            <?= $m['name'] ?> (<?= $m['groupe'] ?>) - ৳<?= $m['price'] ?> | Stock: <?= $m['quantity'] ?>
        </div>
    <?php } ?>
</div>

<form method="POST" id="memoForm">
    <input type="hidden" name="customer_name" id="form_customer_name">
    <input type="hidden" name="customer_phone" id="form_customer_phone">
    <input type="hidden" name="total_amount" id="form_total_amount">
    <input type="hidden" name="items" id="form_items">

    <table class="bill-table" id="billTable">
        <thead>
            <tr>
                <th>Medicine</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <div class="total-box">Total: ৳<span id="totalAmount">0</span></div>

    <button type="submit" name="save_memo" class="save-btn">Save Memo</button>


     <button type="submit" class="history"><a href="memo_history.php">Memo History</a></button>
</form>

<script>
let bill = [];

document.getElementById("search").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    document.querySelectorAll(".medicine-item").forEach(item => {
        item.style.display = item.innerText.toLowerCase().includes(filter) ? "" : "none";
    });
});

document.querySelectorAll(".medicine-item").forEach(item => {
    item.addEventListener("click", function() {
        let id = this.dataset.id;
        let name = this.dataset.name;
        let price = parseFloat(this.dataset.price);
        let stock = parseInt(this.dataset.stock);

        let qty = prompt(`Enter quantity for ${name} (Available: ${stock}):`);
        qty = parseInt(qty);
        if (!qty || qty <= 0 || qty > stock) { alert("Invalid quantity!"); return; }

        let found = false;
        for (let i = 0; i < bill.length; i++) {
            if (bill[i].id == id) {
                bill[i].qty += qty;
                bill[i].subtotal = bill[i].qty * price;
                found = true;
                break;
            }
        }
        if (!found) {
            bill.push({id, name, price, qty, subtotal: price*qty});
        }
        renderBill();
    });
});

function renderBill() {
    let tbody = document.querySelector("#billTable tbody");
    tbody.innerHTML = "";
    let total = 0;
    bill.forEach(item => {
        total += item.subtotal;
        tbody.innerHTML += `<tr>
            <td>${item.name}</td>
            <td>${item.price}</td>
            <td>${item.qty}</td>
            <td>${item.subtotal}</td>
        </tr>`;
    });
    document.getElementById("totalAmount").innerText = total;
    document.getElementById("form_total_amount").value = total;
    document.getElementById("form_customer_name").value = document.getElementById("customer_name").value;
    document.getElementById("form_customer_phone").value = document.getElementById("customer_phone").value;
    document.getElementById("form_items").value = JSON.stringify(bill);
}
</script>

<?php include 'footer.php'; ?>

</div>
</body>
</html>
