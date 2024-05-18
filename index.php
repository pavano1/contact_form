<?php
include_once("config.php");
$fullname_err = '';
$phonenumber_err = '';
$email_err = '';
$fullname_err = '';
$message_err = '';
$subject_err = '';
$fullname = '';
$email = '';
$message = '';
$subject = '';
$phonenumber = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){


	if(empty($_POST['fullname'])){
		$fullname_err = "Fullname Required"; 

	}else{
		$fullname = test_input($_POST['fullname']);
		
		if(!preg_match("/^[a-zA-Z- ' ]*$/", $fullname)) {

			$fullname_err = "Fullname Should be only Characters"; 
		} 
	}
	if(empty($_POST['phonenumber'])){
		$phonenumber_err = "PhoneNumber Required";   
	}else{
		$phonenumber = test_input($_POST['phonenumber']);
		if(!preg_match("/^[0-9]{10}+$/", $phonenumber)) {

			$phonenumber_err = "Phone Number should be 10 digit"; 
		} 
	}
	if(empty($_POST['email'])){
		$email_err = "Email Required";   
	}else{
		$email = test_input($_POST['email']);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$email_err = "Invalid Email Formate";   
		}
	}
	if(empty($_POST['subject'])){
		$subject_err = "Subject Required";   
	}else{
		$subject = test_input($_POST['subject']);
		if(!preg_match("/^[a-zA-Z-' ]*$/", $subject)) {
			$subject_err = "Subject Should be only Characters"; 
		} 
	}
		if(empty($_POST['message'])){
		$message_err = "Message Required";   
	}else{
		echo $_POST['message'];
		$message = test_input($_POST['message']);
	}

$ip_address = $_SERVER['REMOTE_ADDR'];
$data_now = date('y-m-d');

}
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if($email != '' && $fullname != '' && $phonenumber != '' && $subject != '' && $message != ''){
$result = "SELECT count(*) FROM contact_form where email= ?";

$smtp = $mysqli->prepare($result);
$smtp->bind_param('s', $email);
$smtp->execute();
$smtp->bind_result($count);
$smtp->fetch();
$smtp->close();
//echo $count;die();
if($count>0){

	echo "<script>alert('User Already Exist')</script>";
}else{
	$sql = "INSERT INTO contact_form(fullname, email, phonenumber, subject, message, ip_address, currentdate) VALUES(?,?,?,?,?,?,?)";
	$smtp = $mysqli->prepare($sql);
	$smtp->bind_param('ssissss', $fullname, $email, $phonenumber, $subject, $message, $ip_address, $data_now);
	$smtp->execute();
	$smtp->close();
	echo "<script>alert('User Registered')</script>";

mail($email,$subject, $message);
$fullname = '';
$email = '';
$phonenumber = '';
$subject = '';
$message = '';
$email = '';
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Form</title>
</head>
<body>
<div class='container'>
	<form class='form-horziontal' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post'>

		<div class='form-group'>
			<label for='fullname' class='col-sm-2'>FullName:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="fullname" 
				value='<?php if(isset($fullname)){echo $fullname;}?>'  placeholder="FullName" autocomplete='off'>
				<span class='error'><?php echo $fullname_err;?></span>
			</div>
		</div>
		<div class='form-group'>
			<label for='email' class='col-sm-2'>PhoneNumber:</label>
			<div class="col-sm-10">
			
				<input type="text" class="form-control" name="phonenumber" value='<?php if(isset($phonenumber)){echo $phonenumber;}?>' placeholder="PhoneNumber">
				<span class='error'><?php echo $phonenumber_err;?></span>
			</div>
		</div>
		<div class='form-group'>
			<label for='email' class='col-sm-2'>Email:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="email" value='<?php if(isset($email)){echo $email;}?>' placeholder="Email">
				<span class='error'><?php echo $email_err;?></span>
			</div>
		</div>
		<div class='form-group'>
			<label for='email' class='col-sm-2'>Subject:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="subject" value='<?php if(isset($subject)){echo $subject;}?>' placeholder="Subject">
				<span class='error'><?php echo $subject_err;?></span>
			</div>
			
		</div>
			<div class='form-group'>
			<label for='message' class='col-sm-2'>Message:</label>
			<div class="col-sm-10">
				<textarea name='message'></textarea>  
				<span class='error'><?php echo $message_err;?></span>
			</div>
			
		</div>
		<input type="submit" name="submit" value='submit'>
	</form>
</div>
</body>
</html>