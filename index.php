<?php session_start();
include_once('Course/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="Course/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="Course/img/home.png"/>
</head>
   <style>
body{
    background-image: url("Course/img/photo-1543946602-8496af5aaa53.jpg");
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment:fixed;
    background-size: cover;
  }
  .btn-danger{
      margin-top: .5rem;
  }
  </style>
<body>
    <?php
        
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $conn->real_escape_string($_POST['password']);

            $sql ="SELECT * FROM `admin` WHERE `username` = '".$username."' AND `password` = '".$password."'";
            $result = $conn->query($sql);

            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                header('location:Course/main_page.php');
            }else{
                echo"<script>alert('กรุณาตรวจสอบชื่อผู้ใช้และรหัสผ่านอีกครั้ง!!!');</script>";
                header("Refresh:0; url=index.php");
            }
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
            <div class="card"style="background-color:#FFCC00">
                
                <img class="mx-auto" src="Course/img/AW ตราประจำมหาวิทยาลัย-01.png" alt="" width="125" height="218 ">
            </div>
                <div class="card">
                    <form action=""method="POST">
                        <div class="card-header text-center"style="background-color:#F8F8FF">
                            <img class="mx-auto" src="Course/img/ยินดีต้อนรับ-png-.png" alt="" width="250" height="98">
                        </div>
                        <div class="card-body text-center">
                            <div class="form-group row">
                                <label for="username"class="col-sm-4 col-form-label">ชื่อผู้ใช้</label>
                                <div class="col-sm-8">
                                <input type="text"class="form-control"id="username"name="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"class="col-sm-4 col-form-label">รหัสผ่าน</label>
                                <div class="col-sm-8">
                                <input type="password"class="form-control" id="password"name="password">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center"style="background-color:#FFCC00">
                            <input type="submit" name="submit"class="btn btn-success"value="เข้าสู่ระบบ">
                            <a class="btn btn-primary" href="Course/program.php">เปิดโปรแกรม</a>
                            <a class="btn btn-danger" href="Course/input_id.php" target="_blank">กรอกรหัสด้วยตนเอง</a>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>

    <script src="Course/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="Course/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="Course/node_modules/popper.js/dist/umd/popper.min.js"></script>
    
</body>
</html>
