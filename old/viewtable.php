<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/coco/init/class/core/init.php';
require_once 'config.php';

class viewtable extends config{

 /////////////////////////////////// VIEW LOGS /////////////////////////////////////////
public function viewLogs($user_id){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `user_id` = :id";
  $data= $con->prepare($sql);
  $data->bindParam("id", $user_id, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
    $hash_id = encrypt($data['id'], "_johnmarknavarro");
    $hash_transid = encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  // echo "<td>$data[status]</td>";
  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  }  else if($data['status'] == 'APPROVED'){
      echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-light'>Cancelled</span></td>";
  };
  if($data['type'] == 'CCG'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='ccg-students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    </td>";
  } else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    </td>";
  };

  echo "</tr>";
  }

}


// ====================================================== //
// ============= View Transaction List COG ============== //
// ====================================================== //
public function viewTransactionCOG($user_id){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COG' AND `status` IN ('SUBMITTED', 'PENDING','REJECTED', 'APPROVED' ) AND `user_id` = :id";
  $data= $con->prepare($sql);
  $data->bindParam("id", $user_id, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>Term</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
    $hash_id = encrypt($data['id'], "_johnmarknavarro");
    $hash_transid = encrypt($data['transId'], "_johnmarknavarro");
    $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td>
  <a class='text-center text-body font-weight-medium' href='students?id=$data[transId]&classcode=$data[clCode]'>$data[transId]</a>";
  echo "</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[term]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  // echo "<td>$data[status]</td>";
  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  }  else if($data['status'] == 'APPROVED'){
      echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-light'>Cancelled</span></td>";
  };
  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a title='Edit Transaction' class='btn text-center btn-action btn-sm my-1 edit_T' data-target='#edit-transaction' data-toggle='modal'  href='' data-id='$hash_id'><i data-feather='edit' class='svg-icon'></i></a>
    <a title='Cancel Transaction' class='btn text-center btn-action btn-sm delete my-1' data-id='$hash_transid' href='javascript:;'><i data-feather='x' class='svg-icon'></i></a>

   </td>";
  } else if($data['status'] == 'REJECTED') {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a title='View Transaction Details' class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' href='' data-id='$hash_id'><i data-feather='info' class='svg-icon'></i></a>

    </td>";
  }else if($data['status'] == 'PENDING') {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a title='View Transaction Details' class='btn text-center btn-action btn-sm my-1 approve_D'  data-target='#approve-details' data-toggle='modal' href='' data-id='$hash_id' ><i data-feather='info' class='svg-icon'></i></a>

    </td>";
  } 
  else if($data['status'] == 'APPROVED') {
    echo "<td class='text-center'>

     <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
     <a title='View Transaction Details' class='btn text-center btn-action btn-sm my-1 approve_D' data-id='$hash_id' data-target='#approve-details' data-toggle='modal' href=''><i data-feather='info' class='svg-icon'></i></a>
     <a title='Download PDF' class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  }  else {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a disabled class='btn text-center btn-light btn-sm my-1' ><i data-feather='info' class='svg-icon'></i></a>

    </td>";
  };
  echo "</tr>";
  }

}


