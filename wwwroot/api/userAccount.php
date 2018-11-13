<?php
$user_name = $_GET["user_name"];
$user_age = $_GET["user_age"];
$user_info = array("userName" => $user_name, "userAge" => $user_age);
header("Access-Control-Allow-Origin: *");
echo json_encode($user_info);
echo "<br>";
echo $_SERVER['HTTP_ACCEPT'];
?>