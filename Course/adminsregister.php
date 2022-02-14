<?php
    include_once('connect.php');
    session_start();
    if(isset($_POST['submit'])){
        //echo $_POST['firstname'].'<br>';
        //echo $_POST['lastname'].'<br>';
        //echo $_POST['house_number'].'<br>';
        //echo $_POST['district'].'<br>';
        //echo $_POST['prefecture'].'<br>';
        //echo $_POST['province'].'<br>';
        //echo $_POST['zip_code'].'<br>';
        //echo $_POST['telephone'].'<br>';
        //echo $_FILES['fileUpload']['name'].'<br>';
        //echo 'ชื่อรูปภาพ'.$_FILES['fileUpload']['name'].'<br>';
        //echo 'เนิ้อหาไฟล์'.$_FILES['fileUpload']['tmp_name'].'<br>';
        //echo 'ขนาดรูปภาพ'.$_FILES['fileUpload']['size'] / 1024 .'KB <br>';
        //echo 'ชนิดของไฟล์'.$_FILES['fileUpload']['type'].'<br>';

        


        $sql ="INSERT INTO `admin`  (`name`, `username`, `password`) VALUES ('".$_POST['name']."','".$_POST['username']."','".$_POST['password']."')";
        
        $result = $conn->query($sql);
        
        if($result){
            echo"<script>alert('ลงทะเบียนสำเร็จ!!!');</script>";
            header("Refresh:0; main_page.php");
            //header ( "location: http://www.ireallyhost.com" );
        }
        else{
            echo"<script>alert('มีบางอย่างผิดพลาด');</script>";
           header("Refresh:0; adminsregister.php");
        }

}

    ?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ลงทะเบียนเจ้าหน้าที่</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
   <style>
body{
    background-image: url("img/photo-1543946602-8496af5aaa53.jpg");
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment:fixed;
    background-size: auto;
    
  }
  </style>


<body>
<?php if (isset($_SESSION['id'])){?>
      <div class="container">
         <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                        เจ้าหน้าที่
                        </div>
                        <div class="card-body">

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">ชื่อ </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username" class="col-sm-3 col-form-label">ชื่อผู้ใช้</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name="username"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">รหัสผ่าน</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password" name="password"required>
                                        </div>
                                </div>


                            </div>

                                <div class="card-footer text-center">
                                    <input type="submit" name="submit"class="btn btn-success"value="ลงทะเบียน">
                                    <a class="btn btn-success" href="main_page.php">หน้าหลัก</a>
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