public function viewStudents($id,$clcode,$user_id){
  $con = $this->con();
  $sql =  "SELECT a.*, b.`status` FROM `tbl_grades` AS a INNER JOIN `tbl_transaction` AS b ON a.`transId`= b.`transId`
  WHERE b.`transId` = :id AND  b.`clCode` = :clcode AND b.`user_id` = :userId";
  $data= $con->prepare($sql);
  $data->bindParam("id", $id, PDO::PARAM_STR);  
  $data->bindParam("clcode", $clcode, PDO::PARAM_STR);
  $data->bindParam("userId", $user_id, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead>";
      echo "<tr><th colspan='2'</th><th colspan='3' class='font-12 font-weight-medium text-muted text-center'>Lecture</th>";
      echo "<th colspan='4' class='font-12 font-weight-medium text-muted text-center'>Laboratory</th>";
      echo "<th colspan='5'></th></th>";
      echo "</tr>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Student Name</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Course</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center' >Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Weighted Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>1st Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>2nd Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>3rd Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Final Rating</th>";
  echo "<th></th>";
  echo "</thead>";
      foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr class='font-14 text-center'>";
  echo "<td class='font-weight-medium'>$data[stdName]</td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[clPartLec]</td>";
  echo "<td>$data[perExLec]</td>";
  echo "<td>$data[perGrLec]</td>";
  echo "<td>$data[clPartLab]</td>";
  echo "<td>$data[perExLab]</td>";
  echo "<td>$data[perGrLab]</td>";
  echo "<td>$data[weiGr]</td>";
  echo "<td>$data[onePerGr]</td>";
  echo "<td>$data[twoPerGr]</td>";
  echo "<td>$data[threePerGr]</td>";
  echo "<td>$data[finRate]</td>";
  if ($data['status'] == 'SUBMITTED') {
      echo "<td class='text-center'>
  <a class='btn btn-action btn-sm delete-std  mx-2 my-1' href='javascript:;' data-id='$hash_id'><i data-feather='trash' class='svg-icon'></i></a>
   </td>";
  }else{ echo "<td></td>";
  };
  echo "</tr>";
  }
}   



public function viewAllStudents($id,$clcode){
  $con = $this->con();
  $sql =  "SELECT * FROM `tbl_grades` WHERE `transId` = :id AND  `clCode` = :clcode";
  $data= $con->prepare($sql);
  $data->bindParam("id", $id, PDO::PARAM_STR);  
  $data->bindParam("clcode", $clcode, PDO::PARAM_STR);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead>";
      echo "<tr><th colspan='2'</th><th colspan='3' class='font-12 font-weight-medium text-muted text-center'>Lecture</th>";
      echo "<th colspan='4' class='font-12 font-weight-medium text-muted text-center'>Laboratory</th><th colspan='5'</th></tr>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Student Name</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Course</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center' >Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Weighted Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>1st Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>2nd Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>3rd Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Final Rating</th>";
  // echo "<th></th>";
  echo "</thead>";
      foreach ($result as $data) {
  echo "<tr class='font-14 text-center'>";
  echo "<td class='font-weight-medium'>$data[stdName]</td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[clPartLec]</td>";
  echo "<td>$data[perExLec]</td>";
  echo "<td>$data[perGrLec]</td>";
  echo "<td>$data[clPartLab]</td>";
  echo "<td>$data[perExLab]</td>";
  echo "<td>$data[perGrLab]</td>";
  echo "<td>$data[weiGr]</td>";
  echo "<td>$data[onePerGr]</td>";
  echo "<td>$data[twoPerGr]</td>";
  echo "<td>$data[threePerGr]</td>";
  echo "<td>$data[finRate]</td>";
  // echo "<td class='text-center'>
  // <a class='btn btn-action btn-sm delete-std  mx-2 my-1' href='javascript:;' data-id='$data[id]'><i data-feather='trash' class='svg-icon'></i></a>
  //  </td>";
  // <a class='btn text-center btn-action btn-sm delete my-1' href='javascript:;' data-id='$data[transId]'><i data-feather='trash' class='svg-icon'></i></a>
  echo "</tr>";
  }
}   


