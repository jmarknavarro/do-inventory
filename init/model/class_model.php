
<?php

	require 'config/connection.php';

	class class_model{
		public function Login($username, $password)
		{
			try {
				$db    = DB();
				$sql   = "SELECT * FROM `tbl_admin` WHERE username = '$username' AND password = '$password'";
				$query = $db->prepare($sql);
				$query->execute();
				$row = $query->fetch(PDO::FETCH_ASSOC);
				if ($row > 0) {
					session_start();
					$_SESSION['user'] = $row['username']; // Set Session
					echo 1;
				} else {
					echo "error";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
	
			}
		}
	


	}	
?>