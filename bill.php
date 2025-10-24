<?php
// Define available items and prices (can be fetched from a database)
$items = [
    'select your item' => 0,
    'youghurt' => 56,
    'drinking youghurt' => 136,
    'toffeet' => 600
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chello Yogurts - Bill Generator</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f8ff;
            padding: 20px;
            color: #003366;
            text-align: center;
        }
        .bill-container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 51, 102, 0.2);
        }
        .bill-header h1 {
            color: #0056b3;
        }
        .bill-header p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }
        .form-group {
            margin: 10px 0;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }
        .form-group select, 
        .form-group input {
            width: 30%;
            margin: 5px;
            padding: 8px;
            border: 1px solid #cce0ff;
            border-radius: 5px;
        }
        button {
            background-color: #0056b3;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #cce0ff;
            text-align: center;
        }
        table th {
            background-color: #0056b3;
            color: white;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="bill-container">
    <div class="bill-header">
        <h1>Chello Yogurts</h1>
        <p><?php echo date('Y-m-d H:i:s'); ?></p>
    </div>

    <!-- ITEM SELECTION FORM -->
    <div class="form-group">
        <label for="item">Item</label>
        <select id="item" onchange="priceSelect()">
            <?php foreach ($items as $name => $price) : ?>
                <option value="<?php echo $price; ?>"><?php echo $name; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" placeholder="Quantity" min="1" value="1">
        <label for="unitPrice">Price</label>
        <input type="number" id="unitPrice" placeholder="Price" min="0" value="0">
        <label for="discount">Discount</label>
        <input type="number" id="discount" placeholder="Discount (%)" min="0" value="0">
    </div>
    <button onclick="addToBill()">Add to Bill</button>

    <!-- BILL TABLE -->
    <table id="billTable">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Discount (%)</th>
                <th>Full Price (Rs)</th>
                <th>Total (Rs)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="total">
        Grand Total: Rs <span id="grandTotal">0.00</span>
    </div>
    
</div>
<button onclick="window.location.href='Dashboard.html'">
    <span class="icon">
        <ion-icon name="arrow-back-sharp"></ion-icon>
    </span>
    <span class="title">Back to Dashboard</span>
</button>

<script>
    let grandTotal = 0;

    function priceSelect(){
        let itemSelect = document.getElementById("item");
        let itemPrice = 0;
        if (itemSelect.value == 56) {
            itemPrice = 56;
        } else if (itemSelect.value == 136) {
            itemPrice = 136;
        } else if (itemSelect.value == 600) {
            itemPrice = 600;
        } else {
            alert("Invalid item selected");
            return;
        }
        document.getElementById("unitPrice").value = itemPrice;
    }

    function addToBill() {
        let itemSelect = document.getElementById("item");
        console.log(itemSelect.value); 
        let itemName = itemSelect.options[itemSelect.selectedIndex].text;
        //let itemPrice = parseFloat(itemSelect.value);
        //let itemPrice = parseInt(document.getElementById("unitPrice").value);
        let itemPrice = 0;
        if (itemSelect.value == 56) {
            itemPrice = 56;
        } else if (itemSelect.value == 136) {
            itemPrice = 136;
        } else if (itemSelect.value == 600) {
            itemPrice = 600;
        } else {
            alert("Invalid item selected");
            return;
        }
        //console.log(itemPrice);

        //set unitPrice value to itemPrice
        document.getElementById("unitPrice").value = itemPrice;

        let quantity = parseInt(document.getElementById("quantity").value);
        let discount = parseFloat(document.getElementById("discount").value);
        
        if (quantity <= 0) {
            alert("Quantity must be at least 1");
            return;
        }

        let fullPrice = itemPrice * quantity;
        let totalPrice = fullPrice * (1 - discount / 100);

        // Add row to table
        let table = document.getElementById("billTable").getElementsByTagName("tbody")[0];
        let newRow = table.insertRow();
        newRow.innerHTML = `
            <td>${itemName}</td>
            <td>${quantity}</td>
            <td>${discount}%</td>
            <td>${fullPrice.toFixed(2)}</td>
            <td class="totalAmount">${totalPrice.toFixed(2)}</td>
            <td><button onclick="removeRow(this, ${totalPrice})">X</button></td>
        `;

        // Update Grand Total
        grandTotal += totalPrice;
        document.getElementById("grandTotal").innerText = grandTotal.toFixed(2);

        document.getElementById("quantity").value = 1;
        document.getElementById("discount").value = 0;
    }

    function removeRow(btn, amount) {
        let row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
        grandTotal -= amount;
        document.getElementById("grandTotal").innerText = grandTotal.toFixed(2);
    }
</script>

</body>
</html>