public function viewAllStudentsCCG($id,$clcode){
  $con = $this->con();
  $sql =  "SELECT * FROM `tbl_grades` WHERE `transId` = :id AND  `clCode` = :clcode";
  $data= $con->prepare($sql);
  $data->bindParam("id", $id, PDO::PARAM_STR);  
  $data->bindParam("clcode", $clcode, PDO::PARAM_STR);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead>";
  echo "<tr><th colspan='2'</th><th colspan='3' class='font-12 font-weight-medium text-muted text-center'>Lecture</th>";
  echo "<th colspan='4' class='font-12 font-weight-medium text-muted text-center'>Laboratory</th><th colspan='4' class='font-12 font-weight-medium text-muted text-center'>Corrected Grades</th><th colspan='4'</th></tr>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Student Name</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Course</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center' >Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Weighted Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Weighted Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>1st Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>2nd Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>3rd Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Final Rating</th>";
  echo "</thead>";
      foreach ($result as $data) {
  echo "<tr class='font-14 text-center'>";
  echo "<td class='font-weight-medium'>$data[stdName]</td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[clPartLec]</td>";
  echo "<td>$data[perExLec]</td>";
  echo "<td>$data[perGrLec]</td>";
  echo "<td>$data[clPartLab]</td>";
  echo "<td>$data[perExLab]</td>";
  echo "<td>$data[perGrLab]</td>";
  echo "<td>$data[weiGr]</td>";
  echo "<td>$data[clPartCor]</td>";
  echo "<td>$data[perExCor]</td>";
  echo "<td>$data[perGrCor]</td>";
  echo "<td>$data[weiGrCor]</td>";
  echo "<td>$data[onePerGr]</td>";
  echo "<td>$data[twoPerGr]</td>";
  echo "<td>$data[threePerGr]</td>";
  echo "<td>$data[finRate]</td>";
  // echo "<td class='text-center'>
  // <a class='btn btn-action btn-sm delete-std  mx-2 my-1' href='javascript:;' data-id='$data[id]'><i data-feather='trash' class='svg-icon'></i></a>
  //  </td>";
  // <a class='btn text-center btn-action btn-sm delete my-1' href='javascript:;' data-id='$data[transId]'><i data-feather='trash' class='svg-icon'></i></a>
  echo "</tr>";
  }
}   

// ====================================================== //
// ============ View Transaction List COGP ============== //
// ====================================================== //
public function viewTransactionCOGP($user_id){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COGP' AND `status` IN ('SUBMITTED', 'PENDING','REJECTED', 'APPROVED' ) AND `user_id` = :id";
  $data= $con->prepare($sql);
  $data->bindParam("id", $user_id, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
    $hash_id = encrypt($data['id'], "_johnmarknavarro");
    $hash_transid = encrypt($data['transId'], "_johnmarknavarro");
    $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td>
  <a class='text-center text-body font-weight-medium' href='students?id=$data[transId]&classcode=$data[clCode]'>$data[transId]</a>";
  echo "</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  // echo "<td>$data[status]</td>";
  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  }  else if($data['status'] == 'APPROVED'){
      echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-light'>Cancelled</span></td>";
  };
  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a title='Edit Transaction' class='btn text-center btn-action btn-sm my-1 edit_T' data-target='#edit-transaction' data-toggle='modal' href='' data-id='$hash_id' ><i data-feather='edit' class='svg-icon'></i></a>
  <a title='Cancel Transaction' class='btn text-center btn-action btn-sm delete my-1' data-id='$hash_transid' href='javascript:;'><i data-feather='x' class='svg-icon' ></i></a>

   </td>";
  } else if($data['status'] == 'REJECTED') {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
     <a title='View Transaction Details' class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' href='' data-id='$hash_id' ><i data-feather='info' class='svg-icon'></i></a>

    </td>";
  }else if($data['status'] == 'PENDING') {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
     <a title='View Transaction Details' class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve-details' data-toggle='modal' href='' data-id='$hash_id' ><i data-feather='info' class='svg-icon'></i></a>

    </td>";
  } 
  else if($data['status'] == 'APPROVED') {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
     <a title='View Transaction List' class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve-details' data-toggle='modal' href='' data-id='$hash_id' ><i data-feather='info' class='svg-icon'></i></a>
     <a title='Download PDF' class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  }  else {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a disabled class='btn text-center btn-light btn-sm my-1' ><i data-feather='info' class='svg-icon'></i></a>

    </td>";
  };
  echo "</tr>";
  }

}

