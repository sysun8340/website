<?php
function convert_basedata_json($basedata){
  $arr = array();
  $row = null;
  while($row = mysqli_fetch_array($basedata, MYSQLI_ASSOC)){
    array_push($arr, $row);
  }
  $data = array('data' => $arr);
  return json_encode($data, JSON_UNESCAPED_UNICODE);
}
