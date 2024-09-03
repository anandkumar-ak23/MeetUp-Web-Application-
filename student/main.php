<html>
    <head>
        <title>MeetUp-Student HomePage</title>
    </head>
    <body>
        <center>
        <?php
            $servername ="localhost";
            $username ="root";
            $dbname= "meetme";
            $conn= mysqli_connect($servername, $username, "", $dbname);

            if(!$conn){
                die("DB Connection failed: ".mysqli_connect_error());
            }
            $user =$_COOKIE['username'];
            $sql1= "SELECT * from student where stdregNum='$user' ";
            $result= mysqli_query($conn, $sql1);
            $row= mysqli_fetch_assoc($result)
        ?>
        <h1><u>STUDENT </u></h1>
            <h1>Welcome <?php echo $row['stdname']?> to MeetUp-Platform</h1>

            <?php
            
                if(isset($_COOKIE["username"]) && isset( $_COOKIE["pwd"])){
                    // echo "<b>user name:</b> ".$_COOKIE["username"];
                    // echo "<center><br>"."<b>password:</b></center> ".$_COOKIE["password"];
                ?>



<!-- start the code of main page -->
            <a href="http://localhost:8888/minprowork/student/main.php" >Home</a>||
            <a href="profilestudent.php" >PROFILE</a>||
        <!-- <a href="http://localhost:8888/minprowork/loginsTypes.html" >Login</a> ||-->
        <a href="updatestd.php" >Update Profile</a>||
        <!-- <a href="http://localhost:8888/minprowork/signup.html" >SignUp</a>|| -->
        <a href="resetstdpwd.php" >Reset Password</a>||
        <a href="logout.php" >Direct Logout</a><br>
                    
        
            
            <!-- enter starting code -->
            <?php 
             
            
            $suser ="SELECT * from student";
            $fuser ="SELECT * from faculty";
            
            if(mysqli_query($conn, $suser) && mysqli_query($conn, $fuser)){
                $scount = mysqli_num_rows(mysqli_query($conn, $suser));
                $fcount = mysqli_num_rows(mysqli_query($conn, $fuser));
            

            
            ?>
            
            <h2><u>Current Users: </u><?php echo $scount+$fcount?></h2>
            <table border="3">
                <tr>
                    <th>Faculty: </th>
                    <td><input type="text" name="fcount" value="<?php echo $fcount ?>" readonly size="4"></td>
                    
                </tr>
                <tr>
                <th>Student: </th>
                    <td><input type="text" name="scount" value="<?php echo $scount ?>" readonly size="4"></td>
                </tr>
            </table>
            <?php
            }?>
            <h1>
                Looking to meet Some One..
                <!-- <img src="theWoods.jpg" width="800" height="500" > -->
            </h1>
            <h1><a href='meetnow.php' ><input type="button" value='MEET FACULTY NOW'></a></h1>
            

            

            <!-- end of code  -->
            <?php
                }
                else {
                    echo "<script>alert('logged out')</script>";

                    echo "<script>window.location.href = 'http://localhost:8888/minprowork/home.php';</script>";
              
                }
            ?>
        </center>
    </body>
</html>