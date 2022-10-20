<?php require "../include/header.php";?>
<?php require "../db/conn.php";?>
<div class="container">
        <form action="" method="post">
            <div class="form " id="form">
                <fieldset>
                    <legend>Registration Details</legend>
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
                        if(isset($_POST['submit'])){
                            if($_POST['username']== '' || $_POST['password']==''){
                                echo "all input must be filled";
                            }else{
                                $username=$_POST['username'];
                                $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
                              $insert=  $conn->prepare ("INSERT INTO admin1 (`username`, `password`)VALUES
                                (:username, :password_) ");
                                $insert->execute ([
                                    ':username' => $username,
                                    ':password_' => $password,
                                ]);
                                echo '<h4 style="color:green;">Appointment Booked suucessfully</h4>';
                                // header("location: http://localhost/vms/visitor.php");
                            }
                        }             
                        ?>                             