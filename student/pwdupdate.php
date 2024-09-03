

<?php
include('links.html');
// connecting to the database
$servername ="localhost";
$username ="root";
$dbname= "meetme";
$conn= mysqli_connect($servername, $username, "", $dbname);
 
$user=$_COOKIE['username'];

if(!$conn){
    die("DB Connection failed: ".mysqli_connect_error());
}
// echo "<b>Db Connected successfully. </b>";

if($_POST['pwd']!=NULL){
    if($_POST['repwd']!=NULL){
        $pass = $_POST['pwd'];
        $repass =$_POST['repwd'];
        
        if($pass==$repass){
            $sql1= "UPDATE student set stdpwd='$repass' where stdregNum='$user' ";
            if( mysqli_query($conn, $sql1) ){
                
                    
    
    
                    // echo "<h1><center> Login successfully done </center></h1>";
                    echo "<script>alert('Password changed..');</script>";
    
                    echo "<script>window.location.href = 'http://localhost:8888/minprowork/student/profilestudent.php';</script>";
                    exit;            
                }
                else{
                    echo "<script>alert('not change password');</script>";
                }

        }
        else{
            echo "<script>alert('Both entered passwords must be same');</script>".mysqli_connect_error();
        }

        
    }
    else{
        echo "<script>alert('Enter Password');</script>";
        

    }
}
else{
    echo "<script>alert('Enter password');</script>";
    
}
echo "<script>window.location.href = 'http://localhost:8888/minprowork/student/resetstdpwd.html';</script>";

mysqli_close($conn);
?>

