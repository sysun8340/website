<?php
function get_data($connect, $username, $type, $status){
  mysqli_query($connect, 'set names utf8');
  mysqli_select_db($connect, 'fengsuiyichui2');
  return mysqli_query($connect, "select * from data where username=$username and type=$type and status=$status");
}
?>