<?php 
    include_once 'dbOperations/dbConnection.php';
    date_default_timezone_set('Asia/Colombo');
    //$date = date("Y-m-d");
    $date = date('Y-m-d', strtotime('-1 day'));
    //echo $date;
    $query = "SELECT Item, Final_Stock FROM stock_tbl WHERE Date = '$date'";
    $result = mysqli_query($connectons, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <script src="navigation.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        /* CHANGED: Added background image with overlay gradient */
        body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(to right, #6b77ff, #eae6de);
    }
        
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .navigation {
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
        }
        
        .navigation ul {
            list-style-type: none;
        }
        
        /* CHANGED: Styled the Back to Dashboard button */
        .navigation button {
            background-color: #3366cc; /* Changed to blue */
            color: white; /* Changed text to white */
            border: none;
            padding: 12px 20px; /* Made button slightly larger */
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            font-size: 14px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); /* Enhanced shadow */
            transition: all 0.3s ease; /* Added transition effect */
        }
        
        .navigation button:hover {
            background-color: #254e9e; /* Darker blue on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }
        
        .icon {
            margin-right: 10px;
        }
        
        .main {
            background-color: #e6f7ff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        
        h1 {
            color: #2a5298;
            margin-bottom: 25px;
            text-align: center;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        min-width: 300px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }
    table th,
    table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }
    table tbody tr:hover {
        background-color: #f1f1f1;
    }
        
        form {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 15px;
            align-items: center;
        }
        
        label {
            color: #2a5298;
            font-weight: 500;
        }
        
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        
        input:focus {
            outline: none;
            border-color: #feca57;
        }
        input[type="submit"] {
            grid-column: 1 / span 2;
            background-color: #3366cc;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            padding: 12px;
            transition: all 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #254e9e;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
   
    <div class="container">
    
        <div class="main">
            <h1>Stock</h1>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Stock</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['Item']; ?></td>
                    <td><?php echo $row['Final_Stock']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
       
            <div class="navigation">
                <ul>
                    <li>
                        <button onclick="navigateTo('Dashboard')">
                            <span class="icon">
                                <ion-icon name="arrow-back-sharp"></ion-icon>
                            </span>
                            <span class="title">Back to Dashboard</span>
                        </button>
                    </li>
                </ul>
            </div>
    
        
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>