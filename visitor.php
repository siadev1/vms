<?php require "include/header.php";?>
<?php require "db/conn.php";?>
    <div class="container">
        <form action="" method="post">
            <div class="form " id="form">
                <?php



                if(isset($_POST['submit'])){                
                    $phone=$_POST['phone'];
                    $email=$_POST['email'];
                    $name = $_POST['name'];
                    $pov = $_POST['pov'];
                    $sql = $conn->query("SELECT * FROM `visitor_list`  WHERE `phone`='$phone'");
                    $sql->execute();
                    // $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                    if($sql->rowCount()> 0){
                        echo '<h3 style="color:tan;background:white;">phone number exists</h3>';
                         return;
                    }

                    $sql = $conn->query("SELECT * FROM `visitor_list`  WHERE `email`='$email'");
                    $sql->execute();
                    // $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                    if($sql->rowCount()> 0){
                        echo '<h3 style="color:tan;background:white;">Email already exists</h3>';
                         return;
                    }
                 else{
                    // $phone= $_POST['phone'];
                    // $email= $_POST['email'];
                    // $name = $_POST['name'];
                    // $pov = $_POST['pov'];
                    $random= rand() . date('Ymdhisa');
                    // exit($random);
                    date_default_timezone_set('Africa/Lagos') ;
                    $checkin=date("F j o, g:i a. ");
                    //$pov=password_hash($_POST['password'], PASSWORD_DEFAULT);
                    // $pov=$_POST['pov'];
                    $insert=  $conn->prepare ("INSERT INTO visitor_list (`name`,`random`, `phone`, `email`, `pov`,`status0`,`check_in`)VALUES
                    (:name_,:random, :phone,:email,:pov,:status0,:checkin) ");
                    $insert->execute ([
                        ':name_' => $name,
                        ':random' => $random,
                        ':phone' => $phone,
                        ':email' => $email,
                        ':pov' => $pov,
                        ':status0' => "in",
                        ':checkin' => $checkin,
                    ]);
                    echo '<h3 style="color:tan;background:white;">Appointment Booked successfully</h3>';
                    
                }        
            }    
?>                       
                <fieldset>
                    <legend>Visitor Details</legend>
                        <div class="inputs">
                            <span><i class="fa-thin fa-user"></i></span>
                            <input type="text" placeholder="Name" name="name" id="input9" minlength="5" title="input value can't be less than 5" required="">
                        </div>
                        <div class="inputs">
                            <input type="tel" placeholder="phone no" pattern="[0-9]{11}" name="phone" id="input10" required>
                        </div>
                        <div class="inputs">
                            <input type="email" placeholder="E-mail" name="email" id="input11"  required>
                        </div>
                        <div class="inputs">
                            <input type="text" placeholder="purpose of visit" name="pov" minlength="10"  title="input value can't be less than 10" required="input value can't be less than 10">
                        </div>
                        <div class="btn">
                            <input type="reset" value="Cancel">
                            <input type="submit" value="submit" name="submit" id="submit">
                        </div>
                        
                        

                        
                         <?php                       
                            // if(isset($_POST['submit'])){
                            // $name=$_POST['name'];
                            // $email=                        
                            // $_POST['email'];
                            // $phone_no=$_POST['phone'];
                            // $pov=$_POST['pov'];
                            // date_default_timezone_set('Africa/Lagos') ;
                            // $checkin=date("F j o, g:i a. ");
                            // $sql = "INSERT INTO visitor_list (`name`,`email`, `phone_no`, `pov`,`status0`,`checkin`)
                            // VALUES ('$name', '$email','$phone_no','$pov','1','$checkin')";

                            // if ($conn->query($sql) === TRUE) {
                            // echo '<h1 style="color:green;">Appointment Booked suucessfully</h1>';
                            // } else {
                            // echo "Error: " . $sql . "<br>" . $conn->error;
                            // }

                            // $conn->close();
                            // }
                            ?>
                            
                </fieldset>
            </div>
        </form>
    </div>
</body>
</html>