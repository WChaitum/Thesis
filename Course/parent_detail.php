<?php
      require'connect.php';
      $detail = "SELECT * FROM parent";
      $result = mysqli_query($conn,$detail);
      session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ข้อมูลผู้ปกครอง</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<style>
  table{
    text-align:center
  }
</style>
<body>
<?php if (isset($_SESSION['id'])){?>

<div class="card mt-5">
  <table class="table">
     <thead>
    <tr>
    <div class="card-header text-center ">
    <h2>ข้อมูลผู้ปกครอง</h2>
    </div>
      <th scope="col">รหัส RFID</th>
      <th scope="col">ชื่อ-นามสกุล</th>
      <th scope="col">บ้านเลขที่</th>
      <th scope="col">ตำบล</th>
      <th scope="col">อำเภอ</th>
      <th scope="col">จังหวัด</th>
      <th scope="col">ไปรษณีย์</th>
      <th scope="col">โทรศัพท์</th>
      <th scope="col">รูปภาพ</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    
    </tr>
  </thead>
  <tbody>
  <?php
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  ?>
  
    <tr>
      
      <td><?php echo $row['RFID_KEY'];?></td>
      <td><?php echo $row['firstname'];?> <?php echo $row['lastname'];?></td>
      <td><?php echo $row['house_number'];?></td>
      <td><?php echo $row['district'];?></td>
      <td><?php echo $row['prefecture'];?></td>
      <td><?php echo $row['province'];?></td>
      <td><?php echo $row['zip_code'];?></td>
      <td><?php echo $row['telephone'];?></td>
      <td><img src = "parent_picture/<?php echo $row['picture'];?>"width="50px"heigh="50px"></td>
      <!--<td><button type="button" class="btn btn-warning"><a href = "parent_edit.php?id=<?php echo $row['id'];?>">แก้ไข</a></button></td>-->
      <td><a class="btn btn-warning" href="parent_edit.php?id=<?php echo $row['id'];?>"><svg class="bi bi-gear" width="1.4em" height="1.4em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10.837 3.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 016.377 5.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 01-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 011.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 012.692 1.115l.094.319c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 012.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 011.115-2.693l.319-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 01-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159a1.873 1.873 0 01-2.693-1.115l-.094-.319zm-2.633-.283c.527-1.79 3.064-1.79 3.592 0l.094.319a.873.873 0 001.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 00.52 1.255l.319.094c1.79.527 1.79 3.064 0 3.592l-.319.094a.873.873 0 00-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 00-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 00-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 00-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 00.52-1.255l-.16-.292c-.892-1.64.901-3.433 2.541-2.54l.292.159a.873.873 0 001.255-.52l.094-.319z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M10 7.754a2.246 2.246 0 100 4.492 2.246 2.246 0 000-4.492zM6.754 10a3.246 3.246 0 116.492 0 3.246 3.246 0 01-6.492 0z" clip-rule="evenodd"></path>
</svg></a></td>
      <!--<td><button type="button" class="btn btn-danger"><a href = "parent_delete.php?id=<?php echo $row['id'];?>">ลบ</a></button></td>-->
      <td><a class="btn btn-danger" href="parent_delete.php?id=<?php echo $row['id'];?>"><svg class="bi bi-trash-fill" width="1.4em" height="1.4em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.5 3a1 1 0 00-1 1v1a1 1 0 001 1H5v9a2 2 0 002 2h6a2 2 0 002-2V6h.5a1 1 0 001-1V4a1 1 0 00-1-1H12a1 1 0 00-1-1H9a1 1 0 00-1 1H4.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM10 7a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 0110 7zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
        </svg>
      </a></td>
      
    </tr>
      <?php } ?>
 
  </tbody>
</table>
</div>
      

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <?php }?>
</body>
</html>
