<?php
	
	require_once "../model/class_model.php";
   $conn = new class_model();
    $action = $_GET['action'];
    
	if(ISSET($_POST)){
	
		$user = trim($_POST['username']);
		$pass = trim($_POST['password']);

		
		$admin = $conn->login($user, $pass);
		if($admin['count'] > 0){
			session_start();
			$_SESSION['admin_id'] = $admin['admin_id'];
			echo 1;
		}else{
			echo 0;
		}
	}


 if($action == 'add_customer'){

 	$customer_name = trim($_POST['customer_name']);
	$contact_number = trim($_POST['contact_number']);
	$email = trim($_POST['email']);
	$address = trim($_POST['address']);

	  $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
      $idcardimg ="../uploads/". addslashes($_FILES['photo']['name']);
      $image_size = getimagesize($_FILES['photo']['tmp_name']);
           // move_uploaded_file($_FILES["images"]["tmp_name"], $images);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/SalesAndInventorySystem/uploads/" .   addslashes($_FILES["photo"]["name"]));


	$add = $conn->customer($customer_name, $contact_number, $email, $address, $idcardimg);
	if($add == TRUE){
		     echo '<div class="alert alert-success">Add Customer Successfully!</div><script> setTimeout(function() {  location.replace("customer"); }, 1000); </script>';
		    

		  }else{
		    echo '<div class="alert alert-danger">Add Customer Failed!</div><script> setTimeout(function() {  location.replace("customer"); }, 1000); </script>';

	
		}
    }
?>

