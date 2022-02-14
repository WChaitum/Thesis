<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0 auto;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
    }
    form{
        border: 1px solid #333;
        width: 50rem;
        margin: 4rem auto;
        height: 10rem;
        border-radius: 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
    }
</style>
<body>
    <form action="process.php" method="post">
        <label for="rfid_Code" class="col-sm-3 col-form-label">RFID KEY ของผู้ปกครอง:</label>
        <input type="text" class="form-control" id="rfid_Code" name="rfid_Code"required>
        <input type="submit" value="ตกลง">
    </form> 

    <form action="add2.php" method="post">
        <label for="rfid_Code" class="col-sm-3 col-form-label">RFID KEY ของนักเรียน:</label>
        <input type="text" class="form-control" id="rfid_Code" name="rfid_Code"required>
        <input type="submit" value="ตกลง">
    </form> 
</body>
</html>