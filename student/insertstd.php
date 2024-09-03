<?php
include('links.html');
// getting data by POST method


// displaying the entered data 

// echo $un.$rn.$branch.$em.$ph.$gen.$dob.$pwd.$img;
// connecting to the database
$servername ="localhost";
$username ="root";
$dbname= "meetme";
$conn= mysqli_connect($servername, $username, "", $dbname);



if(!$conn){
    die("DB Connection failed: ".mysqli_connect_error());
}
echo "<b>Db Connected successfully. </b>";



// Check if the form was submitted

    $un =$_POST['sname'];
    $rn =$_POST['roll'];
    $branch =$_POST['branch'];
    $em =$_POST['mail'];
    $ph =$_POST['phone'];
    $gen =$_POST['gender'];
    $dob =$_POST['dob'];
    $pwd =$_POST['pass'];

    
   


    // query to insert data
    $sql1= "INSERT INTO student(stdname, stdregnum, stdbranch, stdemail, stdmobile, stdgender, stddateofbirth, stdpwd)
     VALUES( '$un','$rn', '$branch', '$em', '$ph', '$gen', '$dob', '$pwd')";

    if( mysqli_query($conn, $sql1) ){
        echo "<script>alert('Records inserted LOGIN NOW');</script>";
        echo "<script>window.location.href = 'http://localhost:8888/minprowork/student/stdlogin.html';</script>";
    }
    else{
        echo "Error in inserting in faculty table lbrce DB".mysqli_connect_error();
        echo "<script>alert('Error in inserting in student table meetme DB');</script>";
    }
    


mysqli_close($conn);
?>
