<html>
    <head>
        <title>Student Profile</title>
        <link rel="stylesheet" type="text/css" href="student-style.css"> <!-- Link to the student style CSS -->
    </head>
    <body>
        <div id="main-container">
            <center>
            <?php
                if (isset($_COOKIE["username"]) && isset($_COOKIE["pwd"])) {
            ?>
                <h1><u>STUDENT</u></h1>
                <h1>Welcome to MeetUp</h1>
                <nav>
                    <a class="nav-link" href="http://localhost:8888/minprowork/student/main.php">Home</a> ||
                    <a class="nav-link" href="updatestd.php">Update Profile</a> ||
                    <a class="nav-link" href="resetstdpwd.php">Reset Password</a> ||
                    <a class="nav-link" href="logout.php">Direct Logout</a>
                </nav>

                <!-- Database details -->
                <?php
                $servername = "localhost";
                $username = "root";
                $dbname = "meetme";
                $conn = mysqli_connect($servername, $username, "", $dbname);

                if (!$conn) {
                    die("DB Connection failed: " . mysqli_connect_error());
                }
                $user = $_COOKIE['username'];
                $sql1 = "SELECT * from student where stdregNum='$user' ";
                $result = mysqli_query($conn, $sql1);
                $row = mysqli_fetch_assoc($result);
                ?>
                <h1><?php echo $row['stdname'] . "'s "; ?> Profile </h1>

                <form action="updatestd.php">
                    <table>
                        <tr>
                            <td><b>Name:</b></td>
                            <td><input type="text" name="name" value="<?php echo $row['stdname']; ?>" readonly size="37"></td>
                        </tr>
                        <tr>
                            <td><b>Reg.Num:</b></td>
                            <td><input type="text" name="roll" value="<?php echo $row['stdregNum']; ?>" readonly size="37"></td>
                        </tr>
                        <tr>
                            <td><b>Branch:</b></td>
                            <td><input type="text" name="branch" value="<?php echo $row['stdbranch']; ?>" readonly size="37"></td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td><input type="email" name="mail" value="<?php echo $row['stdemail']; ?>" readonly size="37" /></td>
                        </tr>
                        <tr>
                            <td><b>Mobile Number:</b></td>
                            <td><input type="number" name="phone" value="<?php echo $row['stdmobile']; ?>" readonly /></td>
                        </tr>
                        <tr>
                            <td><b>Gender:</b></td>
                            <td><input type="text" name="gen" value="<?php echo $row['stdgender']; ?>" readonly size="37" /></td>
                        </tr>
                        <tr>
                            <td><b>DOB:</b></td>
                            <td><input type="text" name="dob" value="<?php echo $row['stddateofbirth']; ?>" readonly size="37" /> <br>Format: (yy-mm-dd)</td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" value="Edit Now">
                </form>

                <?php 
                    mysqli_close($conn);
                ?>
            </center>
            <?php
                } else {
                    echo "<script>alert('logged out')</script>";
                    echo "<script>window.location.href = 'http://localhost:8888/minprowork/home.php';</script>";
                }
            ?>
        </div>
    </body>
</html>
