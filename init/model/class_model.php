
<?php

require 'config/connection.php';

class class_model
{
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


	public function AddRecords($dept, $office, $cat, $name, $s_num, $desc, $year, $w_stat, $stat, $remarks)
	{
		try {
			$db = DB();
			$sql = "INSERT INTO `tbl_product` (`dept_id`, `office_id`, `category_id`, `user_name`, `serial_no`, `product_name`, `year_issued`, `warranty_status`, 
			`status`, `remarks`) 
            VALUES ('$dept', '$office', '$cat', '$name', '$s_num', '$desc', '$year', '$w_stat', '$stat', '$remarks')";
			$query = $db->prepare($sql);
			$query->execute();
			return $db->lastInsertId();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function UpdateRecord($id, $dept, $office, $cat, $uname, $s_num, $pname, $year_i, $w_stat, $stat, $remarks)
	{
		try {
			$db = DB();
			$sql = "UPDATE `tbl_product` SET `dept_id` = :dept, `office_id` = :office, `category_id` = :cat,`user_name` = :uname, `serial_no` = :s_num, `product_name` = :pname, `year_issued` = :year_i, `warranty_status` = :w_stat, `status` = :stat, `remarks` = :remarks WHERE id = :id";
			$query = $db->prepare($sql);
			$query->execute(array(
				':id' => $id,
				':dept' => $dept,
				':office' => $office,
				':cat' => $cat,
				':s_num' => $s_num,
				':uname' => $uname,
				':pname' => $pname,
				':year_i' => $year_i,
				':w_stat' => $w_stat,
				':stat' => $stat,
				':remarks' => $remarks,
			));
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function deleteRecord($id)
	{
		try {
			$db = DB(); 
			$sql = "DELETE FROM `tbl_product` WHERE `id` = :id";
        	$data = $db->prepare($sql);
        	$data->execute(array(
				':id' => $id
			));
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	


	public function fetch_product($id)
	{
		try {
			$db = DB();
			$sql = "SELECT `dept_id`,`office_id`,`category_id`,`user_name`,`serial_no`,`product_name`,`year_issued`,`warranty_status`,`status`,`remarks` FROM `tbl_product` WHERE id = :id";
			$query = $db->prepare($sql);
			$query->bindParam("id", $id, PDO::PARAM_STR);
			$query->execute();
			if ($query->rowCount() > 0) {
				return $query->fetch(PDO::FETCH_OBJ);
			}
		} catch (PDOException $e) {
		}
	}

	public function fetchAllData()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";

				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' href='edit-record.php?id=$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
				 	<a title='Cancel Transaction' class='btn text-center btn-action btn-sm delete my-1' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
					 <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
					 <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
				   </svg>
					 </a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	// public function getAllD() {
	// 	try {
	// 		$db    = DB();
	// 		$sql   = "SELECT * FROM `tbl_admin` WHERE username = '$username' AND password = '$password'";
	// 		$query = $db->prepare($sql);
	// 		$query->execute();
	// 		$row = $query->fetch(PDO::FETCH_ASSOC);
	// 		if ($row > 0) {
	// 			session_start();
	// 			$_SESSION['user'] = $row['username']; // Set Session
	// 			echo 1;
	// 		} else {
	// 			echo "error";
	// 		}
	// 	} catch (PDOException $e) {
	// 		echo $e->getMessage();

	// 	}
	// }

	public function fetchAllLaptop()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `category_id` = 'Laptop'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					// if ($row[serial_no] == "") {
					// 	echo "No serial No."; 
					// } else {
					// 	echo
					// }
					echo "<td>$row[serial_no]</td>";

					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";

					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function osdsLaptop()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'OSDS' AND `category_id` = 'Laptop'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function cidLaptop()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'CID' AND `category_id` = 'Laptop'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center text-white btn-info btn-sm' data-toggle='modal' data-id='$row[id]'><i class='bi bi-pencil-square'></i></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function sgodLaptop()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'SGOD' AND `category_id` = 'Laptop'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
						<a class='btn text-center text-white btn-info btn-sm' data-toggle='modal' data-id='$row[id]'><i class='bi bi-pencil-square'></i></a>
						</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function fetchAllDesktop()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `category_id` = 'Desktop'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function sgodDesktop()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'SGOD' AND `category_id` = 'Desktop'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function osdsDesktop()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'OSDS' AND `category_id` = 'Desktop'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function cidDesktop()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'CID' AND `category_id` = 'Desktop'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}



	public function fetchAllPrinter()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `category_id` = 'Printer'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function fetchAllTablet()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `category_id` = 'Tablet'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	//tablet
	public function osdsTablet()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'OSDS' AND `category_id` = 'Tablet'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
	public function cidTablet()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'CID' AND `category_id` = 'Tablet'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function sgodTablet()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'SGOD' AND `category_id` = 'Tablet'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function OSDSPrinter()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'OSDS' AND `category_id` = 'Printer'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function cidPrinter()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'CID' AND `category_id` = 'Printer'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function SGODPrinter()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product`WHERE `dept_id` = 'SGOD' AND `category_id` = 'Printer'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function fetchDept()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_dept` WHERE `id` = 2 OR `id` = 3 OR `id` = 4";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_OBJ);
				foreach ($rows as $row) {
					echo '<option data-tokens=".' . $row->d_name . '." value="' . $row->d_name . '">' . $row->d_name . '</option>';
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function fetchOffice()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_office`";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_OBJ);
				foreach ($rows as $row) {
					echo '<option data-tokens=".' . $row->o_name . '." value="' . $row->o_name . '">' . $row->o_name . '</option>';
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function fetchCategory()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_category`";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_OBJ);
				foreach ($rows as $row) {
					echo '<option data-tokens=".' . $row->c_name . '." value="' . $row->c_name . '">' . $row->c_name . '</option>';
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function OSDS()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product` WHERE `dept_id` = 'OSDS'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function CID()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product` WHERE `dept_id` = 'CID'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";
				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function fetchUnit($dept, $office)
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product` WHERE `dept_id` = '$dept' AND `office_id` = '$office'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	
	
	public function SGOD()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product` WHERE `dept_id` = 'SGOD'";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);

				// echo "<table id='example1' class='table table-striped table-bordered no-wrap'>";
				echo "<thead>";
				echo "<th>Department</th>";
				echo "<th>Office/Unit</th>";
				echo "<th>Category</th>";
				echo "<th>User's Name</th>";
				echo "<th>Serial No.</th>";
				echo "<th>Device Description</th>";
				echo "<th>Year Issued</th>";
				echo "<th>Warranty Status</th>";
				echo "<th>Status</th>";
				echo "<th>Remarks</th>";
				echo "<th>Action</th>";
				echo "</thead>";

				foreach ($rows as $row) {

					echo "<tr>";
					echo "<td>$row[dept_id]</td>";
					echo "<td>$row[office_id]</td>";
					echo "<td>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					echo "<td>$row[year_issued]</td>";
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a class='btn text-center btn-sm' data-toggle='modal' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
					</td>";
					echo "</tr>";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	
	public function years()
	{
		for ($i = date('Y'); $i >= 2005; $i--)
			echo '<option data-tokens=".' . $i . '." value="' . $i . '">' . $i . '</option>';
	}
}
?>