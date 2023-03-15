<?php
		require_once "../model/class_model.php";;
		if (isset($_POST)) {
			$conn = new class_model();
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			if ($username == "") {
				$msg = "Input Username";
			} elseif ($password == "") {
				$msg = "Input Password";
			} else {
				$user = $conn->Login($username, $password);
			}
		}
?>

