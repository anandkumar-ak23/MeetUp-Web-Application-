<html>
    <head>
        <title>MeetUp-Platform - AK</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="main-container">
            <header>
                <h1>Welcome to MeetUp</h1>
            </header>
            
            <div id="navigation">
                <?php
                    if(isset($_COOKIE["username"]) && (isset($_COOKIE["pwd"]) || isset($_COOKIE["password"]))) {
                ?>
                <a class="nav-link" href="http://localhost:8888/minprowork/student/main.php">Home</a>||
                <?php } else { ?>
                <a class="nav-link" href="http://localhost:8888/minprowork/home.php">Home</a>||
                <?php } ?>
                <a class="nav-link" href="http://localhost:8888/minprowork/loginsTypes.html">Login</a>||
                <a class="nav-link" href="http://localhost:8888/minprowork/signup.html">SignUp</a>
            </div>
            
            <div id="actions">
                <b>Visit Now!: </b>
                <a href="loginsTypes.html"><input class="action-button" type="button" value="Login" /></a>
                <br><br>
                <b>New to MeetUp: </b>
                <a href="signup.html"><input class="action-button" type="button" value="Create A/C Now"></a>
            </div>

            <?php 
                $servername = "localhost";
                $username = "root";
                $dbname= "meetme";
                $conn = mysqli_connect($servername, $username, "", $dbname);

                if(!$conn){
                    die("DB Connection failed: ".mysqli_connect_error());
                }

                $suser = "SELECT * from student";
                $fuser = "SELECT * from faculty";

                if(mysqli_query($conn, $suser) && mysqli_query($conn, $fuser)){
                    $scount = mysqli_num_rows(mysqli_query($conn, $suser));
                    $fcount = mysqli_num_rows(mysqli_query($conn, $fuser));
            ?>
            
            <div id="user-count">
                <h2>Current Users: </h2>
                <table>
                    <tr>
                        <th>Faculty: </th>
                        <td><input type="text" name="fcount" value="<?php echo $fcount ?>" readonly size="4"></td>
                    </tr>
                    <tr>
                        <th>Student: </th>
                        <td><input type="text" name="scount" value="<?php echo $scount ?>" readonly size="4"></td>
                    </tr>
                </table>
            </div>
            <?php } ?>
        </div>
    </body>
</html>
