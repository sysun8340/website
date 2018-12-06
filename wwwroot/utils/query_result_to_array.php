<?php
function query_result_to_array($query_result){
  $arr = array();
  $row = null;
  while($row = mysqli_fetch_array($query_result, MYSQLI_ASSOC)){
    array_push($arr, $row);
  }
  return $arr;
}
?>