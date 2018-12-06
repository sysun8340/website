<?php
require_once('./query_result_to_array.php');

function get_token_info_from_database($connect, $chartName, $username){
  $retval = mysqli_query($connect, 
    "select token, last_login_time from $chartName where username=$username"
  );
  return query_result_to_array($retval);
}
?>