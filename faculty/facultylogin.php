

<?php
// include('links.html');
// connecting to the database
$servername ="localhost";
$username ="root";
$dbname= "meetme";
$conn= mysqli_connect($servername, $username, "", $dbname);
 

if(!$conn){
    die("DB Connection failed: ".mysqli_connect_error());
}
// echo "<b>Db Connected successfully. </b>";






// echo $uname."<br>".$password."<br>".$dbpassword;
if($_POST['uname']!=NULL){
    if($_POST['pass']!=NULL){
        $uname = $_POST['uname'];
        $password =$_POST['pass'];
        
        // query to check logins 
        $sql1= "SELECT workid, name,password from faculty where workid='$uname' ";
        
        $result= mysqli_query($conn, $sql1);
        $row= mysqli_fetch_assoc($result);
        
        $dbpassword =$row['password'];
        
        $name =$row["name"];
        
        
        if( mysqli_query($conn, $sql1)){
            if($_POST['uname']==$row['workid']){
                if($password==$dbpassword){
                    
                    setcookie("workid",$uname, time() +3600,"/","",0);
                    setcookie("password",$password, time() +3600,"/","",0);
                    // setcookie("$name","0",time()+3600,"/","",0);

                    // echo "<h1><center> Login successfully done </center></h1>";
                    echo "<script>alert('Login successfully done Go to Main Page');</script>";

                    echo "<script>window.location.href = 'http://localhost:8888/minprowork/faculty/main.php';</script>";
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
echo "<script>window.location.href = 'http://localhost:8888/minprowork/faculty/flogin.html';</script>";

mysqli_close($conn);
?>

