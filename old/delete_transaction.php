<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/coco/init/class/core/init.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $delete = new delete();
    $transId = decrypt($_POST['transId'], "_johnmarknavarro");
    $del = $delete->delete_transaction($transId);
    if(!$del == TRUE){
        echo '<script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';

      }else{
        echo '<script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';
    }
}

?>
