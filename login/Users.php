<?php 
include '../config/connection.php';
// class definition 

  class Users { 

  // define properties /attributes 

  private $userID;
  private $userName;
  private $Email; 
  private $password;  
  private $isAdmin;
  private $tokenCode;

  //Constructor called when instantiating bear. This demonstrates a default weight parameter

  public function __construct(){ 

  } 

  //Destructor called when object leaves scope or script terminates 

  public function __destruct(){ 

  } 

  //Setters 
  public function setUserID($userID) { 
	$this->userID = $userID;
  } 

   public function setUserName($userName) { 
	$this->userName = $userName;
  } 
  
   
  public function setEmail($Email) {
	$this->Email = $Email;
  }

  public function setPassword($password) {
	$this->password = $password;
  }
  
  public function setIsAdmin($isAdmin) {
	$this->isAdmin = $isAdmin;
  }
  
  public function setTokenCode($tokenCode) {
	$this->tokenCode = $tokenCode;
  }
  
  //Getters
  public function getUserID() { 
	return $this->userID; 
  } 
  
    public function getUserName() { 
	return $this->userName; 
  } 

    public function getEmail() {
	return $this->Email;
  }

  public function getPassword() {
	return $this->password;
  }
  
  public function getIsAdmin() {
	return $this->isAdmin;
  }
  
  public function getTokenCode() {
	return $this->tokenCode;
  }
  
  public function addNewUser() {
		
		$conn = Connection::getConnection();

				// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO users (userID, userName, Email, password, tokenCode) VALUES 
			($userID, $userName $Email, $password, $tokenCode)");
		$stmt->bind_param($this->userID, $this->userName, $this->Email, $this->password, $this->tokenCode);

		$stmt->execute();

		if (mysqli_affected_rows($conn) > 0) {

			//If so , return to calling page(stored in the server variables as HTTP_REFERER

			return "success";

		} else {
			// print error message
			$error = "Fail". mysqli_error($conn);
			return $error;
		}

		$stmt->close();
		$conn->close();
  }

  public function runQuery($sql)
 {
  $stmt = $this->conn->prepare($sql);
  return $stmt;
 }

 public function lasdID()
 {
  $stmt = $this->conn->lastInsertId();
  return $stmt;
 }

  public function register($uname,$email,$upass,$code,$name)
 {
  try
  {       
   $password = md5($upass);
   $stmt = $this->conn->prepare("INSERT INTO users (userID, userName, Email, password, tokenCode) 
                                                VALUES(:uID, :user_name, :user_mail, :user_pass, :active_code)");
   $stmt->bindparam(":user_name",$uname);
   $stmt->bindparam(":user_mail",$email);
   $stmt->bindparam(":user_pass",$password);
   $stmt->bindparam(":active_code",$code);
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }

  public function validateLogin() {
	$connection = Connection::getConnection();
    $result = "";
	$q = "SELECT * FROM users WHERE userID = '" . $this->userID . "'" . " AND password = '" . $this->password . "'";
	// Run query
	$r = mysqli_query($connection,$q) or die(mysqli_error());

	// check if any data was returned from the database
	if ($obj = mysqli_fetch_assoc($r)) {
		session_start();
		// echo "session started!";
		$isAdmin = $obj["isAdmin"]; 
		
		$_SESSION["valid_user"] = $this->userID;
		$_SESSION["valid_time"] = time();
		$_SESSION["isAdmin"] = $isAdmin;
		
		if($isAdmin == "Yes") {
			$result = "location: ../product/admin.php"; // comment/uncomment for error checking
		}
		else {
			$result = "location: ../product/member.php"; // comment/uncomment for error checking
		}
		
	} else {
		// Redirect to login fail page
		$result = "location: login_fail.php";   // comment/uncomment for error checking
	}
	
	$connection->close();
	
	return $result;
  }
  function send_mail($email,$message,$subject)
 {      
  require_once('mailer/class.phpmailer.php');
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true;                  
  //$mail->SMTPSecure = "ssl";                 
  $mail->Host       = "mbox.freehostia.com";      
  $mail->Port       = 143;             
  $mail->AddAddress($email);
  $mail->Username="omoefizy@gmail.com";  
  $mail->Password="yourgmailpassword";            
  $mail->SetFrom('omobosoftwareinterface.com','omobosoftwareinterface.com');
  $mail->AddReplyTo("omobosoftwareinterface.com","omobosoftwareinterface.com");
  $mail->Subject    = $subject;
  $mail->MsgHTML($message);
  $mail->Send();
 } 
}
?>