// ====================================================== //
// ============== View Transaction List CCG ============= //
// ====================================================== //
public function viewTransactionCCG($user_id){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `status` IN ('SUBMITTED', 'PENDING','REJECTED', 'APPROVED' ) AND `user_id` = :id";
  $data= $con->prepare($sql);
  $data->bindParam("id", $user_id, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
    $hash_id = encrypt($data['id'], "_johnmarknavarro");
    $hash_transid = encrypt($data['transId'], "_johnmarknavarro");
    $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td>
  <a class='text-center text-body font-weight-medium' href='students?id=$data[transId]&classcode=$data[clCode]'>$data[transId]</a>";
  echo "</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  }  else if($data['status'] == 'APPROVED'){
      echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-light'>Cancelled</span></td>";
  };
  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a title='Edit Transaction' class='btn text-center btn-action btn-sm my-1 edit_T' data-target='#edit-transaction' data-toggle='modal' href='' data-id='$hash_id' ><i data-feather='edit' class='svg-icon'></i></a>
    <a title='Cancel Transaction' class='btn text-center btn-action btn-sm delete my-1' data-id='$hash_transid' href='javascript:;'><i data-feather='x' class='svg-icon'></i></a>

   </td>";
  } else if($data['status'] == 'REJECTED') {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
     <a title='View Transaction Detail' class='btn text-center btn-action btn-sm my-1 decline_D' data-id='$hash_id' data-target='#decline-details' data-toggle='modal' href=''><i data-feather='info' class='svg-icon'></i></a>

    </td>";
  }else if($data['status'] == 'PENDING') {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
     <a title='View Transaction Details' class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve-details' data-toggle='modal' href='' data-id='$hash_id' ><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  } 
  else if($data['status'] == 'APPROVED') {
    echo "<td class='text-center'>
    <a title='View Student List' class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
     <a title='View Transaction Details' class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve-details' data-toggle='modal' href='' data-id='$hash_id' ><i data-feather='info' class='svg-icon'></i></a>
     <a title='Download PDF' class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  }  else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a disabled class='btn text-center btn-light btn-sm my-1' ><i data-feather='info' class='svg-icon'></i></a>

    </td>";
  };
  echo "</tr>";
  }

}

// ====================================================== //
// ============== View Students List CCG ================ //
// ====================================================== //
public function viewStudentsCCG($id,$clcode,$user_id){
  $con = $this->con();
  $sql =  "SELECT a.*, b.`status` FROM `tbl_grades` AS a INNER JOIN `tbl_transaction` AS b ON a.`transId`= b.`transId`
  WHERE b.`transId` = :id AND  b.`clCode` = :clcode AND b.`user_id` = :userId";
  $data= $con->prepare($sql);
  $data->bindParam("id", $id, PDO::PARAM_STR);  
  $data->bindParam("clcode", $clcode, PDO::PARAM_STR);
  $data->bindParam("userId", $user_id, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead>";
  echo "<tr><th colspan='2'</th><th colspan='3' class='font-12 font-weight-medium text-muted text-center'>Lecture</th>";
  echo "<th colspan='4' class='font-12 font-weight-medium text-muted text-center'>Laboratory</th><th colspan='4' class='font-12 font-weight-medium text-muted text-center'>Corrected Grades</th>";
  echo "<th colspan='5'></th></th>";
  echo "</tr>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Student Name</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Course</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center' >Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Weighted Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Class Part</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Exam</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Weighted Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>1st Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>2nd Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>3rd Period Grade</th>";
  echo "<th class='font-12 font-weight-medium text-muted text-center'>Final Rating</th>";
  echo "<th></th>";
  echo "</thead>";
      foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr class='font-14 text-center'>";
  echo "<td class='font-weight-medium'>$data[stdName]</td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[clPartLec]</td>";
  echo "<td>$data[perExLec]</td>";
  echo "<td>$data[perGrLec]</td>";
  echo "<td>$data[clPartLab]</td>";
  echo "<td>$data[perExLab]</td>";
  echo "<td>$data[perGrLab]</td>";
  echo "<td>$data[weiGr]</td>";
  echo "<td>$data[clPartCor]</td>";
  echo "<td>$data[perExCor]</td>";
  echo "<td>$data[perGrCor]</td>";
  echo "<td>$data[weiGrCor]</td>";
  echo "<td>$data[onePerGr]</td>";
  echo "<td>$data[twoPerGr]</td>";
  echo "<td>$data[threePerGr]</td>";
  echo "<td>$data[finRate]</td>";
  if ($data['status'] == 'SUBMITTED') {
      echo "<td class='text-center'>
  <a class='btn btn-action btn-sm delete-std  mx-2 my-1' href='javascript:;' data-id='$hash_id'><i data-feather='trash' class='svg-icon'></i></a>
   </td>";
  }else{  echo "<td></td>";
  };
  echo "</tr>";
  }
}   


