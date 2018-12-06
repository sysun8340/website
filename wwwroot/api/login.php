<?php
require_once('../http/HttpHeaderResponse.php');
require_once('../utils/check_token.php');

$httpHeaderResponse = new HttpHeaderResponse();
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST'){
  parse_str(file_get_contents('php://input'), $data);
  if(count($data) > 0){
    $username = $data['username'];
    $password = $data['password'];
    $token = $data['token'];
    $connect = mysqli_connect('localhost', 'fengsuiyichui2', 'sysun8340');
    if(!$connect){
      $httpHeaderResponse -> setHttpHeaders(500);
      return;
    }
    mysqli_query($connect, 'set names utf8');
    mysqli_select_db($connect, 'fengsuiyichui2');
    $chartName = 'account';
    $time = time();
    if(check_user_info($connect, $chartName, $username)){
      $newToken = gen_token($username, $password, $time);
      if(save_token_info($newToken, $time)){
        $httpHeaderResponse -> setHttpHeaders(200);
        echo json_encode(array('token' => $newToken, 'loginResponse' => 'success'), 
          JSON_UNESCAPED_UNICODE
        );
      }
    }
    else{
      $httpHeaderResponse -> setHttpHeaders(200);
      echo json_encode(array('loginResponse' => 'failed'));
    }
  }
  $httpHeaderResponse -> setHttpHeaders(405);
}
?>