<?php

include("connect.php");

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `esp8266` (`RFID_KEY`, `status`) VALUES ('".$_GET['content']."', 'register');";

    
if ($conn->query($sql) === TRUE) {
    echo "save OK";

    
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}
$conn->close();

?>