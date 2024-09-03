<html>
    <head>
        <title>MeetUp-Faculty HomePage</title>
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
            $user =$_COOKIE['workid'];
            $sql1= "SELECT * from faculty where workid='$user' ";
            $result= mysqli_query($conn, $sql1);
            $row= mysqli_fetch_assoc($result)
        ?><h1><u>FACULTY</u></h1>
            <h1>Welcome <?php echo $row['honor'].$row['name']?> to MeetUp-Platform</h1>

            
            <?php
                if(isset($_COOKIE["workid"]) && isset( $_COOKIE["password"])){
                    // echo "<b>user name:</b> ".$_COOKIE["username"];
                    // echo "<center><br>"."<b>password:</b></center> ".$_COOKIE["password"];
                ?>



<!-- start the code of main page -->
            <a href="http://localhost:8888/minprowork/faculty/main.php" >Home</a>||
        <!-- <a href="http://localhost:8888/minprowork/loginsTypes.html" >Login</a> ||-->
        <a href="status.php">Status</a>||
        <a href="profilefaculty.php" >PROFILE</a>||

        <a href="updatefac.php" >Update Profile</a>||
        <!-- <a href="http://localhost:8888/minprowork/signup.html" >SignUp</a>|| -->
        <a href="resetpwd.php" >Reset Password</a>||
        <a href="facultylogout.php" >Direct Logout</a>
            


            <!-- enter starting code -->
            <?php 
                            // include('http://localhost:8888/minprowork/faculty/statusupdate.php');
                            $id =$_POST['facid'];
                            $viewrecord ="SELECT currently from faculty where workid='$id' ";
                            $result= mysqli_query($conn, $viewrecord);  
                            $row= mysqli_fetch_assoc($result);
                            // echo $row['today'];
                            $status = $row['currently'];
                            
                    ?>
                    <script type="text/javascript">
                        
                        var stat = "<?php echo $status ;?>";
                        if(stat !='On Leave'){
                            alert(stat);
                        }
                        else{
                            alert('On Leave');
                        }
                        </script>
                    <form>
                    <?php  
                        $viewrecord ="SELECT * from faculty  where workid='$id' ";
                        $result= mysqli_query($conn, $viewrecord);
                        $row1= mysqli_fetch_assoc($result);
                    ?>
                    <h1>
                Meet <u><?php echo $row1['honor'].$row1['name']?></u> NOW.<br>
                <!-- <img src="http://localhost:8888/minprowork/faculty/theWoods.jpg" width="800" height="500" > -->
            </h1>
                    <table align='center' border='3'>
                        <tr>
                            <th>Workid</th>
                            <th>Faculty Name</th>
                            <th>Department</th>
                            <th>Cabin Location</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            
                            <!-- <th>Currently</th> -->
                        </tr>
                    <?php
                        //get rows 
                        $viewrecord ="SELECT * from faculty  where workid='$id' ";
                        $result= mysqli_query($conn, $viewrecord);
                        while($row= mysqli_fetch_assoc($result))
                        {

                    ?>
                        <tr>
                        <td><?php echo $row["workid"]?></td>
                            <td><?php echo $row["name"]?></td>
                            <td><?php echo $row["department"]?></td>
                            <td><?php echo $row["cabin"]?></td>
                            <td><?php echo $row["mobile"]?></td>
                            <td><?php echo $row["email"]?></td>
                            
                            <!-- <td><?php //echo $row["currently"]?></td> -->
                        </tr>

                    <?php } ?>
                        <tr>
                            <td>.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                            
                        </tr>
                    </table>
        
            </form>


                    <!-- end of code -->
            <?php
                }
            else{
                echo "<script>alert('logged out');</script>";
                echo "<script>window.location.href = 'http://localhost:8888/minprowork/home.php';</script>";
            }
        ?>
        </center>
    </body>
</html>