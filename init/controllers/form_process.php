<?php

$s_message = "";
$message = "";
if (!empty($_POST['submitr'])) {
    if ($_POST['name'] == "") {
        $message = 'Name field is required!';
    } else if ($_POST['s_num'] == "") {
        $message = 'Serial Number field is required!';
    } else if ($_POST['desc'] == "") {
        $message = 'Device Description field is required!';
    } else if ($_POST['dept'] == "") {
        $message = 'Department field is required!';
     }
     else {
        $s_message = 'Form Submitted';
        $conn = new class_model();
        $user = $conn->AddRecords($_POST['dept'],$_POST['office'],$_POST['cat'],$_POST['name'], $_POST['s_num'], 
        $_POST['desc'],$_POST['year'],$_POST['w_stat'],$_POST['stat'],$_POST['remarks']);
    }
}
?>