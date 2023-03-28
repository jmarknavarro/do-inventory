<?php
		require_once "../model/class_model.php";;

if (isset($_POST)) {
    $conn = new class_model();
    $del = $conn->deleteRecord($_POST['id']);
    if(!$del == TRUE){
        echo '<script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';

      }else{
        echo '<script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';
    }
}




?>