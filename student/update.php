<?php 
 $servername ="localhost";
 $username ="root";
 $dbname= "meetme";
 $conn= mysqli_connect($servername, $username, "", $dbname);

 if(!$conn){
     die("DB Connection failed: ".mysqli_connect_error());
     echo "<script> alert('meetme DB Connection failed: ');</script>";

 }

 $un =$_POST['name'];
    $rn =$_POST['roll'];
    $branch =$_POST['branch'];
    $em =$_POST['mail'];
    $ph =$_POST['phone'];
    $gen =$_POST['gen'];
    $dob =$_POST['dob'];
    

    $sql1= "UPDATE  student set stdname='$un', stdbranch='$branch', stdemail='$em', 
        stdmobile='$ph', stdgender='$gen', stddateofbirth='$dob' where stdregNum='$rn' ";

    if( mysqli_query($conn, $sql1) ){
        echo "<script>alert('Record Updated check profile');</script>";
        echo "<script>window.location.href = 'http://localhost:8888/minprowork/student/profilestudent.php';</script>";
    }
    else{
        // echo "Error in Updating record".mysqli_connect_error();
        echo "<script>alert('Error in Updating record');</script>";
    }

    
    mysqli_close($conn);
?>