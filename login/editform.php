<?php

	error_reporting( ~E_NOTICE );
	
	require_once '../config/dbconfig1.php';	
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT userName, userProfession, Address, PhoneNumber, userPic FROM tbl_users WHERE userID =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: member.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
	        
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];// user job
		$Address = $_POST['Address']; // user address
		$PhoneNumber = $_POST['PhoneNumber']; // user phone number
		
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'assets/user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['userPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['userPic']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE tbl_users 
									     SET userName=:uname, 
										     userProfession=:ujob, 
										     userPic=:upic,
										     Address=:Address,
										     PhoneNumber=:PhoneNumber 
								       WHERE userID=:uid');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
			$stmt->bindParam(':Address',$Address);
			$stmt->bindParam(':PhoneNumber',$PhoneNumber);
			
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='member.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $row['userName']; ?></title>

//<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
//<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- custom stylesheet -->
//<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
//<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body>
<div class="container">


	<div class="page-header">
    	<h1 class="h2">update profile. <a class="btn btn-default" href="member.php"> MY ACCOUNT </a></h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Username.</label></td>
        <td><input class="form-control" type="text" name="user_name" value="<?php echo $userName; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Occupation.</label></td>
        <td><input class="form-control" type="text" name="user_job" value="<?php echo $userProfession; ?>" required /></td>
    </tr>
    
     <tr>
    	<td><label class="control-label">Address</label></td>
        <td><input class="form-control" type="text" name="Address" value="<?php echo $Address; ?>" required /></td>
    </tr>
    
     <tr>
    	<td><label class="control-label">Phone Number</label></td>
        <td><input class="form-control" type="text" name="PhoneNumber" value="<?php echo $PhoneNumber; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td>
        	<p><img src="assets/user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="member.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>


<div class="alert alert-info">
    <strong>OSI ! <?php echo $row['userName']; ?></strong> 
</div>

</div>
<?php
 include '../includes/footer.php';
?>
</body>
</html>