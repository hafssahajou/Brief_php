 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" class="css">
    <title>Document</title>
    <style>
        /* Ajoutez vos styles CSS ici */
        body {
            display: flex;
            background-color: #4a5568;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .menu {
            display: flex;
            justify-content: center;
            position: absolute;
            border-radius: 20px 20px 0 0;
            background-color: #4a5568;
            top: 10px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: calc(100% - 40px);
            margin: 0 auto;
        }
        .menu ul {
            display: flex;
            gap: 16px;
            list-style-type: none;
            margin: 0;
            padding: 8px;
        }
        .menu li {
            background-color: transparent;
            border-radius: 20px;
            padding: 6px 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .menu li:hover {
            background-color: #2d3748;
        }
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
        }
        table th, table td {
            border: 2px solid #ffffff;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
        }
        table th {
            background-color: #4a5568;
            color: #ffffff;
        }
        table td {
            background-color: #2d3748;
            color: #ffffff;
        }
        table td button {
            font-weight: bold;
            color: black;
            background-color: #68d391;
            border: 2px solid #4299e1;
            box-shadow: 2px 2px #4299e1;
            padding: 6px 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        table td button:hover {
            background-color: #4299e1;
            color: white;
        }
    </style>
</head>
<body>


<div class="menu">
    <ul>
        <li><a href="client.php">CLIENTS</a></li>
        <li><a href="allcompte.php">COMPTES</a></li>
        <li><a href="transaction.php">TRANSACTIONS</a></li>
    </ul>
</div>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB_name ="DB_MYBREIF";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $DB_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "INSERT INTO transactions (ID, Amount, Types, Account_ID) VALUES 
// ('', '15486.75','debit',4),
//  ('', '15486.75','debit' ,5),
//  ('', '15486.75','debit' ,6),
// ('', '15486.75','debit' ,5),
//  ('', '15486.75','debit' ,4);";

// if ($conn->query($sql) === TRUE) {
//     // echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

?>

<table class="w-4/5 mx-auto mt-10 text-white shadow-lg">
    <tr class="italic h-10 border-4 border-white-600 bg-gray-600">
        <th>ID</th>
        <th>Amount</th>
        <th>Types</th>
        <th>Account_ID</th>
    </tr>
  
    <?php
    $sql = "SELECT ID, Amount, Types , Account_ID FROM transactions";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>"; // Opening table row tag
            echo "<td class='border-4 border-white-600'>" . $row["ID"]. "</td>";
            echo "<td class='border-4 border-white-600'>" . $row["Amount"]. "</td>";
            echo "<td class='border-4 border-white-600'>" . $row["Types"]. "</td>";
            echo "<td class='border-4 border-white-600'>" . $row["Account_ID"]. "</td>";
            echo "</tr>"; // Closing table row tag
        }
    } else {
        echo "<tr><td colspan='4'>No results found</td></tr>";
    }

    $conn->close();
    ?>
</table>
