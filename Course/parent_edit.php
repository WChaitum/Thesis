<?php 
     require'connect.php';
     $parent_id = $_GET['id'];
     $edit = "SELECT * FROM parent WHERE id = '$parent_id'"; 
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
<div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
<form action="parent_update.php" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                       <h2>แก้ไขข้อมูล</h2> 
                        </div>
                        <div class="card-body">

                                <div class="form-group row">
                                    <label for="rfid_key" class="col-sm-3 col-form-label">RFID ผู้ปกครอง </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rfid_key" name="rfid_key"value="<?php echo $row['RFID_KEY']?>"required>
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
                                    <label for="house_number" class="col-sm-3 col-form-label">บ้านเลขที่</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="house_number" name="house_number"value="<?php echo $row['house_number']?>"required>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="district" class="col-sm-3 col-form-label">ตำบล</label>
                                        <div class="col-sm-9">
                                            <input type="district" class="form-control" id="district" name="district"value="<?php echo $row['district']?>"required>
                                        </div>
                                </div>

                            <div class="form-group row">
                                <label for="prefecture" class="col-sm-3 col-form-label">อำเภอ</label>
                                <div class="col-sm-9">
                                    <input type="prefecture" class="form-control" id="prefecture" name="prefecture"value="<?php echo $row['prefecture']?>"required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="province" class="col-sm-3 col-form-label">จังหวัด</label>
                                <div class="col-sm-9">
                                    <input type="province" class="form-control" id="province" name="province"value="<?php echo $row['province']?>"required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zip_code" class="col-sm-3 col-form-label">รหัสไปรษณีย์</label>
                                <div class="col-sm-9">
                                    <input type="zip_code" class="form-control" id="zip_code" name="zip_code"value="<?php echo $row['zip_code']?>"required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telephone" class="col-sm-3 col-form-label">โทรศัพท์</label>
                                <div class="col-sm-9">
                                    <input type="telephone"  id="telephone" name="telephone"value="<?php echo $row['telephone']?>"required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fileUpload" class="col-sm-3 col-form-label">รูปภาพ</label>
                                <div class="col-sm-9">
                                    <input type="file"  id="fileUpload" name="fileUpload"value="<?php echo $row['picture']?>"required>
                                </div>
                                </div>
                            </div>

                                <div class="card-footer text-center">
                                    <input type="submit" name="submit"class="btn btn-success"value="แก้ไขข้อมูล">
                                    <input type ="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <a class="btn btn-success" href="parent_detail.php">ข้อมูลผู้ปกครอง</a>
                                </div>
                    </form>
                    </div>
                    </div>
                    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    </<div>
    <?php }?>
</body>
</html>
