<?php
$honor =$_POST['fhonor'];
$name =$_POST['fname'];
$designation =$_POST['fdeg'];
$workid =$_POST['fid'];
$dept =$_POST['fdept'];
$area =$_POST['farea'];
$email =$_POST['fmail'];
$phone =$_POST['fphone'];
$pwd =$_POST['fpwd'];
$loc=$_POST['cabin'];
// echo $honor.$name."<br>".$designation."<br>".$workid."<br>".$dept."<br>".$email."<br>".$phone."<br>".$area."<br>".$pwd;
// connecting to the database
$servername ="localhost";
$username ="root";
$dbname= "meetme";
$conn= mysqli_connect($servername, $username, "", $dbname);

if(!$conn){
    die("DB Connection failed: ".mysqli_connect_error());
}
// echo "<b>Db Connected successfully. </b>";


$null= NULL;

$sql1= "INSERT INTO faculty(honor, name, designation,currently, workid, department, cabin,areaofresearch, email, mobile, password,count)
     VALUES( '$honor','$name', '$designation','$null', '$workid', '$dept', '$loc','$area', '$email','$phone' ,'$pwd','0')";

    if( mysqli_query($conn, $sql1) ){
        // echo "<h1><center>records inserted in faculty table..</center></h1>";
        echo "<script>alert('Records inserted LOGIN NOW');</script>";
        
        echo "<script>window.location.href = 'http://localhost:8888/minprowork/faculty/flogin.html';</script>";

    }
    else{
        echo "Error in inserting in faculty table lbrce DB".mysqli_connect_error();
        echo "<script>alert('Error in inserting in faculty table meetme DB');</script>";
    }
    


mysqli_close($conn);
?>