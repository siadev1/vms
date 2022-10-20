<?php
try{
    //db connection details
$host="localhost";
$dbname="vms";
$user="root";
$pass="";
$conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo  $e->getMessage();
}
// if($conn==true){
//     echo "conn successful";
// }else{
//     echo "error";
// }
?>
<?php
// $name=$_POST['name'];
// $email=$_POST['email'];
// $phone_no=$_POST['phone'];
// $pov=$_POST['pov'];

// $conn = new mysqli("localhost", "root", "", "vms");
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }else{
//     echo "Connection Successful";
// }

// $sql = "INSERT INTO visitor_list (`name`,`email`, `phone_no`, `pov`,`status0`)
// VALUES ('$name', '$email','$phone_no','$pov','1')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>