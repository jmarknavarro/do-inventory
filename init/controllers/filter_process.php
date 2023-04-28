<?php

$s_message = "";
$message = "";



if (!empty($_GET['submitr'])) {
    $office = $_GET['office'];
    $cat = $_GETT['cat'];
    $w_status = $_GET['w_stat'];
    $status = $_GET['stat'];
    
    $conn = new class_model();
    $submit = $conn->filterData($office, $cat, $w_stat, $stat);
    var_dump($submit);
    if(!$submit==TRUE){        
        echo '<script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';
    }
    else{
        echo '<script> setTimeout(function() {  window.history.go(-0); }, 2000); </script>';
    }
}   


?>