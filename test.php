<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "myDBPDO";



$fname=$_POST["fname"]; 
$lname=$_POST["lname"]; 
$email=$_POST["email"]; 


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function createTable()
    {
        $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
        )";

    // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table MyGuests created successfully";
    }

    function writeEntry($conn,$fname,$lname,$email)
    {    
    // our SQL statements
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
        VALUES ('$fname', '$lname', '$email')");

    // commit the transaction       
        echo "New records created successfully";
        
    }
    
    //Which functions to do
    writeEntry($conn,$fname,$lname,$email);
    }   
catch(PDOException $e)
    {
    echo "<br>" . $e->getMessage();
    }

$conn = null;
?>