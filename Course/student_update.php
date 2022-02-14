<?php
    require'connect.php';

    $id = $_POST['id'];
    $student_rfid = $_POST['student_rfid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $parent_rfid = $_POST['parent_rfid'];
    
    $temp = explode('.',$_FILES['fileUpload']['name']);
    $newnamepicture = round (microtime(true)).'.'.end($temp);
    move_uploaded_file($_FILES['fileUpload']['tmp_name'],'student_picture/'. $newnamepicture);

    $tempsound = explode('.',$_FILES['soundupload']['name']);
    $newnamesound = round (microtime(true)).'.'.end($tempsound);
    move_uploaded_file($_FILES['soundupload']['tmp_name'],'soundupload/'. $newnamesound);
     



    $update = "UPDATE student SET student_rfid ='$student_rfid',firstname ='$firstname',lastname ='$lastname',parent_rfid ='$parent_rfid',picture ='$newnamepicture',sound ='$newnamesound' WHERE id='$id' ";
    $result = mysqli_query($conn,$update);

    if ($result){
       echo"<script>alert('แก้ไขสำเร็จ!!!');</script>";
       header("Refresh:0; url=student_detail.php");
    }else{
      echo "<script>alert('เกิดข้อผิดพลาด!!!');</script>".mysqli_error($conn);
    }

?>