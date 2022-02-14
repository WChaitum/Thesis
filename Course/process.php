<?php include 'connect.php'; 


include_once('connect.php');

$RFID_Code = $_POST['rfid_Code'];

mysqli_query($conn,"INSERT INTO esp8266(RFID_KEY,status)
            VALUES ('$RFID_Code','new')");

header("Refresh:0; url=input_id.php");
?>