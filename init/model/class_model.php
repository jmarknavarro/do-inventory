
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

		public function fetchAllData() 
		{
			{
				try {
					$db = DB();
					$sql = "SELECT * FROM `tbl_product`";
					$data = $db->prepare($sql);
					$data->execute();
					$rows = $data->fetchAll(PDO::FETCH_ASSOC);

					// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
					echo "<thead>";
					echo "<th></th>";
					echo "<th>Student Number</th>";
					echo "<th>First Name</th>";
					echo "<th>Last Name</th>";
					echo "<th>Attachment</th>";
					echo "<th>Actions</th>";
					echo "</thead>";
	
					foreach ($rows as $row) {
						$myfile = basename($row['fileName']);
						echo "<tr>";
						echo "<td><center><img src='$row[profilepic]' width='60px' height='auto' class='rounded'></center></td>";
						echo "<td>$row[stdNumber]</td>";
						echo "<td>$row[firstName]</td>";
						echo "<td>$row[lastName]</td>";
						echo "<td>$myfile
						</td>";
						echo "<td>
						<a class='btn text-center text-white btn-info btn-sm' data-toggle='modal' data-id='$row[id]'>View Profile</a>
						</td>";
						echo "</tr>";
					}
					echo "</table>";


				}  catch (PDOException $e) {
					echo $e->getMessage();
				}
			}
		}
	


	}	
?>