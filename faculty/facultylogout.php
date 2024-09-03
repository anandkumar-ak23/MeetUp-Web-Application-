<html>
<head>
        <title>Faculty Logout Page</title>
        
    </head>
    <body>
       <center>
       <h1>Welcome to MeetUp</h1>
            <a href="http://localhost:8888/minprowork/home.php" >Home</a>||
        <a href="http://localhost:8888/minprowork/loginsTypes.html" >Login</a>||
        <a href="http://localhost:8888/minprowork/signup.html" >SignUp</a>||
        <!-- <a href="" >Reset Password</a>|| -->
        <!-- <a href="http://localhost:8888/minprowork/student/logout.php" >Logout</a>     -->
    </center>
    </body>
</html>


<?php
// include('stdlogin.php');
setcookie("workid",$_COOKIE['workid'], time() -3600,"/","",0);
setcookie("password",$_COOKIE['password'], time() -3600,"/","",0);

// echo "<center><h1>logged out</h1></center>";

    echo "<script>alert('log out successfull..')</script>";
    echo "<script>window.location.href = 'http://localhost:8888/minprowork/home.php';</script>";

?>