<?php 
 $servername ="localhost";
 $username ="root";
 $dbname= "meetme";
 $conn= mysqli_connect($servername, $username, "", $dbname);

 if(!$conn){
     die("DB Connection failed: ".mysqli_connect_error());
     echo "<script> alert('meetme DB Connection failed: ');</script>";

 }


 $honor =$_POST['fhonor'];
$name =$_POST['fname'];
$designation =$_POST['fdeg'];
$workid =$_POST['fid'];
$dept =$_POST['fdept'];
$area =$_POST['farea'];
$email =$_POST['fmail'];
$phone =$_POST['fphone'];
$loc=$_POST['cabin'];




 $sql1= "UPDATE  faculty set honor='$honor', name='$name', designation='$designation', 
  department='$dept', cabin='$loc',areaofresearch='$area', email='$email', mobile='$phone' where workid='$workid' ";

if( mysqli_query($conn, $sql1) ){
 echo "<script>alert('Record Updated check profile');</script>";
 echo "<script>window.location.href = 'http://localhost:8888/minprowork/faculty/profilefaculty.php';</script>";
}
else{
 // echo "Error in Updating record".mysqli_connect_error();
 echo "<script>alert('Error in Updating record');</script>";
}

  mysqli_close($conn);
                

?>