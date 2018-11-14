<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
$user_name = $_GET["user_name"];
$user_age = $_GET["user_age"];
$user_info = array("userName" => $user_name, "userAge" => $user_age);
echo json_encode($user_info);
?>