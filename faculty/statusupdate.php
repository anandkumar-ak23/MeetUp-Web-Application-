<?php

$curr =$_POST['current'];



if(isset($_COOKIE["workid"]) && isset( $_COOKIE["password"])){
    $servername ="localhost";
    $username ="root";
    $dbname= "meetme";
    $conn= mysqli_connect($servername, $username, "", $dbname);

    $user = $_COOKIE['workid'];

     $stat= $_COOKIE['workid'];
    
    if(!$conn){
        die("DB Connection failed: ".mysqli_connect_error());
    }
    $sql1= "UPDATE faculty set  currently='$curr' where workid='$user'";
    setcookie($stat,"$curr", time() +3600,"/","",0);
    // setcookie($user,"$today", time() +3600,"/","",0);
    


    if( mysqli_query($conn, $sql1) ){
        // echo "<h1><center>records inserted in faculty table..</center></h1>";

        // echo $_COOKIE["$user"];
        // echo $stat."-> ".$_COOKIE[$stat]."<br>";
        echo "<script>alert('Status Updated');</script>";
        echo "<script>window.location.href = 'http://localhost:8888/minprowork/faculty/main.php';</script>";

    }
    else{
        // echo "Error in UPdating status".mysqli_connect_error();
        echo "<script>alert('Error in UPdating status');</script>";
        echo "<script>window.location.href = 'http://localhost:8888/minprowork/faculty/status.php';</script>";
    }
    


mysqli_close($conn);
}
else{
    echo "<script>alert('logged out');</script>";
    echo "<script>window.location.href='http://localhost:8888/minprowork/faculty/flogin.html';</script>";
}

?>