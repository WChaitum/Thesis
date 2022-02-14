<?php 
     require'connect.php';
     $student_id = $_GET['id'];
     $edit = "SELECT * FROM student WHERE id = '$student_id'"; 
     $result = mysqli_query($conn,$edit);
     $row =  mysqli_fetch_array($result,MYSQLI_ASSOC);
     session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูล</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<?php if (isset($_SESSION['id'])){?>
<div class="container ">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
            <div class="card">
<form action="student_update.php" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                       <h2>แก้ไขข้อมูล</h2> 
                        </div>
                        <div class="card-body">

                                <div class="form-group row">
                                    <label for="student_rfid" class="col-sm-3 col-form-label">RFID นักเรียน</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="student_rfid" name="student_rfid"value="<?php echo $row['student_rfid']?>"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="firstname" class="col-sm-3 col-form-label">ชื่อ</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="firstname" name="firstname"value="<?php echo $row['firstname']?>"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lastname" class="col-sm-3 col-form-label">นามสกุล</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="lastname" name="lastname"value="<?php echo $row['lastname']?>"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="parent_rfid" class="col-sm-3 col-form-label">RFID ผู้ปกครอง</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="parent_rfid" name="parent_rfid"value="<?php echo $row['parent_rfid']?>"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                <label for="fileUpload" class="col-sm-3 col-form-label">รูปภาพ</label>
                                <div class="col-sm-9">
                                    <input type="file"  id="fileUpload" name="fileUpload">
                                </div>
                                </div>

                                <div class="form-group row">
                                <label for="soundupload" class="col-sm-3 col-form-label">เสียงเรียก</label>
                                <div class="col-sm-9">
                                    <input type="file"  id="soundupload" name="soundupload">
                                </div>
                                </div>


                                
                                
                        </div>

                                <div class="card-footer text-center">
                                    <input type="submit" name="submit"class="btn btn-success"value="แก้ไขข้อมูล">
                                    <input type ="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <a class="btn btn-success" href="student_detail.php">ข้อมูลนักเรียน</a>
                                </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </table>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <?php }?> 
</body>
</html>
