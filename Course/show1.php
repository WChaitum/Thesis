<html>
<?php include("connect.php");
session_start();
?> 
<head>
<meta http-equiv="refresh" content="">
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head> 
<style>
  table{
    text-align:center
  }
</style>
<body>
<?php if (isset($_SESSION['id'])){?>
<div class="container">
<div class="row">
<div class="card mt-5 mx-auto">
  <table class="table ">
  <thead>
    <tr>
    <div class="card-header text-center">
      <h3>ประวัติการแตะบัตรของผู้ปกครอง</h3>

      <div class="text-right">
    <a class="btn btn-danger" href="delete_all.php"><svg class="bi bi-trash-fill" width="1.4em" height="1.4em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
      </svg>
    </a>
      </div>

    </div>
</div>

    
    
    <th scope="col">ชื่อ-สกุล ผู้ปกครอง</th>
    <th scope="col">เวลา</th>
    <th scope="col">สถานะ</th>
    
    </tr>
  </thead>
  <tbody>
  <?php

  $sql="SELECT * FROM `esp8266` WHERE `status`='MATCH'order by id desc";
  $result = $conn ->query($sql);
  
      while($row = $result->fetch_object()){

      $parentsql ="SELECT * FROM `parent` WHERE `RFID_KEY` = '".$row->RFID_KEY."'";
      $parent = $conn->query($parentsql);

      if($parent->num_rows>0){
      $rss = $parent->fetch_object();

      ?>
      <tr>
          
        <td><?=$rss->firstname;?><?=$rss->lastname;?></td></td>
        <td><?=$row->day;?></td>
        <td><?=$row->status;?></td>
        
        <?php }}?>
       </tbody>
</table>

      
</div>
<div class="card mt-5 mx-auto">
  <table class="table ">
  <thead>
    <tr>
    <div class="card-header text-center">
      <h3>ประวัติการแตะบัตรของรักเรียน</h3>

      <div class="text-right">
        <a class="btn btn-success" href="background.php"><svg class="bi bi-house-fill" width="1.4em" height="1.4em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.5 12.995V16.5a.5.5 0 01-.5.5H4a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4a.5.5 0 01-.5-.5V13c0-.25-.25-.5-.5-.5H9c-.25 0-.5.25-.5.495z"></path>
        <path fill-rule="evenodd" d="M15 4.5V8l-2-2V4.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"></path>
      </svg>
    </a>
    <a class="btn btn-danger" href="delete_all.php"><svg class="bi bi-trash-fill" width="1.4em" height="1.4em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
      </svg>
    </a>
      </div>

    </div>
</div>

    
    
    <th scope="col">ชื่อ-สกุล นักเรียน</th>
    <th scope="col">เวลา</th>
    <th scope="col">สถานะ</th>
    
    </tr>
  </thead>
  <tbody>
  <?php

    $sqls="SELECT * FROM `esp8266` WHERE `status`='MATCH'order by id desc";
    $results = $conn ->query($sqls);

  
    while($rows = $results->fetch_object()){

        $studentsql ="SELECT * FROM `student` WHERE `student_rfid` = '".$rows->RFID_KEY."'";
        $student = $conn->query($studentsql);

     
    if($student->num_rows>0){
        $rs = $student->fetch_object();

      ?>
      <tr>
          
        <td><?=$rs->firstname;?><?=$rss->lastname;?></td></td>
        <td><?=$rows->day;?></td>
        <td><?=$rows->status;?></td>
        
        <?php }}?>
       </tbody>
</table>

</div>





    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <meta http-equiv="refresh" content="10">
    <?php }?>  
</body>
</html>
