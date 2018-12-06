<?php
function gen_token($username, $password, $time){
  $str = $username.$password.$time;
  $token = md5($str);
  return $token;
}
?>