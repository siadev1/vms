<?php require "../include/header.php";?>
<?php if($_SESSION["username"]) {
?>
Welcome <?php echo $_SESSION["username"]; ?>

<?php
}else header("Location:index.php");
?>
<?php require "../db/conn.php";?>
<?php

 // SQL query to select data from database
$sql = $conn->query("SELECT * FROM `visitor_list` ORDER BY `visitor_list`.`id` DESC");
$sql->execute();
$result = $sql->setFetchMode(PDO::FETCH_ASSOC);
// $conn->close();
?>

<div class="container-fluid">
<section>
    <h1>VISITOR RECORDS</h1>

  
  <!-- TABLE CONSTRUCTION -->
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PURPOSE OF VISIT</th>
            <th>STATUS</th>
            <th>DETAILS</th>
            <th>CHECK IN</th>
            <th>CHECK OUT</th>
            <th>CHANGE STATUS</th>
        </tr>
        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
     <?php 
        // LOOP TILL END OF DATA
        while($rows=$sql->fetch())
        {
        // $status=0;
        // $id=$rows['id'];
        // echo $id;
        // $id=$rows['id'];
     ?>
        <tr>
            <!-- FETCHING DATA FROM EACH
            ROW OF EVERY COLUMN -->
            <td class="id"><?php echo $rows['id'];?></td>
            <td><?php echo $rows['name'];?></td>
            <td><?php echo $rows['pov'];?><br>  </td>
            <td class="status" name="status"><?php echo $rows['status0'];?></td>
            <td><input type='button' class="view" value="details"><br><span class="details hide">phone:<?php echo $rows['phone'];?><br>email:<?php echo $rows['email'];?></span></td>
            <td><?php echo $rows['check_in'];?></td>
            <td><?php echo $rows['check_out'];?></td>
            <td><a class="click" href="update.php?random=<?php echo $rows['random'];?>&status=<?php echo $rows['status0'];?>">check out</a></td>
        </tr>
        <?php

        }

        ?>

</table>
</div>

    <p> <center><a href="http://localhost/vms/admin/logout.php" tite="Logout" style="color:black;background:tan;"> Logout.</a></center></p>



</section>

<script>
let details = document.getElementsByClassName("details");    
let view = document.getElementsByClassName("view");
let status = document.getElementsByClassName("status");
let click = document.getElementsByClassName("click");
let id = document.getElementsByClassName("id");
let click1 = Array.from(click);
let status1 = Array.from(status)
let id1 = Array.from(id)
let details1 = Array.from(details)
let view1 = Array.from(view)

for(let I =0; I < view.length; I++) {
  console.log(details1[5])
    view1[I].addEventListener('click',function(){
        if(details1[I].classList.contains('hide')){
            details1[I].classList.add('show')
            details1[I].classList.remove('hide')
        }else{
          details1[I].classList.remove('show')
            details1[I].classList.add('hide')
        }
    })
}
for(let I =0; I < click1.length; I++) {
  // console.log(click1)
  click1[I].addEventListener('click', function(){
    if(status1[I].innerText == "IN") {

        // status1[I].innerText = "out"
      
       alert('Check Out Successfull ')
    }else{
        
        alert('Already Checked Out.')
    }
})
} 
    
</script>

</body>
 
</html>