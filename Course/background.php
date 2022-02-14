<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าหลัก</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    
</head>
<body>
<?php if (isset($_SESSION['id'])){?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  src="img/images.png"class="d-block w-100"  alt="First slide " width="1280" height="450 ">
    </div>
    <div class="carousel-item">
      <img src="img/atena.png" class="d-block w-100 " alt="Second slide"width="1280" height="450">
    </div>
    <div class="carousel-item">
      <img src="img/telecom.jpg" class="d-block w-100" alt="Third slide"width="1280" height="450">
    </div>
    <div class="carousel-item">
      <img src="img/World-Telecommunications.jpg" class="d-block w-100" alt="Fourth slide"width="1280" height="450">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="jumbotron">
    <div class="container text-center">
  <h1 class="display-5">ยินดีต้อนรับสู่ </h1>
  <h1 class="display-6">ระบบเรียกชื่ออัตโนมัติด้วย RFID</h1>
  <p class="lead">ในปัจจุบันการรับบุตรหลานของผู้ปกครองยังขาดความสะดวก จนอาจทำให้เกิดความล่าช้าในการรับบุตรหลานของท่าน เราจึงได้นำระบบเรียกชื่ออัตโนมัติด้วย RFID มาใช้ เพื่อความสะดวกในการรับบุตรหลานของท่าน
</p>
  </div>
</div>
</div>


    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js">
    </script>
    <?php }?>      
</body>
</html>