// ====================================================== //
// =================== SRA Pending Tab COG ============== //
// ====================================================== //
public function sraPendingTransactionCOG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COG' AND `RequestStatus` = 'SRA' AND `status` = 'SUBMITTED'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>Term</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[term]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>

     </td>";
  };
  
  echo "</tr>";
  }
}

// ====================================================== //
// =================== SRA Verfied Tab COG ============== //
// ====================================================== //
public function sraVerifiedTransactionCOG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COG' AND `status` = 'PENDING' AND `RequestStatus` IN ('REGISTRAR','SRA');";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>Term</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[term]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'><span class='badge badge-warning'>Ready for encoding</span></td>";
  }else if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  };
  if($data['RequestStatus'] == 'SRA'){
 
   echo "<td class='text-center'>
   <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
   <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve2-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
   <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else if ($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  }
  else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  };
  echo "</tr>";
  }
}


// ====================================================== //
// ================= SRA Rejected Tab COG ============== //
// ====================================================== //
public function sraRejectedTransactionCOG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COG' AND `status` = 'REJECTED' AND `RequestStatus` = 'SRA'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>Tern</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[term]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-primary'>Submitted</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>Pending</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  echo "</tr>";
  }
}


// ====================================================== //
// ================= SRA Completed Tab COG ============== //
// ====================================================== //
public function sraCompletedTransactionCOG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'COG' AND `status` = 'APPROVED' AND `isVerified` = 1";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>Term</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[term]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve3-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  };
  echo "</tr>";
  }
}




// ====================================================== //
// ============== Registrar Pending Tab COG ============= //
// ====================================================== //
public function registrarPendingTransactionCOG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COG' AND `RequestStatus` = 'REGISTRAR' AND `status` = 'PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>Term</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[term]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>

     </td>";
  };
  
  echo "</tr>";
  }
}


// ====================================================== //
// ============ Registrar On Going Tab COG ============= //
// ====================================================== //
public function registrarOngoingTransactionCOG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'COG' AND  `RequestStatus` = 'SRA' AND `status` = 'PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>Term</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[term]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve3-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  };
  echo "</tr>";
  }
}


public function registrarCompletedTransactionCOG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'COG' AND `status` = 'APPROVED' AND `isVerified` = 1";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>Term</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_transid = crypto::encrypt($data['transId'], "_johnmarknavarro");
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[term]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#completed-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  };
  echo "</tr>";
  }
}


// ====================================================== //
// ============= Registrar Rejected Tab COG ============= //
// ====================================================== //
public function registarRejectedTransactionCOG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COG' AND `status` = 'REJECTED' AND `RequestStatus` = 'REGISTRAR'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>Term</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[term]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-primary'>Submitted</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>Pending</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  echo "</tr>";
  }
}





// ====================================================== //
// ============== Dean Pending Tab COGP ================ //
// ====================================================== //
public function deanPendingTransactionCOGP($college){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COGP' AND `RequestStatus` = 'DEAN' AND `status` = 'SUBMITTED' AND `collegedept` = :college";
  $data= $con->prepare($sql); 
  $data->bindParam("college", $college, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'DEAN'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'DEAN'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>

     </td>";
  };
  
  echo "</tr>";
  }
}

