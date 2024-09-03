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
        ?> <h1><u>STUDENT </u></h1>
            <h1>Welcome <?php echo $row['stdname']?> to MeetUp-Platform</h1>

            <?php
            
                if(isset($_COOKIE["username"]) && isset( $_COOKIE["pwd"])){
                    // echo "<b>user name:</b> ".$_COOKIE["username"];
                    // echo "<center><br>"."<b>password:</b></center> ".$_COOKIE["passwordstd"];
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


                    <!-- end of code -->



          
            <form>
                    <?php  
                        $viewrecord ="SELECT * from faculty where workid='$id' ";
                        $result2= mysqli_query($conn, $viewrecord);
                        $record= mysqli_fetch_assoc($result)
                    ?><h1>
                  
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
                            <th>Meet Now</th>
                            <!-- <th>Currently</th> -->
                        </tr>
                    <?php
                        //get rows 
                        $row= mysqli_fetch_assoc($result2);
                        if($row)
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

                        
                        <tr>
                            <td>.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                            
                        </tr>
                        <?php } ?>
                    </table>

        
            </form>
            <form action="request.php" method="post">
                <br><h2>Meet Now</h2><br><br>
                <input type="text" name="fid"  value="<?php echo $row['workid']?>" readonly>
                <input type="submit" value="Want to Meet">
            </form>


            <?php
            //  echo "<script>window.location.href = 'http://localhost:8888/minprowork/student/main.php';</script>";
                }
                else {
                    echo "<script>alert('logged out')</script>";

                    // echo "<script>window.location.href = 'http://localhost:8888/minprowork/home.php';</script>";
              
                }
            ?>
        </center>
    </body>
</html>