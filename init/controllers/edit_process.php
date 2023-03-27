<?php

$s_message = "";
$message = "";
if (!empty($_POST['submitr'])) {
    if ($_POST['uname'] == "") {
        $message = 'Name field is required!';
    } else if ($_POST['s_num'] == "") {
        $message = 'Serial Number field is required!';
    } else if ($_POST['pname'] == "") {
        $message = 'Device Description field is required!';
    } else if ($_POST['dept'] == "") {
        $message = 'Department field is required!';
     }
     else {
        $s_message = 'Form Updated';
        $conn = new class_model();
        $user = $conn->EditRecords($_POST['id'], $_POST['dept'],$_POST['office'],$_POST['cat'],$_POST['uname'], $_POST['s_num'], 
        $_POST['pname'],$_POST['yissued'],$_POST['w_stat'],$_POST['stat'],$_POST['remarks']);
    }
}
?>