// ====================================================== //
// ============= Dean Ongoing Tab COGP ================ //
// ====================================================== //
public function deanOngoingTransactionCOGP($college){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'COGP' AND  `RequestStatus` = 'SRA' AND `status` = 'PENDING' AND `collegedept` = :college";
  $data= $con->prepare($sql);
  $data->bindParam("college", $college, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve3-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
    
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION NEEDED</h6>
   </td>";
  };
  echo "</tr>";
  }
}


// ====================================================== //
// ============= Dean Completed Tab COGP ================ //
// ====================================================== //
public function deanCompletedTransactionCOGP($college){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'COGP' AND `status` = 'APPROVED' AND `isVerified` = 1";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#completed-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  };
  echo "</tr>";
  }
}


// ====================================================== //
// ============== Dean Rejected Tab COGP ================ //
// ====================================================== //
public function deanRejectedTransactionCOGP($college){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COGP' AND `status` = 'REJECTED' AND `RequestStatus` = 'DEAN' AND `collegedept` = :college";
  $data= $con->prepare($sql);
  $data->bindParam("college", $college, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-primary'>Submitted</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>Pending</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  echo "</tr>";
  }
}



// ====================================================== //
// ================ SRA Pending Tab COGP ================ //
// ====================================================== //
public function sraPendingTransactionCOGP(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COGP' AND `RequestStatus` = 'SRA' AND `status` = 'PENDING'";
  $data= $con->prepare($sql); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>

     </td>";
  };
  
  echo "</tr>";
  }
}

// ====================================================== //
// ================ SRA Verified Tab COGP =============== //
// ====================================================== //
public function sraVerifiedTransactionCOGP(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COGP' AND `status` = 'PENDING' AND `RequestStatus` IN ('REGISTRAR','SRA2');";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'SRA2'){
    echo "<td class='text-center'><span class='badge badge-warning'>Ready for encoding</span></td>";
  }else if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  };
  if($data['RequestStatus'] == 'SRA2'){
 
   echo "<td class='text-center'>
   <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
   <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve2-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
   <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else if ($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  }
  else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  };
  echo "</tr>";
  }
}

// ====================================================== //
// =============== SRA Completed Tab COGP =============== //
// ====================================================== //
public function sraCompletedTransactionCOGP(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'COGP' AND `status` = 'APPROVED' AND `isVerified` = 1";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve3-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  };
  echo "</tr>";
  }
}

// ====================================================== //
// ================ SRA Rejected Tab COGP =============== //
// ====================================================== //
public function sraRejectedTransactionCOGP(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COGP' AND `status` = 'REJECTED' AND `RequestStatus` = 'SRA'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-primary'>Submitted</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>Pending</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  echo "</tr>";
  }
}


// ====================================================== //
// ============= Registrar Pending Tab COGP ============= //
// ====================================================== //
public function registrarPendingTransactionCOGP(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COGP' AND `RequestStatus` = 'REGISTRAR' AND `status` = 'PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>

     </td>";
  };
  
  echo "</tr>";
  }
}

// ====================================================== //
// ============ Registrar Completed Tab COGP ============ //
// ====================================================== //
public function registrarOngoingTransactionCOGP(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'COGP' AND  `RequestStatus` = 'SRA2' AND `status` = 'PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'SRA2'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'SRA2'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve3-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
    
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  };
  echo "</tr>";
  }
}

// ====================================================== //
// ============ Registrar Completed Tab COGP ============ //
// ====================================================== //
public function registrarCompletedTransactionCOGP(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'COGP' AND `status` = 'APPROVED' AND `isVerified` = 1";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#completed-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  };
  echo "</tr>";
  }
}


// ====================================================== //
// ============= Registrar Rejected Tab COGP ============ //
// ====================================================== //
public function registarRejectedTransactionCOGP(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'COGP' AND `status` = 'REJECTED' AND `RequestStatus` = 'REGISTRAR'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-primary'>Submitted</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>Pending</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  echo "</tr>";
  }
}




