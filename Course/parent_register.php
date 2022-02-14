<?php
    include_once('connect.php');
    session_start();
    if(isset($_POST['submit'])){


        $temp = explode('.',$_FILES['fileUpload']['name']);
        $newnamepicture = round (microtime(true)).'.'.end($temp);
        move_uploaded_file($_FILES['fileUpload']['tmp_name'],'parent_picture/'. $newnamepicture);


        $sql ="INSERT INTO `parent` ( `RFID_KEY`,`firstname`, `lastname`, `house_number`, `district`, `prefecture`, `province`, `zip_code`, `telephone`,`picture`)
                        VALUES   ( '".$_POST['rfid_key']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['house_number']."','".$_POST['district']."','".$_POST['prefecture']."','".$_POST['province']."','".$_POST['zip_code']."','".$_POST['telephone']."','". $newnamepicture."');";
        $result = $conn->query($sql);
        if($result){
            echo"<script>alert('ลงทะเบียนสำเร็จ!!!');</script>";
            header("Refresh:0; url=parent_detail.php");
           
        }
}
?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ลงทะเบียนผู้ปกครอง</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
<?php if (isset($_SESSION['id'])){?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        
                        <div class="card-header text-center">
                        <h2>ลงทะเบียนผู้ปกครอง</h2> 
                        <div class="text-right">
                         <a class="btn btn-primary" href="parent_register.php"><svg class="bi bi-arrow-clockwise" width="1.4em" height="1.3em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 4.5a5.5 5.5 0 105.5 5.5.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63l-.5.865A5.472 5.472 0 0010 4.5z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M10.646 1.646a.5.5 0 01.708 0l2.5 2.5a.5.5 0 010 .708l-2.5 2.5a.5.5 0 01-.708-.708L12.793 4.5l-2.147-2.146a.5.5 0 010-.708z" clip-rule="evenodd"></path></svg>
                                     </a>
                        </div>
                        </div>
                        <div class="card-body">
                                
                                <?php
                                $rfidsql="SELECT * FROM `esp8266` WHERE `status` = 'register'";
                                $rfidresult = $conn ->query($rfidsql);

                                while($rs = $rfidresult->fetch_object()){
                                    $update = "UPDATE esp8266 SET status = 'complete' WHERE `status`='register' ";
                                    $result = mysqli_query($conn,$update);
                                ?>
                                
                                <tr>
                                    
                                <div class="form-group row">
                                    <label for="rfid_key" class="col-sm-3 col-form-label">RFID ผู้ปกครอง </label>
                                        <div class="col-sm-9">
                                    <input type="text" class="form-control" id="rfid_key" name="rfid_key"value="<?=$rs->RFID_KEY;?>"required>
                                        </div>
                                </div>
                                    
                                </tr>
                                <?php }?>
                                <div class="form-group row">
                                    <label for="firstname" class="col-sm-3 col-form-label">ชื่อ</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="firstname" name="firstname"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lastname" class="col-sm-3 col-form-label">นามสกุล</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="lastname" name="lastname"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="house_number" class="col-sm-3 col-form-label">บ้านเลขที่</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="house_number" name="house_number"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="district" class="col-sm-3 col-form-label">ตำบล</label>
                                        <div class="col-sm-9">
                                            <input type="district" class="form-control" id="district" name="district"required>
                                        </div>
                                </div>

                            <div class="form-group row">
                                <label for="prefecture" class="col-sm-3 col-form-label">อำเภอ</label>
                                <div class="col-sm-9">
                                    <input type="prefecture" class="form-control" id="prefecture" name="prefecture"required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="province" class="col-sm-3 col-form-label">จังหวัด</label>
                                <div class="col-sm-9">
                                    <input type="province" class="form-control" id="province" name="province"required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zip_code" class="col-sm-3 col-form-label">รหัสไปรษณีย์</label>
                                <div class="col-sm-9">
                                    <input type="zip_code" class="form-control" id="zip_code" name="zip_code"required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telephone" class="col-sm-3 col-form-label">โทรศัพท์</label>
                                <div class="col-sm-9">
                                    <input type="telephone" class="form-control" id="telephone" name="telephone"required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fileUpload" class="col-sm-3 col-form-label">รูปภาพ</label>
                                <div class="col-sm-9">
                                    <input type="file"  id="fileUpload" name="fileUpload">
                                </div>
                                
                            </div>
                            </div>

                                <div class="card-footer text-center">
                                    <input type="submit" name="submit"class="btn btn-success"value="ลงทะเบียน">
                                    

                                </div>
                    </form>
                </div>
            </div> 
            
            

            
         </div> 
      </div>
    <br>
    
    
     <script src="node_modules/jquery/dist/jquery.min.js"></script>
     <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
     <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    
     <?php }?>  
</body>
</html>
