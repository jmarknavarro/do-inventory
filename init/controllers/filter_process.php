<?php

if (isset($_POST['submitr'])) {
    $w_stat = $_POST['office'];
    $w_stat = $_POST['cat'];
    $w_stat = $_POST['w_stat'];
    $stat = $_POST['stat'];
    $conn = new class_model();
    $submit = $conn->filterData($office,$w_stat, $stat);
}   


?>