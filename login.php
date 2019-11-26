<?php
session_start();

if(isset($_SESSION['username']))
{
    header('location: dashboard.html');
}
else{
    
}
$servername = "localhost";
$serverusername = "ayushi";
$serverpassword = "ayushi";
$dbname = "tbuser";
$conn = new mysqli($servername, $serverusername, $serverpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




if(isset($_POST['username']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];



//login with user
    if (empty($username) || empty($password)) 
    {
    $errormsg = "Username or password values are blank, please try again.";
    }
    else 
    {
        $login = "select userid , password from tbuser where username = '$username' and password = '$password' LIMIT 1";
        $result = mysqli_query($conn,$login) or die(mysqli_error($conn)."errorsss");
            if(mysqli_num_rows($result)>0)
            {
            
            $_SESSION['is_logged_in'] = true;
            $_SESSION['username'] = $username;
            header('location: dashboard.html');
            
            }   
            else

            $errormsg = "User login or password is not valid";
                 
    }

}




?>
<?php
function login()
    
{
    alert("you are successfully registered");
    window.location="file:///C:/xampp/htdocs/dashboard.html";
    
}
?>

<html>
   
   <head>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
 </div>

   </body>
</html>