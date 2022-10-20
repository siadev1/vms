<?php
// if (isset($_GET['id'])){
   
   
// }
  //  if (isset($_GET['status'])){
    
  //  }
// $status=$_POST['status'];
// Create connection
$conn = new mysqli("localhost", "root", "", "vms");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$random=$_GET['random'];
$status=$_GET['status'];

date_default_timezone_set('Africa/Lagos') ;
$checkout=date("F j o, g:i a. ");
// $id=$_POST['id'];
if($status=="in"){
 
  $status="OUT";
$sql = "UPDATE `visitor_list` SET `status0`='$status', `check_out`='$checkout'  WHERE `random`='$random' ";

if (mysqli_query($conn, $sql)) {
  // echo "Record updated successfully.".$_GET['status'].$_GET['id'];
  header("location: visitor_record.php");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
}else{
  header("location: visitor_record.php");
}

mysqli_close($conn);

?>