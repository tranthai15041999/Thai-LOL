<?php
include'database.php';
// session_start();
// // error_reporting(0);
// $servername = "localhost";
 
// // REPLACE with your Database name
// $dbname = "thai";
// // REPLACE with Database user
// $username = "root";
// // REPLACE with Database user password
// $password = "";
 
// // Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// // If you change this value, the ESP32 sketch needs to match
$api_key_value = "123456789";
//$api_key = $_POST["api_key"];
 //$api_key="123456789"
 //$api_key = $sensor = $location = $value1 = $value2 = $value3 = "";
 
// date_default_timezone_set('Asia/Ho_Chi_Minh');
// $time_act = date('Y-m-d H:i:s'); // use actual date() format displayed in your table.
 
//var_dump($_GET); // ***********Cap nhat them dong nay de phan hoi ve ESP8266
 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_GET["api_key"]);
    if($api_key == $api_key_value) {
        $sensor1 = test_input($_GET["sensor1"]);
        $sensor2= test_input($_GET["sensor2"]);
        $sensor3 = test_input($_GET["sensor3"]);
        $sensor4 = test_input($_GET["sensor4"]);
        $led1 = test_input($_GET["led1"]);
        $led2 = test_input($_GET["led2"]);
        $led3 = test_input($_GET["led3"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO test2 (id,device,led1 ,led2 ,led3, sensor1, sensor2, sensor3, sensor4, pump1 ,pump2 ,pump3)
       VALUES (null,'2','" . $led1 . "','" . $led2 . "','" . $led3 . "','" . $sensor1 . "', '" . $sensor2 . "','" . $sensor3 . "','" . $sensor4 . "','6','5', '" . $time_act . "')";
        // $sql = "UPDATE `test2` SET `device`='2',`led1`='$led1',`led2`='$led2',`led3`='$led3',`sensor1`='$sensor1',`sensor2`='$sensor2',`sensor3`='$sensor3',`sensor4`='$sensor4',`pump1`='12',`pump2`='14',`pump3`='14' WHERE id = 1";
        
       
        
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            echo "ok";
          
 
          
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }
 
}
else {
    echo "No data posted with HTTP POST.";
}

// Khoi receiver
//  $conn = new mysqli($servername, $username, $password, $dbname);
//  $sql = "SELECT `value1` FROM test WHERE `sensor` = '71'";
// if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//  } 
 
//             $result = $conn->query($sql);
 
//             if ($result->num_rows > 0) {
//              // output dữ liệu trên trang
//              while($row = $result->fetch_assoc()) {
//              echo  $row["value1"];
//              }
//             } else {
//              echo "0 results";
// }
            //read();
        //} 
       // else {
       //     echo "Error: " . $sql . "<br>" . $conn->error;
       // }


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>