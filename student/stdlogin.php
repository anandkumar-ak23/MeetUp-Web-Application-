

<?php
include('links.html');
// connecting to the database
$servername ="localhost";
$username ="root";
$dbname= "meetme";
$conn= mysqli_connect($servername, $username, "", $dbname);
 

if(!$conn){
    die("DB Connection failed: ".mysqli_connect_error());
}
// echo "<b>Db Connected successfully. </b>";

if($_POST['reg']!=NULL){
    if($_POST['pass']!=NULL){
        $uname = $_POST['reg'];
        $password =$_POST['pass'];
        
        // query to check logins 
        $sql1= "SELECT stdregNum,stdpwd from student where stdregNum='$uname' ";
        
        $result= mysqli_query($conn, $sql1);
        $row= mysqli_fetch_assoc($result);
        
        $dbpassword =$row['stdpwd'];
        
        
        
        
        if( mysqli_query($conn, $sql1) ){
            if($_POST['reg']==$row['stdregNum']){
                if($password==$dbpassword){
                    setcookie("username",$uname, time() +3600,"/","",0);
                    setcookie("pwd",$password, time() +3600,"/","",0);
    
    
                    // echo "<h1><center> Login successfully done </center></h1>";
                    echo "<script>alert('Login successfully done Go to Main Page');</script>";
    
                    echo "<script>window.location.href = 'http://localhost:8888/minprowork/student/main.php';</script>";
                    exit;            
                }
                else{
                    echo "<script>alert('Entered Wrong password');</script>";
                }
            }
            else{
                echo "<script>alert('Record Not Found.');</script>";
            }
            
            
        }
        else{
            echo "<script>alert('registration number or password entered wrong chech it');</script>".mysqli_connect_error();
        }
    }
    else{
        echo "<script>alert('Enter Password');</script>";
        

    }
}
else{
    echo "<script>alert('Enter Username AND password');</script>";
    
}
echo "<script>window.location.href = 'http://localhost:8888/minprowork/student/stdlogin.html';</script>";

mysqli_close($conn);
?>

