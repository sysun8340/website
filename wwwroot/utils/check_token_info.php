<?php
require_once('./get_token_info_from_database.php');

function check_token_info ($username, $token){
  $savedTokenInfo = get_token_info_from_database($username);
  $savedToken = $savedTokenInfo['token'];
  $savedTime = $savedTokenInfo['last_login_time'];
  $timeDiff = (time() - $savedTime)/3600;
  if($savedToken == $token && $timeDiff < 24){ //token24小时内有效
    return true;
  }
  else{
    return false;
  }
}
?>