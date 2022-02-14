<html>
<?php include("connect.php");
session_start();?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
 <link rel="icon" type="image/png" href="img/programming.svg"/>
</head> 
<style>
body{
    background-image: url("img/photo-1543946602-8496af5aaa53.jpg");
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment:fixed;
    background-size: cover;
  }
</style>
<body>
 

<table border ='1' cellpadding='3'cellspacing='0'>
<tr>
	

<?php
$sql="SELECT * FROM `esp8266` WHERE `status` = 'new'";
$result = $conn ->query($sql);
if($rs = $result->fetch_object()){
            $studentsql ="SELECT * FROM `student` WHERE `parent_rfid` = '".$rs->RFID_KEY."'";
            $student = $conn->query($studentsql);

            $parentsql ="SELECT * FROM `parent` WHERE `RFID_KEY` = '".$rs->RFID_KEY."'";
            $parent = $conn->query($parentsql);

            $update = "UPDATE esp8266 SET status = 'old' WHERE `RFID_KEY`='".$rs->RFID_KEY."'AND `status`= 'new'";
            $result = mysqli_query($conn,$update);
			
			if($parent->num_rows>0){
                $row = $parent->fetch_assoc();
                ?>

<div class="container">
        <div class="row">
            <div class="col-md-3.5 mx-auto mt-5">
            <div class="card-header text-center"style="background-color:#1E90FF"></div>
            <div class="card"style="background-color:#FFFFFF">
                <img class="mx-auto " src = "parent_picture/<?php echo $row['picture'];?> "width="300" height="300">
                
                
            </div>
                <div class="card">
                    <form action=""method="POST">
                        <div class="card-header text-center"style="background-color:#F8F8FF">
                            ผู้ปกครอง
                        </div>
                        <div class="card-body text-center">
                            <?php echo $row['firstname'];?>  <?php echo $row['lastname'];?></td>
                        </div>                          
                        
                </div>
                <div class="card-footer text-center "style="background-color:#1E90FF"></div>
                        </div>
                    </form>
                    <?php
               
            }else{}  
            if($student->num_rows>0){
                $row = $student->fetch_assoc();?>
                 <div class="col-md-3.5 mx-auto mt-5">
                 <div class="card-header text-center"style="background-color:#FF69B4"></div>
            <div class="card"style="background-color:#FFFFFF">
                <img class="mx-auto" src = "student_picture/<?php echo $row['picture'];?>"width="300" height="300">
                
            </div>
                <div class="card">
                    <form action=""method="POST">
                        <div class="card-header text-center"style="background-color:#F8F8FF">
                        นักเรียน
                        </div>
                        <div class="card-body text-center">
                             <?php echo $row['firstname'];?>  <?php echo $row['lastname'];?></td>
                        </div>                          
                        <audio autoplay loop="">
                            <source src="soundupload/<?php echo $row['sound'];?>" type="audio/mpeg" />
                            Your browser does not support the audio element.
                        </audio>
                        
                        <meta http-equiv="refresh" content="10">
                </div>
                <div class="card-footer text-center"style="background-color:#FF69B4"></div>
                </div>
                    </form>
            <?php 
         }else{
 
            ?><meta http-equiv="refresh" content="0"><?php
        }  }
        else { 
            $update = "UPDATE esp8266 SET status = 'new' WHERE `status`='old' ";
            $result = mysqli_query($conn,$update);
            ?>
        <div class="container">
                <div class="row">
                    <div class="col-md-4 mx-auto mt-5">
                    <div class="card"style="background-color:#FFCC00">
                        <img class="mx-auto" src="img/AW ตราประจำมหาวิทยาลัย-01.png" alt="" width="125" height="218 ">
                    </div>
                        <div class="card text-center">
                            <form>
                                <img class="mx-auto" src="img/ยินดีต้อนรับ-png-.png" alt="" width="250" height="98">
                                <h3>กรุณาแตะบัตรของท่าน</h3>
                                <div class="card"style="background-color:#FFCC00">
                            
                                <img class="mx-auto" src="img/main.png" alt="" width="150" height="150">
                                </div>
        
                                </div>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
            <meta http-equiv="refresh" content="3">
        




</body>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <meta http-equiv="refresh" content="10">
    <?php }?> 
</html>
