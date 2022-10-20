<?php
// if(isset($_POST['submit'])){
//     session_start();
//     $message="";
//     if(count($_POST)>0) {
//         $con = mysqli_connect('127.0.0.1:3306','root','','vms') or die('Unable To connect');
//         $result = mysqli_query($con,"SELECT * FROM admin1 WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
//         $row  = mysqli_fetch_array($result);
//         if(is_array($row)) {
//         $_SESSION["id"] = $row['id'];
//         $_SESSION["name"] = $row['name'];
//         } else {
//          $message = "Invalid Username or Password!";
//         }
//     }
//     if(isset($_SESSION["id"])) {
//     header("Location:visitor_record.php");
//     }
// }
?>
<?php require "../include/header.php";?>
<?php require "../db/conn.php"?>
    <div class="container">
        <form action="" method="post">
            <div class="form " id="form">
                <fieldset>
                    <legend>Login Details</legend>
                        <div class="inputs">
                            <span><i class="fa-thin fa-user"></i></span>
                            <input type="text" placeholder="username" name="username" >
                        </div>
                        <div class="inputs">
                            <input type="password" placeholder="password" name="password">
                        </div>
                        <div class="btn">
                            <input type="reset" value="Cancel">
                            <input type="submit" value="submit" name="submit">
                        </div>
                        <?php    
                        if(isset($_POST['submit'])) {
                            if($_POST['username']==' ' || $_POST['password']== ' '){
                                echo "input all fields";
                            }else{
                                $username=$_POST['username'];
                                $password=$_POST['password'];
                                $login = $conn->query("SELECT * FROM admin1 WHERE username='$username'");
                                $login->execute();
                                $row = $login->FETCH(PDO::FETCH_ASSOC);
                                
                                if($login->rowCount()>0){
                                    if(password_verify($password, $row['password'])){
                                        $_SESSION['username']=$row['username'];
                                        header("location: ../visitor_record.php");
                                    }else{
                                        echo "<h4 style='color:tan;background:white;'>password or username incorrect</h4>";
                                    }
                                }else{
                                    echo "<h4 style='color:tan;background:white;;display:inline;'>password or username incorrect !!!!</h4>";
                                }
                            }
                        }
    // 
    // if(isset($_POST['submit'])){

    // $username = $_POST['username'];  
    // $password = $_POST['password'];  
      
    //     //to prevent from mysqli injection  
    //     $username = stripcslashes($username);  
    //     $password = stripcslashes($password);  
    //     $username = mysqli_real_escape_string($conn, $username);  
    //     $password = mysqli_real_escape_string($conn, $password);  
      
    //     $sql = "select * from admin1 where username = '$username' and password = '$password'";  
    //     $result = mysqli_query($conn, $sql);  
    //     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    //     $count = mysqli_num_rows($result);  
    //     if($count == 1){  
    //         header("location: visitor_record.php");
    //        echo "<h4><center> Login successful </center></h4>";
             
    //     }  
    //     else{  
            
    //         echo "<h4 style='color:red;'> Login failed. Invalid username or password.</h4>";  
    //     }     
    // }
?>  
                </fieldset>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>