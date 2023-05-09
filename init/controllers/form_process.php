<?php

$s_message = "";
$message = "";



if (!empty($_POST['submitr'])) {
    $dept = $_POST['dept'];
    $office = $_POST['office'];
    $cat = $_POST['cat'];
    $name = $_POST['name'];
    $s_num = $_POST['s_num'];
    $desc = $_POST['desc'];
    $y_issued = $_POST['year'];
    $w_status = $_POST['w_stat'];
    $status = $_POST['stat'];
    $remarks = $_POST['remarks'];

    if (empty($name))  {
        $message = 'Name field is required!';
    } else if (empty($s_num)) {
        $message = 'Serial Number field is required!';
    } else if (empty($desc)) {
        $message = 'Device Description field is required!';
    } else if (empty($office)) {
        $message = 'Office field is required!';
    } else if (empty($cat)) {
        $message = 'Category field is required!';
    } else if (empty($dept)) {
        $message = 'Department field is required!';
    } 
    // else if (empty($y_issued)) {
    //     $message = 'Year Issued field is required!';
    // } 
    else if (empty($w_status)) {
        $message = 'Warranty Status field is required!';
    } else if (empty($status)) {
        $message = 'Status field is required!';
    }
     else {
        $s_message = 'Form Submitted';
        $conn = new class_model();
        $submit = $conn->AddRecords($dept,$office,$cat,$name, $s_num, 
                $desc,$y_issued,$w_status,$status,$remarks);
                if(!$submit==TRUE)
                {        echo '<script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';

                }
                    else{
                        echo '<script> setTimeout(function() {  window.history.go(-0); }, 2000); </script>';

                    
                }
              
    }   

 
}
?>