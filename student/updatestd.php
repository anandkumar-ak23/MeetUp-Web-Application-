<html>
    <head>
        <title>
            Update Student Profile
        </title>
    </head>
    <body>
    <?php
    // header("Refresh:0"); 
                if(isset($_COOKIE["username"]) && isset( $_COOKIE["pwd"])){
                    // echo "<b>user name:</b> ".$_COOKIE["username"];
                    // echo "<center><br>"."<b>password:</b></center> ".$_COOKIE["passwordstd"];
                ?>
        <center>
        <h1><u>STUDENT </u></h1>
            <h1>Welcome to MeetUp</h1>
            <a href="http://localhost:8888/minprowork/student/main.php" >Home</a>||
            <a href="profilestudent.php" >PROFILE</a>||
        <!-- <a href="http://localhost:8888/minprowork/loginsTypes.html" >Login</a>|| -->
        <!-- <a href="http://localhost:8888/minprowork/signup.html" >SignUp</a>|| -->
        <a href="resetstdpwd.php" >Reset Password</a>||
        <a href="logout.php" >Direct Logout</a><br>
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
        $user =$_COOKIE['username'];
        $sql1= "SELECT * from student where stdregNum='$user' ";
        $result= mysqli_query($conn, $sql1);
        $row= mysqli_fetch_assoc($result)
        ?>






            <form action="update.php" method="post">

                <table border="3">
                    <tr>
                        <td><b>Name:</b></td>
                        <td><input type="text" name="name" value="<?php echo $row['stdname']?>" size="37"></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Reg.Num:</b>
                        </td>
                        <td>
                            <input type="text"  name="roll" value="<?php echo $row['stdregNum']?>" readonly size="37">
                        </td>
                    </tr>
                    <tr>
                        <td><b>Branch:</b></td>
                        <td><select  name="branch">
                            <option value="cse">Computer Science and Engineering</option>
                            <option value="csm">Computer Science and Machine Learning</option>
                            <option value="it">Information Technology</option>
                            <option value="aids">Artificial Intelligence and DataScience</option>
                            <option value="eee">Electrical Engineering</option>
                            <option value="civl">Civil Engineering</option>
                            <option value="mech">Mechanical Engineering</option>
                            <option value="ase">AeroSpace Engineering</option>
                            <option value="ece">Electronics and Communication Engineering</option>
                          </select></td>
                    </tr>
                    <tr>
                        <td><b>Email: </b></td>
                        <td> <input type="email" name="mail" value="<?php echo $row['stdemail']?>" size="37"/></td>
                    </tr>
                    <tr>
                        <td><b>Mobile Number: </b></td>
                        <td> <input type="number" name="phone" value="<?php echo $row['stdmobile']?>"/></td>
                    </tr>
                    <tr>
                        <td><b>Gender: </b></td>
                        <td>
                        <input type="text" name="gen" value="<?php echo $row['stdgender']?>" size="37"/>
                        </td>
                    </tr>
                    <tr>
                        <td><b> DOB:</b></td>
                        <td><input type="text" name="dob" value="<?php echo $row['stddateofbirth']?>" size="37"/> <br>Formate: (yy-mm-dd)</td>
                    </tr>
                    <!-- <tr>
                        <td><b>Password</b></td>
                        <td><input type="password" maxlength="25" name="pass"></td>
                    </tr> -->
                    
                </table>
                <br>
                    <input type="submit" name="submit" value="Update record" > 
                
            </form>
            <?php 
                    mysqli_close($conn);
                ?>
        </center>
        <?php
                }
                else {
                    echo "<script>alert('logged out')</script>";

                    echo "<script>window.location.href = 'http://localhost:8888/minprowork/home.php';</script>";
              
                }
            ?>
    </body>
</html>