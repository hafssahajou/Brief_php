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
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/*echo "Connected successfully";*/

// Create database-
$sql = "CREATE DATABASE if not exists DB_MYBREIF";
if ($conn->query($sql) === TRUE) {
 /* echo "Database created successfully";*/

  


$conn = mysqli_connect($servername, $username, $password, $DB_name);

      $sql = "CREATE TABLE if not exists Clients (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(30) NOT NULL,
        prenom VARCHAR(30) NOT NULL,
        dateNais DATE NOT NULL,
        nationalite VARCHAR(30) NOT NULL,
        genre VARCHAR(30) NOT NULL
        )";

    //   $conn-> query($sql);
       /* echo "Table created successfully"  . "<br>";*/


        $sql = "INSERT INTO Clients (id, nom, prenom, dateNais, nationalite, genre) 
        VALUES ('', 'hajou', 'hafssa', '1974/01/01', 'Germany', 'Homme'),
               ('', 'el hakik', 'hayat', '1974/01/01', 'Germany', 'Homme')
               ";



        
        
      }else {
  /*echo "Error creating database: " . $conn->error;*/
}

?>
<table class="w-4/5 mx-auto mt-10 text-white shadow-lg border-4 border-white-600">
<tr class="italic h-10 bg-gray-600 border-4 border-white-600">
  <th >ID</th>
  <th>NOM</th>
  <th>PRENOM</th>
  <th>DATE DE NAISSANCE</th>
  <th>NATIONALITE</th>
  <th>GENRE</th>
  <th>Action</th>

</tr>

<?php
$sql = "SELECT id, nom, prenom, dateNais, nationalite, genre FROM Clients";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr  class='border-4 border-white-600'><td class='border-4 border-white-600'>" . $row["id"]. " 
  </td><td class='border-4 border-white-600'> " . $row["nom"]. "
  </td><td class='border-4 border-white-600'> " . $row["prenom"]. "
   </td><td class='border-4 border-white-600'>" . $row["dateNais"]. "
   </td><td class='border-4 border-white-600'> " . $row["nationalite"]. "
   </td><td class='border-4 border-white-600'>" . $row["genre"]. "</td>";
  echo '<td><a class="font-bold text-black h-8 ml-20 px-8 bg-green-50 border-2 shadow-md border-blue-300 hover:bg-blue-600" href="compte.php?id=' . $row["id"] . '">Afficher Les Comptes</a></td>';


  echo "</tr>";
}
} else {
/* echo "0 results";*/
}

$conn->close();
?>
</table>



</body>
</html>