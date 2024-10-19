<html>
    <head>
        <title>Reset Password Page</title>
        <link rel="stylesheet" type="text/css" href="student-style.css"> <!-- Include CSS -->
    </head>
    <?php
        if(isset($_COOKIE["username"]) && isset($_COOKIE["pwd"])){
    ?>
    <body>
        <center class="container"> <!-- Use the container class -->
            <h1><u>STUDENT</u></h1>
            <h1>Welcome to MeetUp</h1>
            <nav>
                <a href="http://localhost:8888/minprowork/student/main.php">Home</a> ||
                <a href="profilestudent.php">PROFILE</a> ||
                <a href="updatestd.php">Update Profile</a> ||
                <a href="logout.php">Direct Logout</a>
            </nav>
            <h1>Reset Password</h1>
            <form action="pwdupdate.php" method="post">
                <table border="3">
                    <tr>
                        <td><b>New Password: </b></td>
                        <td><input type="password" name="pwd" maxlength="25" size="37"></td>
                    </tr>
                    <tr>
                        <td><b>Re-enter New Password</b></td>
                        <td><input type="password" name="repwd" maxlength="25" size="37"></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Reset">
            </form>
        </center>
    <?php
        } else {
            echo "<script>alert('logged out')</script>";
            echo "<script>window.location.href = 'http://localhost:8888/minprowork/home.php';</script>";
        }
    ?>
    </body>
</html>
