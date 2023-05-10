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


	public function AddRecords($dept, $office, $cat, $name, $s_num, $desc, $year = null, $w_stat, $stat, $remarks)
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
			$sql = "UPDATE `tbl_product` SET `is_archive` = '1' WHERE `id` = :id";
        	$data = $db->prepare($sql);
        	$data->execute(array(
				':id' => $id
			));
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function unArchiveRecord($id)
	{
		try {
			$db = DB(); 
			$sql = "UPDATE `tbl_product` SET `is_archive` = '0' WHERE `id` = :id";
        	$data = $db->prepare($sql);
        	$data->execute(array(
				':id' => $id
			));
		} catch (PDOException $e) {
			echo $e->getMessage();
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
				$sql = "SELECT *, (SELECT `d_name` FROM `tbl_dept` WHERE `tbl_dept`.`id`= `tbl_office`.`dept_id`) as deptname FROM `tbl_office`";
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

	public function fetchFilterOffice($id)
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_office`  WHERE `tbl_office`.`dept_id`= :id;";
				$data = $db->prepare($sql);
				$data->execute(array(
					':id' => $id
				));
				// Fetch the results and create an array of subcategories
				$subcategories = array();
				while($row = $data->fetch(PDO::FETCH_ASSOC)) {
  				$subcategory = array(
    			'dept_id' => $row['dept_id'],
    			'o_name' => $row['o_name']
  					);
  				array_push($subcategories, $subcategory);
				}

				// Return the subcategories as a JSON object
				echo json_encode($subcategories);

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
			echo $e->getMessage();
		}
	}

	public function years()
	{
		for ($i = date('Y'); $i >= 2005; $i--)
			echo '<option data-tokens=".' . $i . '." value="' . $i . '">' . $i . '</option>';
	}
	
	public function fetchAllData()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product` WHERE `is_archive` = 0 ORDER BY id ASC";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);
				echo "<div class='table-responsive'>";
				echo "<h6>All Devices</h6>";
				echo "<table id='table' style='width:100%' class='table table-hover table-striped mb-0 text-left'>";
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
					echo "<td class='text-center'>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					if($row['year_issued'] == '0000' || $row['year_issued'] == ''){echo "<td class='text-center'>N/A</td>";} else {echo "<td class='text-center'>$row[year_issued]</td>";};
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a title='Edit' class='btn text-center btn-sm' href='edit-record?id=$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
				 	<a title='Archive' class='btn text-center btn-action btn-sm delete my-1' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-archive' viewBox='0 0 16 16'>
					 <path d='M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z'/>
				   </svg>
					 </a>
					</td>";
					echo "</tr>";

				}
				echo "</table>";
				echo "</div>";

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
	public function fetchArchiveData()
	{ {
			try {
				$db = DB();
				$sql = "SELECT * FROM `tbl_product` WHERE `is_archive` = 1 ORDER BY id ASC";
				$data = $db->prepare($sql);
				$data->execute();
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);
				echo "<div class='table-responsive'>";
				echo "<h6>All Devices</h6>";
				echo "<table id='table' style='width:100%' class='table table-hover table-striped mb-0 text-left'>";
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
					echo "<td class='text-center'>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					if($row['year_issued'] == '0000' || $row['year_issued'] == ''){echo "<td class='text-center'>N/A</td>";} else {echo "<td class='text-center'>$row[year_issued]</td>";};
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a title='Edit' class='btn text-center btn-sm' href='edit-record?id=$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
				 	<a title='Archive' class='btn text-center btn-action btn-sm delete my-1' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-archive' viewBox='0 0 16 16'>
					 <path d='M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z'/>
				   </svg>
					 </a>
					</td>";
					echo "</tr>";

				}
				echo "</table>";
				echo "</div>";

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function filterData($dept = null, $office = null, $cat=null, $w_stats=null, $stat=null, $y_from=null, $y_to=null)
	{ {
			try {
				$db = DB();

				$sql = "SELECT * FROM `tbl_product` WHERE 1=1";

				if (!empty($dept)) {
					$sql .= " AND `dept_id` LIKE :dept";
				}
				if (!empty($office)) {
					$sql .= " AND `office_id` LIKE :office";
				}
				if (!empty($cat)) {
					$sql .= " AND `category_id` LIKE :cat";
				}
				if (!empty($w_stats)) {
					$sql .= " AND `warranty_status` = :w_stats";
				}
				if (!empty($stat)) {
					$sql .= " AND `status` = :stat";
				}
				if(!empty($y_from) && !empty($y_to)) {
					$sql .= " AND YEAR(year_issued) BETWEEN :y_from AND :y_to ORDER BY year_issued DESC";
				  }


				$data = $db->prepare($sql);
				if (!empty($dept)) {
					$data->bindValue(':dept', '%' . $dept . '%');
				}
				if (!empty($office)) {
					$data->bindValue(':office', $office);
				}
				if (!empty($cat)) {
					$data->bindValue(':cat', $cat);
				}
				if (!empty($w_stats)) {
					$data->bindValue(':w_stats', $w_stats);
				}
				if (!empty($stat)) {
					$data->bindValue(':stat', $stat);
				}
				if(!empty($y_from) && !empty($y_to)) {
					$data->bindValue(':y_from', $y_from);
					$data->bindValue(':y_to', $y_to);
				}
				$data->execute();	
				$rows = $data->fetchAll(PDO::FETCH_ASSOC);
				echo "<div class='table-responsive'>";
				echo "<h6>Filtered By</h6>";
				echo "<span class='badge app-filter-badge rounded-pill'>$dept</span><span class='badge app-filter-badge rounded-pill'>$office</span><span class='badge app-filter-badge rounded-pill'>$cat</span><span class='badge app-filter-badge rounded-pill'>$w_stats</span><span class='badge app-filter-badge rounded-pill'>$stat</span>";
				if($y_from == ''){} else { echo "<span class='badge app-filter-badge rounded-pill'>$y_from - $y_to</span>";}
				echo "<table id='result_table' style='width:100%' class='table table-hover table-striped mb-0 text-left'>";
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
					echo "<td class='text-center'>$row[category_id]</td>";
					echo "<td>$row[user_name]</td>";
					echo "<td>$row[serial_no]</td>";
					echo "<td>$row[product_name]</td>";
					if($row['year_issued'] == '0000' || $row['year_issued'] == ''){echo "<td class='text-center'>N/A</td>";} else {echo "<td class='text-center'>$row[year_issued]</td>";};
					echo "<td>$row[warranty_status]</td>";
					echo "<td>$row[status]</td>";
					echo "<td>$row[remarks]</td>";
					echo "<td>
					<a title='Edit' class='btn text-center btn-sm' href='edit-record?id=$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
					<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
					<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
				  </svg></a>
				 	<a title='Archive' class='btn text-center btn-action btn-sm delete my-1' data-id='$row[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-archive' viewBox='0 0 16 16'>
					 <path d='M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z'/>
				   </svg>
					 </a>
					</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "</div>";

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
	
	
}
?>