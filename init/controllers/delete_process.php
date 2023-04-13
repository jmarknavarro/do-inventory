<?php

if (isset($_POST)) {
    $conn = new class_model();
$del = $conn->deleteRecord($_POST['id']);

    }




?>