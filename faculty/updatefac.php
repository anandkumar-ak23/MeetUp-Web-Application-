
<?php
// header("Refresh:0");
echo "<script>window.location.reload().</script>";

                if(isset($_COOKIE["workid"]) && isset( $_COOKIE["password"])){
                    // echo "<b>user name:</b> ".$_COOKIE["username"];
                    // echo "<center><br>"."<b>password:</b></center> ".$_COOKIE["password"];
                ?>
<html>
    <head>
        <title>
            Update Faculty Profile
        </title>
    </head>
    <body>
        <center>
        <h1><u>FACULTY </u></h1>
            <h1>Welcome to MeetUp</h1>
            <a href="http://localhost:8888/minprowork/faculty/main.php" >Home</a>||
            <a href="status.php">Status</a>||

        <!-- <a href="http://localhost:8888/minprowork/loginsTypes.html" >Login</a> ||-->
        <a href="profilefaculty.php" >Profile</a>||
        <!-- <a href="http://localhost:8888/minprowork/signup.html" >SignUp</a>|| -->
        <a href="resetpwd.php" >Reset Password</a>||
        <a href="facultylogout.php" >Direct Logout</a>
        <h1>Update Profile Now</h1>
        <!-- database details -->
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
        ?>
        <form action="update.php" method="POST" >

            <table border="3">
                <tr>
                    <td><b>Honorific: </b></td>
                    <td><input type="text" name="fhonor" value="<?php echo $row['honor']?>" ></td>
                </tr>
                <tr>
                    <td><b>Name: </b></td>
                    <td><input type="text" name="fname" value="<?php echo $row['name']?>" ></td>
                </tr>
                <tr>
                    <td><b>Designation(with honors): </b></td>
                    <td><input type="text" name="fdeg" size="37" value="<?php echo $row['designation']?>" ></td>
                </tr>
                <tr>
                    <td><b>Work Id:</b></td>
                    <td><input type="text" name="fid"  value="<?php echo $row['workid']?>" readonly></td>
                </tr>
                <tr>
                    <td><b>Department:</b></td>
                    <td> <select  name="fdept">
                            <option value="cse">Computer Science and Engineering</option>
                            <option value="csm">Computer Science and Machine Learning</option>
                            <option value="it">Information Technology</option>
                            <option value="aids">Artificial Intelligence and DataScience</option>
                            <option value="eee">Electrical Engineering</option>
                            <option value="civil">Civil Engineering</option>
                            <option value="mech">Mechanical Engineering</option>
                            <option value="ase">AeroSpace Engineering</option>
                            <option value="ece">Electronics and Communication Engineering</option>
                          </select></td>
                </tr>
                <tr>
                        <td><b>Cabin Loc:</b></td>
                        <td> <input type="text" name="cabin"  value="<?php echo $row['cabin']?>" size="37"></td>
                    </tr>
                <tr>
                    <td><b>Area of Research: </b></td>
                    <td><input type="text" name="farea" size="37" value="<?php echo $row['areaofresearch']?>" ></td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td><input type="email"  name="fmail" size="37" value="<?php echo $row['email']?>" ></td>
                </tr>
                <tr>
                    <td><b>Mobile Number: </b></td>
                    <td> <input type="number" name="fphone" maxlength="10" minlength="10" value="<?php echo $row['mobile']?>" /></td>
                </tr>
                
                <!-- <tr>
                    <td><b>Password</b></td>
                    <td><input type="password"  name="fpwd" size="37" value=""></td>
                </tr> -->
            </table>
            <br>
                <input type="submit" value="Update Now" > 

        </form>
        <?php 
                    mysqli_close($conn);
                ?>
        </center>
    </body>
</html>
<?php
                }
                else {
                    echo "<script>alert('logged out')</script>";

                    echo "<script>window.location.href = 'http://localhost:8888/minprowork/home.php';</script>";
              
                }
            ?>

