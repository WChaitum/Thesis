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
      <h4>ประวัติการแตะบัตรของผู้ปกครอง</h4>

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
<div class="card-footer "></div>
      
</div>
<div class="card mt-5 mx-auto">
  <table class="table ">
  <thead>
    <tr>
    <div class="card-header text-center">
      <h4>ประวัติการแตะบัตรของนักเรียน</h4>

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
<div class="card-footer "></div>
</div>





    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <meta http-equiv="refresh" content="10">
    <?php }?>  
</body>
</html>
