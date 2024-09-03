<?php
$servername ="localhost";
$username ="root";
$dbname= "meetme";
$conn= mysqli_connect($servername, $username, "", $dbname);

$id= $_POST['fid'];

$sql= "SELECT count from faculty where workid='$id' ";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$c = $row["count"];
$c = $c +1;

$sql2= "UPDATE faculty set count='$c' where workid='$id'";

if(mysqli_query($conn, $sql2)){
    echo "<script>alert('Request Sent')</script>";
    echo "<script>window.location.href = 'http://localhost:8888/minprowork/student/main.php';</script>";
}
?>