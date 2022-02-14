<?php
    require 'connect.php';

    $student_id = $_GET['id'];
    $picdel="SELECT picture FROM student WHERE id = '$student_id'";
    $resdel = mysqli_query($conn,$picdel);
    $picture = mysqli_fetch_array($resdel,MYSQLI_NUM);
    $filename = $picture[0];

    $sounddel="SELECT sound FROM student WHERE id = '$student_id'";
    $resdel = mysqli_query($conn,$sounddel);
    $sound = mysqli_fetch_array($resdel,MYSQLI_NUM);
    $soundname = $sound[0];


    @unlink('student_picture/'.$filename);
    @unlink('soundupload/'.$soundname);

    $del = "DELETE FROM student WHERE id = '$student_id'"; 
    $result = mysqli_query($conn,$del);
    if($result){
        echo"<script>alert('ลบข้อมูลสำเร็จ!!!');</script>";
        header("Refresh:0; url=student_detail.php");
    }else{
        echo"เกิดข้อผิดพลาด".mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>