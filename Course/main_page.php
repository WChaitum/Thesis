<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="img/home.png"/>
</head>
   <style>
.navbar{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    }
  </style>
<body>
<?php if (isset($_SESSION['id'])){?>
 
<div class="container ">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
<div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <div >
              <a href="main_page.php"><img class="mx-auto" src="img/rust logo.jpg" alt="" width="115" height="38"></a>  
        </div>
            &nbsp;
            &nbsp;
            <li class="nav-item">

              <a class="btn btn-primary"target ="main" href="manual.php">คู่มือ</a>

              <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ผู้ปกครอง
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" target ="main" href="parent_detail.php">ข้อมูลผู้ปกครอง</a>                
                <a class="dropdown-item" target ="main" href="parent_register.php">ลงทะเบียนผู้ปกครอง</a>
                </div>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  นักเรียน
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" target ="main" href="student_detail.php">ข้อมูลนักเรียน</a>
                <a class="dropdown-item" target ="main" href="student_register.php">ลงทะเบียนนักเรียน</a>
                </div>
              </div>

               <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ประวัติ
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" target ="main" href="show.php">ประวัติการแตะบัตร</a>
                <a class="dropdown-item" target ="main" href="showall.php">ประวัติการแตะบัตรทั้งหมด</a>
                </div>
              </div>
                
                <a class="btn btn-light" target ="_blank" href="program.php">โปรแกรม</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
                
                <li class="nav-item dropdown">
               
              <a class="btn btn-warning dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ยินดีต้อนรับ คุณ <?php echo $_SESSION['name']?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"target ="main" href="adminsregister.php">ลงทะเบียนผู้ดูแล</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
              </div>
              
          </li>  
          </ul>   

</nav>
<iframe name="main"src="background.php" marginwidth="0" marginheight="0" frameborder="0" width="100%"  height="800"  style="z-index:100;"> </iframe>
</div>
 <?php }?> 
</body>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</html>
