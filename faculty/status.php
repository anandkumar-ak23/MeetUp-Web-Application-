<html>
    <head>
        <title>Faculty Status</title>
    </head>
    <body>
        <center><h1><u>FACULTY </u></h1>
            <h1>Welcome to MeetUp-Platform</h1>

            
            <?php
                if(isset($_COOKIE["workid"]) && isset( $_COOKIE["password"])){
                    // echo "<b>user name:</b> ".$_COOKIE["username"];
                    // echo "<center><br>"."<b>password:</b></center> ".$_COOKIE["password"];
                ?> 



<!-- start the code of main page -->
            <a href="http://localhost:8888/minprowork/faculty/main.php" >Home</a>||
        <!-- <a href="http://localhost:8888/minprowork/loginsTypes.html" >Login</a> ||-->
        <a href="profilefaculty.php" >PROFILE</a>||
        <a href="updatefac.php" >Update Profile</a>||
        <!-- <a href="http://localhost:8888/minprowork/signup.html" >SignUp</a>|| -->
        <a href="resetpwd.php" >Reset Password</a>||
        <a href="facultylogout.php" >Direct Logout</a>

        <h1>My Status</h1>
        
                
        <form action="statusupdate.php" method="post">
            <?php 
            
            $servername ="localhost";
            $username ="root";
            $dbname= "meetme";
            $conn= mysqli_connect($servername, $username, "", $dbname);

            $user=$_COOKIE["workid"];
           
            $sql= "SELECT  currently, name,count from faculty where workid='$user' ";
            $result= mysqli_query($conn, $sql);

            $row= mysqli_fetch_assoc($result);
            $id =$row["name"];
            ?>
            <table>
                
                
                <tr>
                    <td><b>Currently:</b></td>
                    <td><select  name="current">
                        <option value="<?php echo $row['currently']?>"><?php echo $row['currently']?></option>
                        <option value=''></option>
                        <option value="On Leave">Leave</option>
                        <option value="Present in class">Present in Classroom</option>
                        <option value="Present in meeting">Present in Meeting</option>
                        <option value="Present but busy">Present but Busy</option>
                        <option value="Present & free to meet">Present & Free to meet</option>
                      </select></td>
                </tr>
            </table>
            <input type="submit" value="Update" />
        </form>
        <br>
        <h2>
            Students Count: <?php     echo $row["count"];   
            ?></h2>


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