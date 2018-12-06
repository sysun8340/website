<?php
function delete_data($connect, $username, $type){
  mysqli_query($connect, "set names utf8");
  mysqli_select_db($connect, "fengsuiyichui2");
  mysqli_query($connect, "delete from data where username=$username and type=$type and status='completed'");
  return mysqli_query($connect, "select * from data where username=$username and type=$type and status='completed'");
}
?>