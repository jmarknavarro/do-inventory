<?php

if (isset($_POST['submitr'])) {
    $w_stat = $_POST['w_stat'];
    $stat = $_POST['stat'];
    $conn = new class_model();
    $submit = $conn->filterData($w_stat, $stat);
}   


?>