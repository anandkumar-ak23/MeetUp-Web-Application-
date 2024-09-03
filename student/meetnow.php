<?php
// header("Refresh:1");
if(isset($_COOKIE["username"]) && isset( $_COOKIE["pwd"])){
    // echo "<b>user name:</b> ".$_COOKIE["username"];
    // echo "<center><br>"."<b>password:</b></center> ".$_COOKIE["passwordstd"];
?>
<html>
    <head>
        <title>
            Meeting page
        
        </title>
    </head>
    <body>
        <center>
        <h1><u>STUDENT </u></h1>
            <h1>Welcome to MeetUp</h1>
            <a href="http://localhost:8888/minprowork/student/main.php" >Home</a>||
            <a href="profilestudent.php" >PROFILE</a>||
        <!-- <a href="http://localhost:8888/minprowork/loginsTypes.html" >Login</a> ||-->
        <a href="updatestd.php" >Update Profile</a>||
        <!-- <a href="http://localhost:8888/minprowork/signup.html" >SignUp</a>|| -->
        <a href="resetstdpwd.php" >Reset Password</a>||
        <a href="logout.php" >Direct Logout</a><br>

        <h1>
                Looking to meet Some One..
                <!-- <img src="theWoods.jpg" width="800" height="500" > -->
            </h1>

        <form action="stdmeetfac.php" method="POST">
                <br><br>
                <h1>Meet Faculty </h1><br>
                <b>Enter workid: </b><input type="text" name="facid" size="10" />
                <br><br>
                <input type="submit" value="submit" />
            </form>

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
        
