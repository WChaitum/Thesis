<?php

    require 'connect.php';

    $parent_id = $_GET['id'];
    $picdel="SELECT picture FROM parent WHERE id = '$parent_id'";
    $resdel = mysqli_query($conn,$picdel);
    $picture = mysqli_fetch_array($resdel,MYSQLI_NUM);
    $filename = $picture[0];
    @unlink('parent_picture/'.$filename);

    $del = "DELETE FROM parent WHERE id = '$parent_id'"; 
    $result = mysqli_query($conn,$del);
    if($result){
        echo"<script>alert('ลบข้อมูลสำเร็จ!!!');</script>";
        header("Refresh:0; url=parent_detail.php");
    }else{
        echo"เกิดข้อผิดพลาด".mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>