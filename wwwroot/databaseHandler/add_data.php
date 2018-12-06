<?php
function add_data($connect, $username, $content, $type, $status){
  mysqli_query($connect, 'set names utf8');
  mysqli_select_db($connect, 'fengsuiyichui2');
  mysqli_query($connect, "insert into data(
    username, content, type, status, date
  )
  values
  (
    $username, $content, $type, $status, now()
  )");
  return mysqli_query($connect, "select * from data where username=$username and type=$type and status='uncompleted'");
}
?>