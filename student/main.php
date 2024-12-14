<html>
    <head>
        <title>MeetUp - Student HomePage</title>
        <link rel="stylesheet" type="text/css" href="student-style.css"> <!-- Link to the student style CSS -->
    </head>
    <body>
        <div id="main-container">
            <center>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $dbname = "meetme";
                    $conn = mysqli_connect($servername, $username, "", $dbname);

                    if (!$conn) {
                        die("DB Connection failed: " . mysqli_connect_error());
                    }
                    $user = $_COOKIE['username'];
                    $sql1 = "SELECT * from student where stdregNum='$user'";
                    $result = mysqli_query($conn, $sql1);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <h1><u>STUDENT</u></h1>
                <h1>Welcome <?php echo $row['stdname']; ?> to MeetUp-Platform</h1>

                <?php
                    if (isset($_COOKIE["username"]) && isset($_COOKIE["pwd"])) {
                ?>
                    <nav>
                        <a class="nav-link" href="http://localhost:8888/minprowork/student/main.php">Home</a> ||
                        <a class="nav-link" href="profilestudent.php">Profile</a> ||
                        <a class="nav-link" href="updatestd.php">Update Profile</a> ||
                        <a class="nav-link" href="resetstdpwd.php">Reset Password</a> ||
                        <a class="nav-link" href="logout.php">Direct Logout</a>
                    </nav>

                    <div id="user-stats">
                        <?php 
                            $suser = "SELECT * from student";
                            $fuser = "SELECT * from faculty";

                            if (mysqli_query($conn, $suser) && mysqli_query($conn, $fuser)) {
                                $scount = mysqli_num_rows(mysqli_query($conn, $suser));
                                $fcount = mysqli_num_rows(mysqli_query($conn, $fuser));
                        ?>
                            <h2><u>Current Users: </u><?php echo $scount + $fcount; ?></h2>
                            <table>
                                <tr>
                                    <th>Faculty:</th>
                                    <td><input type="text" name="fcount" value="<?php echo $fcount; ?>" readonly size="4"></td>
                                </tr>
                                <tr>
                                    <th>Student:</th>
                                    <td><input type="text" name="scount" value="<?php echo $scount; ?>" readonly size="4"></td>
                                </tr>
                            </table>
                        <?php
                            }
                        ?>
                    </div>
                    <h1>Looking to meet Someone..</h1>
                    <h1>
                        <a class="nav-button" href='meetnow.php'>MEET FACULTY NOW</a>
                    </h1>
                <?php
                    } else {
                        echo "<script>alert('logged out')</script>";
                        echo "<script>window.location.href = 'http://localhost:8888/minprowork/home.php';</script>";
                    }
                ?>
            </center>
        </div>
    </body>
</html>
