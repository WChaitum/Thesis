<?php

include("connect.php");

$RFID_Code = $_POST['rfid_Code'];
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `esp8266` (`RFID_KEY`, `status`) VALUES ('$RFID_Code', 'new');";

    
if ($conn->query($sql) === TRUE) {

    $sql="SELECT * FROM esp8266  WHERE `status`='new'";
    $result = $conn ->query($sql);
    
    while($row = $result->fetch_object()){
        $studentsql ="SELECT * FROM `student` WHERE `student_rfid` = '".$row->RFID_KEY."'";
        $student = $conn->query($studentsql);
        
            if($student->num_rows>0){
                $rss = $student->fetch_object();

            $update = "UPDATE esp8266 SET status = 'MATCH' WHERE `RFID_KEY`='".$rss->parent_rfid."'AND `status`!='complete'";
            $res = mysqli_query($conn,$update);

            $stupdate = "UPDATE esp8266 SET status = 'MATCH' WHERE `RFID_KEY`='".$rss->student_rfid."'AND `status`!='complete'";
            $stres = mysqli_query($conn,$stupdate);

            header("Refresh:0; url=input_id.php");
            ?>
    <?php }}}
    
 else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
