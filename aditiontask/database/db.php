<?php


$config = require_once __DIR__ . '/../config/config.php';

$servername = $config['host'];
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$db_selected = mysqli_select_db($conn, $dbname);

if (!$db_selected){
	// Create database
	$sql = "CREATE DATABASE $dbname";
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully";
	} else {
	    echo "Error creating database: " . $conn->error;
	}


	$sql = "create table campaign(
            id INT AUTO_INCREMENT,
            name VARCHAR(20) NOT NULL,
            primary key (id))";  
         
    if(mysqli_query($conn, $sql)){  
        echo "Table created successfully";  
    } else {  
        echo "Table is not created successfully ";  
    }  

    $sql = "create table banner(
            id INT AUTO_INCREMENT,
            name VARCHAR(20) NOT NULL,
            campaign_id INT NOT NULL,
            width INT(11) NOT NULL,
            height INT(11) NOT NULL,
            content VARCHAR(255) NOT NULL,
            primary key (id))";  
         
    if(mysqli_query($conn, $sql)){  
        echo "Table created successfully";  
    } else {  
        echo "Table is not created successfully ";  
    } 	
}

$conn->close();

$conn = mysqli_connect($servername, $username, $password,$dbname);  
         
if(!$conn){  
    die('Could not connect: '.mysqli_connect_error());  
}  
echo 'Connected successfully<br/>';  


$sql = "create table campaigns(
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(20) NOT NULL,
        primary key (id))";  
     
if(mysqli_query($conn, $sql)){  
    echo "Table created successfully";  
} else {  
    echo "Table is not created successfully ";  
}  

$sql = "create table banners(
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(20) NOT NULL,
        campaign_id INT NOT NULL,
        width INT(11) NOT NULL,
        height INT(11) NOT NULL,
        content VARCHAR(255) NOT NULL,
        primary key (id))";  
     
if(mysqli_query($conn, $sql)){  
    echo "Table created successfully";  
} else {  
    echo "Table is not created successfully ";  
} 
mysqli_close($conn);

?>