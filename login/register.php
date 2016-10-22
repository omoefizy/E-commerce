<?php
session_start();
require_once 'Users.php';

$reg_user = new Users();

if(isset($_POST['btn-signup']))
{
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtpass']);
 $name = trim($_POST['txtuname']);
 $code = md5(uniqid(rand()));
 
 $stmt = $reg_user->runQuery("SELECT * FROM users WHERE Email=:email");
 $stmt->execute(array(":email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() > 0)
 {
  $msg = "
        <div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry !</strong>  email allready exists , Please Try another one
     </div>
     ";
 }
 else
 {
  if($reg_user->register($email,$upass,$code,$name))
  {   
   $id = $reg_user->lasdID();  
   $key = base64_encode($id);
   $id = $key;
   
   $message = "     
      Hello $uname,
      <br /><br />
      Welcome!<br/>
      To complete your registration  please , just click following link<br/>
      <br /><br />
      <a href='http://www.omobosoftwareinterface.com/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
      <br /><br />
      Thanks,";
      
   $subject = "Confirm Registration";
      
   $reg_user->send_mail($email,$message,$subject); 
   $msg = "
     <div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
       </div>
     ";
  }
  else
  {
   echo "sorry , Query could no execute...";
  }  
 }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Signup</title>
    <!-- Bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="../assets/css/styles.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
    <?php if(isset($msg)) echo $msg;  ?>
      <form class="loginform cf" method="post" action="processRegister.php">
        <h2 class="form-signin-heading">Sign Up</h2><hr />

        <input type="text" class="input-block-level" placeholder="Name" name="txtuname" required />

        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />

        <input type="password" class="input-block-level" placeholder="Password" name="txtpass" required />
      <hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-signup">Sign Up</button>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>