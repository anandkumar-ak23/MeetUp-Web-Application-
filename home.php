<html>
    <head>
        <title>
        MeetUp-Platform -AK
        </title>
    </head>
    <body>
        <center>
            
            <h1>Welcome to MeetUp</h1>
            <?php
                if(isset($_COOKIE["username"]) &&( isset( $_COOKIE["pwd"]) || isset($_COOKIE["password"]) )){
                    // echo "<b>user name:</b> ".$_COOKIE["username"];
                    // echo "<center><br>"."<b>password:</b></center> ".$_COOKIE["password"];
                ?>
            <a href="http://localhost:8888/minprowork/student/main.php" >Home</a>||
            <?php
                }else{
            ?>
            
            <a href="http://localhost:8888/minprowork/home.php" >Home</a>||
            <?php 
                }
            ?>
        <a href="http://localhost:8888/minprowork/loginsTypes.html" >Login</a>||
        <a href="http://localhost:8888/minprowork/signup.html" >SignUp</a>||
        <!-- <a href="" >Reset Password</a>|| -->
        <!-- <a href="" >Logout</a> -->
            <br><br>
            <b>Visit Now!: </b> 
            <a href="loginsTypes.html" ><input type="button" value="Login" /></a>
            <br><br>
            <b>New to MeetUp: </b>
            <a href="signup.html"><input type="button" value="Create A/C Now"></a>
            <br><br>
            <?php 
             $servername ="localhost";
             $username ="root";
             $dbname= "meetme";
             $conn= mysqli_connect($servername, $username, "", $dbname);
 
             if(!$conn){
                 die("DB Connection failed: ".mysqli_connect_error());
             }
            
            $suser ="SELECT * from student";
            $fuser ="SELECT * from faculty";
            
            if(mysqli_query($conn, $suser) && mysqli_query($conn, $fuser)){
                $scount = mysqli_num_rows(mysqli_query($conn, $suser));
                $fcount = mysqli_num_rows(mysqli_query($conn, $fuser));
            

            
            ?>
            <br><br>
            <h2>Current Users: </h2>
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
        </center>
    </body>
</html>