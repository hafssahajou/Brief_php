<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body  class="flex bg-gray-600 h-[100vh] items-center justify-center">
<div class="menu">
    <ul>
        <li><a href="client.php">CLIENTS</a></li>
        <li><a href="allcompte.php">COMPTES</a></li>
        <li><a href="transaction.php">TRANSACTIONS</a></li>
    </ul>
</div>
<style>
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
<?php

$servername = "localhost";
$username = "root";
$password = "";
$DB_name ="DB_MYBREIF";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $DB_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/*echo "Connected successfully";*/


?>



    <table class="w-4/5 mx-auto mt-10 text-white shadow-lg">
    <tr class="italic h-10 border-4 border-white-600 bg-gray-600">
    <th>ID</th>
    <th>BALANCE</th>
    <th>DEVISE</th>
    <th class='w-72'>RIP</th>*
    <th>clientid</th>
    
  </tr>

  
  <?php
  if(isset($_GET['id'])) {
    // Get the client ID from the URL parameter
    $client_id = $_GET['id'];
  $sql = "SELECT id, client_id, balance, devise, rip FROM comptes where client_id = $client_id ";
  $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    echo "<tr class='border-4 border-white-600'><td class='border-4 border-white-600'>" . $row["id"] . "</td><td class='border-4 border-white-600'>" . $row["balance"] . "</td><td class='border-4 border-white-600'>" . $row["devise"] . "</td><td class='border-4 border-white-600'>" . $row["rip"] . "</td><td class='border-4 border-white-600'>" . $row["client_id"] . "</td></tr>";

    echo "</tr>";
  }
} else {
 /* echo "0 results";*/
}
} else {
    echo "No client ID provided.";
}

$conn->close();
?>

  </table>

    
</body>
</html>