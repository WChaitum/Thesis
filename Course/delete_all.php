<?php
    include 'connect.php';

    
    $del = "DELETE  FROM esp8266  "; 
    $result = mysqli_query($conn,$del);
    if($result){
        $conn -> query("ALTER TABLE esp8266 AUTO_INCREMENT=1");
        header("Refresh:0; url=show.php");
        echo"<script>alert('ลบข้อมูลสำเร็จ!!!');</script>";
        header("Refresh:0; url=show.php");
    }else{

        echo"เกิดข้อผิดพลาด".mysqli_error($conn);

         header("Refresh:0; url=show.php");
    }
    mysqli_close($conn);
    ?>