// ====================================================== //
// ============== Dean Pending Tab COGP ================ //
// ====================================================== //
public function deanPendingTransactionCCG($college){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `RequestStatus` = 'DEAN' AND `status` = 'SUBMITTED' AND `collegedept` = :college";
  $data= $con->prepare($sql); 
  $data->bindParam("college", $college, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'DEAN'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'DEAN'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>

     </td>";
  };
  
  echo "</tr>";
  }
}

// ====================================================== //
// ============= Dean Ongoing Tab CCG ================ //
// ====================================================== //
public function deanOngoingTransactionCCG($college){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'CCG' AND  `RequestStatus` = 'VP' AND `status` = 'PENDING' AND `collegedept` = :college";
  $data= $con->prepare($sql);
  $data->bindParam("college", $college, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'VP'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'VP'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve3-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION NEEDED</h6>
   </td>";
  };
  echo "</tr>";
  }
}


// ====================================================== //
// ============= Dean Ongoing Tab CCG ================ //
// ====================================================== //
public function deanCompletedTransactionCCG($college){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'CCG' AND `status` = 'APPROVED' AND `isVerified` = 1";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#completed-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  };
  echo "</tr>";
  }
}



// ====================================================== //
// ============== Dean Rejected Tab CCG= ================ //
// ====================================================== //
public function deanRejectedTransactionCCG($college){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `status` = 'REJECTED' AND `RequestStatus` = 'DEAN' AND `collegedept` = :college";
  $data= $con->prepare($sql);
  $data->bindParam("college", $college, PDO::PARAM_STR); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-primary'>Submitted</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>Pending</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  echo "</tr>";
  }
}


// ====================================================== //
// ==================== VP Pending Tab CCG ============== //
// ====================================================== //
public function vpPendingTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `RequestStatus` = 'VP' AND `status` = 'PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'VP'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'VP'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>

     </td>";
  };
  
  echo "</tr>";
  }
}


public function vpOngoingTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'CCG' AND  `RequestStatus` = 'REGISTRAR' AND `status` = 'PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve3-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  };
  echo "</tr>";
  }
}

public function vpCompletedTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'CCG' AND `status` = 'APPROVED' AND `isVerified` = 1";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#completed-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  };
  echo "</tr>";
  }
}




// ====================================================== //
// ================ VP Rejected Tab CCG ================ //
// ====================================================== //
public function vpRejectedTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `status` = 'REJECTED' AND `RequestStatus` = 'VP'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-primary'>Submitted</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>Pending</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  echo "</tr>";
  }
}


// ====================================================== //
// ============= Registrar Pending Tab CCG ============= //
// ====================================================== //
public function registrarPendingTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `RequestStatus` = 'REGISTRAR' AND `status` = 'PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>

     </td>";
  };
  
  echo "</tr>";
  }
}


// ====================================================== //
// ============ Registrar Ongoing Tab CCG- ============ //
// ====================================================== //
public function registrarOngoingTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'CCG' AND  `RequestStatus` = 'SRA' AND `status` = 'PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'><span class='badge badge-info'>In Progress</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve3-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }; 
  echo "</tr>";
  }
}


// ====================================================== //
// ============ Registrar Completed Tab CCG- ============ //
// ====================================================== //
public function registrarCompletedTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'CCG' AND `status` = 'APPROVED' AND `isVerified` = 1";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#completed-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  };
  echo "</tr>";
  }
}


// ====================================================== //
// ============= Registrar Rejected Tab CCG -============ //
// ====================================================== //
public function registarRejectedTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `status` = 'REJECTED' AND `RequestStatus` = 'REGISTRAR'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-primary'>Submitted</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>Pending</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  echo "</tr>";
  }
}

// ====================================================== //
// ================ SRA Pending Tab CCG ================= //
// ====================================================== //
public function sraPendingTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `RequestStatus` = 'SRA' AND `status` = 'PENDING'";
  $data= $con->prepare($sql); 
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  }else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'SRA'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
  <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>

     </td>";
  };
  
  echo "</tr>";
  }
}

