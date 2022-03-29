<?php
include'database.php';
//date_default_timezone_set('Asia/Ho_Chi_Minh');
//$time_act = date('Y-m-d H:i:s'); // use actual date() format displayed in your table.
$conn = new mysqli($servername, $username, $password, $dbname);
 $sql = "SELECT `x1` FROM test2 WHERE `device` = '3'";
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
 } 
 
            $result = $conn->query($sql);
 
            if ($result->num_rows > 0) {
             // output dữ liệu trên trang
             while($row = $result->fetch_assoc()) {
             echo  $row["x1"];
             }
            } else {
             echo "0 results";
}
?>