<?php
    require'connect.php';

    $id = $_POST['id'];
    $rfid_key = $_POST['rfid_key'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $house_number = $_POST['house_number'];
    $district = $_POST['district'];
    $prefecture = $_POST['prefecture'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $telephone = $_POST['telephone'];
    
    $temp = explode('.',$_FILES['fileUpload']['name']);
    $newnamepicture = round (microtime(true)).'.'.end($temp);
    move_uploaded_file($_FILES['fileUpload']['tmp_name'],'parent_picture/'. $newnamepicture);

    



    $update = "UPDATE parent SET RFID_KEY ='$rfid_key',firstname ='$firstname',lastname ='$lastname',house_number ='$house_number',district ='$district',prefecture ='$prefecture',province ='$province',zip_code ='$zip_code',telephone ='$telephone',picture ='$newnamepicture' WHERE id='$id' ";
    $result = mysqli_query($conn,$update);

    if ($result){
       echo"<script>alert('แก้ไขสำเร็จ!!!');</script>";
        header("Refresh:0; url=parent_detail.php");
    }else{
      echo "<script>alert('เกิดข้อผิดพลาด!!!');</script>".mysqli_error($conn);
    }

?>