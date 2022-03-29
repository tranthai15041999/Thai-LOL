<?php
var_dump($_GET);
if (isset($_GET["api_key"])){
$api_key = $_GET['api_key'];
var_dump($_GET);
echo "thanhcong";
}
else{
echo "thatbai";

}

?>