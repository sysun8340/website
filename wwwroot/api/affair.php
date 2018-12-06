<?php
require_once('../http/HttpHeaderResponse.php');
require_once('../databaseHandler/get_data.php');
require_once('../databaseHandler/add_data.php');
require_once('../databaseHandler/update_data.php');
require_once('../databaseHandler/delete_data.php');
require_once('../utils/convert_basedata_json.php');

$httpHeaderResponse = new HttpHeaderResponse();
$method = $_SERVER['REQUEST_METHOD'];
if($method === 'GET'){
  if(isset($_GET['username'])){
    $username = $_GET['username'];
    $type = $_GET['type'];
    $status = $_GET['status'];
    $connect = mysqli_connect('localhost', 'fengsuiyichui2', 'sysun8340');
    if(!$connect){
      $httpHeaderResponse -> setHttpHeaders(500);
      return;
    }
    $retval = get_data($connect, $username, $type, $status);
    if(!$retval){
      $httpHeaderResponse -> setHttpHeaders(500);
      return;
    }
    $httpHeaderResponse -> setHttpHeaders(200);
    echo convert_basedata_json($retval);
    return;
  }
}
if($method === 'POST'){
  parse_str(file_get_contents('php://input'), $data);
  if(count($data) > 0){
    $username = $data['username'];
    $content = $data['content'];
    $type = $data['type'];
    $status = $data['status'];
    $connect = mysqli_connect('localhost', 'fengsuiyichui2', 'sysun8340');
    if(!$connect){
      $httpHeaderResponse -> setHttpHeaders(500);
      return;
    }
    $retval = add_data($connect, $username, $content, $type, $status);
    if(!$retval){
      $httpHeaderResponse -> setHttpHeaders(500);
      return;
    }
    $httpHeaderResponse -> setHttpHeaders(200);
    echo convert_basedata_json($retval);
    return;
  }
}
if($method === 'PUT'){
  parse_str(file_get_contents('php://input'), $data);
  if(count($data) > 0){
    $id = $data['id'];
    $username = $data['username'];
    $type = $data['type'];
    $connect = mysqli_connect('localhost', 'fengsuiyichui2', 'sysun8340');
    if(!$connect){
      $httpHeaderResponse -> setHttpHeaders(500);
      return;
    }
    $retval = update_data($connect, $id, $username, $type);
    if(!$retval){
      $httpHeaderResponse -> setHttpHeaders(500);
      return;
    }
    $httpHeaderResponse -> setHttpHeaders(200);
    echo convert_basedata_json($retval);
    return;
  }
}
if($method === 'DELETE'){
  parse_str(file_get_contents('php://input'), $data);
  if(count($data) > 0){
    $username = $data['username'];
    $type = $data['type'];
    $connect = mysqli_connect('localhost', 'fengsuiyichui2', 'sysun8340');
    if(!$connect){
      $httpHeaderResponse -> setHttpHeaders(500);
      return;
    }
    $retval = delete_data($connect, $username, $type);
    if(!$retval){
      $httpHeaderResponse -> setHttpHeaders(500);
      return;
    }
    $httpHeaderResponse -> setHttpHeaders(200);
    echo convert_basedata_json($retval);
    return;
  }
}
$httpHeaderResponse -> setHttpHeaders(405);
?>