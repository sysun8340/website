<?php
require_once('./get_user_info_from_database.php');

function check_user_info($connect, $chartName, $username, $password){
  $savedUserInfo = get_user_info_from_database($connect, $chartName, $username);
  if($savedUserInfo['username'] == $username && $savedUserInfo['password'] == $password){
    return true;
  }
  return false;
}
?>