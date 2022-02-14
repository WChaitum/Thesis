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
<div class="card mt-5">
  <table class="table ">
  <thead>
    <tr>
    <div class="card-header text-center">
      <h2>ประวัติการแตะบัตรทั้งหมด</h2>
      <div class="text-right">
    <a class="btn btn-danger" href="delete_all.php"><svg class="bi bi-trash-fill" width="1.4em" height="1.4em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
      </svg>
    </a>
       
      </div>
    </div>
</div>
    
    
    <th scope="col">รหัส RFID</th>
    <th scope="col">เวลา</th>
    <th scope="col">สถานะ</th>
    </tr>
  </thead>
  <tbody>
  <?php

  $sql="SELECT * FROM `esp8266` order by id desc";
  $result = $conn ->query($sql);

  
  
      while($row = $result->fetch_object()){
        ?>
        <tr>
          
          <td><?=$row->RFID_KEY;?></td>
          <td><?=$row->day;?></td>
          <td><?=$row->status;?></td>
          
        <?php
    }
        ?>    
  </tbody>
</table>

      <div class="card-footer text-center">
    
       
      </div>
      
  </div>
</div>




    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <meta http-equiv="refresh" content="10">
    <?php }?>  
</body>
</html>
