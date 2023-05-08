<?php
require_once "../model/class_model.php";;
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $view = new class_model();
$view->fetchFilterOffice($id);
 }
?>