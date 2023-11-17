<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page d'Accueil</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
         header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
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

    <main>
        <h1>Bienvenue sur notre site</h1>
        <p>C'est la page d'accueil.</p>
        <!-- Autres contenus de la page d'accueil ici -->
    </main>

</body>
</html>

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
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE if not exists DB_MYBREIF";
if ($conn->query($sql) === TRUE) {
 echo "Database created successfully";

 $conn = mysqli_connect($servername, $username, $password, $DB_name);

 $sql = "CREATE TABLE if not exists Clients (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   nom VARCHAR(30) NOT NULL,
   prenom VARCHAR(30) NOT NULL,
   dateNais DATE NOT NULL,
   nationalite VARCHAR(30) NOT NULL,
   genre VARCHAR(30) NOT NULL
   )";

 $conn-> query($sql);
   echo "Table created successfully"  . "<br>";


   $sql = "INSERT INTO Clients (nom, prenom, dateNais, nationalite, genre) 
   VALUES ('hajou', 'hafssa', '1974/01/01', 'Germany', 'Homme'),
   ('hayat', 'el hakik', '1774/07/01', 'Germany', 'Homme'),
   ('fatima', 'hajou', '1774/07/01', 'Germany', 'Homme'),
   ('asmaa', 'hajou', '1774/07/01', 'Germany', 'Homme'),
   ('mohammed', 'hajou', '1774/07/01', 'Germany', 'Homme'),
   ('mohammed', 'hajou', '1774/07/01', 'Germany', 'Homme')
   )";

$conn->query($sql);
   if ($conn->query($sql) === TRUE) {
     echo "New record created successfully";
    echo "Error: " . $sql . "<br>" . $conn->error;
   }

 }else {
 echo "Error creating database: " . $conn->error;
 }


  $servername = "localhost";
 $username = "root";
$password = "";
 $DB_name ="DB_MYBREIF";
$date = "2023-11-17 12:34:56";



//  Create connection
$conn = mysqli_connect($servername, $username, $password, $DB_name); 

//  Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
 /*echo "Connected successfully";*/

//  Create database-
 $sql = "CREATE DATABASE if not exists DB_MYBREIF";
 if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";

  
 $conn = mysqli_connect($servername, $username, $password, $DB_name);


 $sql = "CREATE TABLE if not exists  comptes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_id INT(6) UNSIGNED, 
    balance VARCHAR(50),
    devise VARCHAR(30),
    rip VARCHAR(50) DEFAULT $date,
    FOREIGN KEY (client_id) REFERENCES Clients(id)
  ";

$conn-> query($sql);
 echo "Table comptes created successfully"  . "<br>";


$sql = "INSERT INTO comptes (id,client_id, balance, devise, rip)
VALUES ('',1, '5000.00', '51525514', '$date'),
       ('',2, '7500.50', '51525514', '$date'),
       ('',3, '3000.75', '51525514', '$date')
;";

if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}else {
 echo "Error creating database: " . $conn->error;
}



$servername = "localhost";
$username = "root";
$password = "";
$DB_name ="db_mybreif";


// Create connection
$conn = new mysqli($servername, $username, $password, $DB_name); 

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

//  Create database-
 $sql = "CREATE DATABASE if not exists DB_MYBREIF";
if ($conn->query($sql) === TRUE) {
 echo "Database created successfully";

}
$conn = mysqli_connect($servername, $username, $password, $DB_name);


$createTransaction = " CREATE TABLE if not exists transactions (
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Amount VARCHAR(30) NOT NULL,
  Types VARCHAR(30) NOT NULL,
  Account_ID VARCHAR(30) DEFAULT '$date'
  )";

if(!$conn->query($createTransaction)){
    die ("error" . $conn->error);
}

echo "done" ;





$sql = "INSERT INTO transactions (ID, Amount, Types, Account_ID) VALUES 
('', '15486.75','debit',4),
 ('', '15486.75','debit' ,5),
 ('', '15486.75','debit' ,6),
('', '15486.75','debit' ,5),
 ('', '15486.75','debit' ,4);";

if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
//  else {
//  echo "Error creating database: " . $conn->error;
// }

?>







<!-- <div class=" flex justify-center items-center relative bg-white w-[80%] h-[80%]  bg-[url('./360_F_208934723_tv3JlZKwlOhF1QiQdBruyaetwLRxTQCD.jpg')] bg-cover  shadow-2xl rounded-3xl">
       <img class="absolute left-0 top-0 h-18 w-36" src="Winance__3_-removebg-preview.png" alt="">
      <h1 class=" absolute text-center text-5xl font-bold top-28 text-white" >WELCOME BACK</h1>
  <div class="absolute text-white">
   
        <h3 class="text-center text-3xl font-bold ">LEAVE MONEY THE PROBLEME TO US & JUST</h3>
         <h1 class="text-center text-7xl font-bold font-serif">FOCUS ON YOUR BUSINESS</h1>
       <div class="text-center font-mono font-bold">
         <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, corrupti.</P>
         <p>Lorem ipsum dolor sit amet.</p>
       </div>
   </div>      -->
        <!-- <a href="client.php"><button class=" mt-96 font-bold  px-8 py-2 bg-green-50 border-4 shadow-md transition ease-in duration-700 border-blue-300 hover:bg-blue-600 font-serif">AJOUTER UN CLIENTS</button></a>
// </div>  
</body>
</html>