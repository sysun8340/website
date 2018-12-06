<?php
function update_data($connect, $id, $username, $type){
  mysqli_query($connect, "set names utf8");
  mysqli_select_db($connect, "fengsuiyichui2");
  mysqli_query($connect, "update data set status='completed' where id='$id'");
  return mysqli_query($connect, "select * from data where username=$username and type=$type and status='uncompleted'");
}
?>