<?php
    $conn = new mysqli('localhost','root','','basic');
    mysqli_query($conn,"SET CHARACTER SET UTF8");
    //ทำให้ข้อความภาษาไทยไม่เพี้ยน

  
    if($conn->connect_errno){
        die("Connection Failed.". $conn->connect_error);
    }
    
   // error_reporting(~E_NOTICE );
    //แก้ไขปัญหา Notice: Undefined index บน PHP แสดง Error/Message นี้เมื่อมีการเรียกตัวแปร (Variable)
?>