// ====================================================== //
// ================ SRA Verified Tab COGP =============== //
// ====================================================== //
public function sraVerifiedTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `status` = 'PENDING' AND `RequestStatus` IN ('SRA2');";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['RequestStatus'] == 'SRA2'){
    echo "<td class='text-center'><span class='badge badge-warning'>Ready for encoding</span></td>";
  }else if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-warning'>Pending</span></td>";
  };
  if($data['RequestStatus'] == 'SRA2'){
 
   echo "<td class='text-center'>
   <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
   <a class='btn text-center btn-action btn-sm my-1 approve_T' data-target='#approve2-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='check' class='svg-icon'></i></a>
   <a class='btn text-center btn-action btn-sm my-1 deny_T' data-target='#deny-transaction' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='x' class='svg-icon'></i></a>
   </td>";
  }else if ($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  }
  else {
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  };
  echo "</tr>";
  }
}

// ====================================================== //
// =============== SRA Completed Tab CCG ================ //
// ====================================================== //
public function sraCompletedTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE  `type` = 'CCG' AND `status` = 'APPROVED' AND `isVerified` = 1";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  $hash_transid2 = crypto::encrypt($data['transId'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

 if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'><span class='badge badge-info'>Waiting for Registrar</span></td>";
  }
  else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  if($data['RequestStatus'] == 'REGISTRAR'){
    echo "<td class='text-center'>
    <h6 class='text-muted'>NO ACTION</h6>
   </td>";
  }else {
    echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 approve_D' data-target='#approve3-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1' href='pdf/pdf?d=$hash_transid2'><i data-feather='download' class='svg-icon'></i></a>
    </td>";
  };
  echo "</tr>";
  }
}

// ====================================================== //
// ================ SRA Rejected Tab CCG ================ //
// ====================================================== //
public function sraRejectedTransactionCCG(){
  $con = $this->con();
  $sql = "SELECT * FROM `tbl_transaction` WHERE `type` = 'CCG' AND `status` = 'REJECTED' AND `RequestStatus` = 'SRA'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<thead >";
  echo "<tr>";
  echo "<th>Transaction ID</th>";
  echo "<th>Class Code</th>";
  echo "<th>Subject</th>";
  echo "<th>Semester</th>";
  echo "<th>School Year</th>";
  echo "<th>Date Created</th>";
  echo "<th>Status</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  echo "</thead>";
  foreach ($result as $data) {
  $hash_id = encrypt($data['id'], "_johnmarknavarro");
  echo "<tr>";
  echo "<td class='font-weight-medium'>$data[transId]</td>";
  echo "<td>$data[clCode]</td>";
  echo "<td>$data[subj]</td>";
  echo "<td>$data[sem]</td>";
  echo "<td>$data[sy]</td>";
  echo "<td data-type='date'>";
  echo date('M j, Y, h:i A', strtotime ($data['date_applied']));
  echo "</td>";

  if($data['status'] == 'SUBMITTED'){
    echo "<td class='text-center'><span class='badge badge-primary'>Submitted</span></td>";
  }else if($data['status'] == 'PENDING'){
    echo "<td class='text-center'><span class='badge badge-info'>Pending</span></td>";
  } else if($data['status'] == 'REJECTED'){
    echo "<td class='text-center'><span class='badge badge-danger'>Expired</span></td>";
  } else {
    echo "<td class='text-center'><span class='badge badge-success'>Approved</span></td>";
  };
  echo "<td class='text-center'>
    <a class='btn text-center btn-action btn-sm my-1' href='students?id=$data[transId]&classcode=$data[clCode]'><i data-feather='list' class='svg-icon'></i></a>
    <a class='btn text-center btn-action btn-sm my-1 decline_D' data-target='#decline-details' data-toggle='modal' data-id='$hash_id' href=''><i data-feather='info' class='svg-icon'></i></a>
    </td>";
  echo "</tr>";
  }
}

}