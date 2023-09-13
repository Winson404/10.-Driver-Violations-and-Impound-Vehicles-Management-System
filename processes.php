<?php 
	include 'config.php';

	// ADMIN / EMPLOYER LOGIN
	if(isset($_POST['login'])) {

		$email    = $_POST['email'];
		$password = md5($_POST['password']);


		$check = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
		if(mysqli_num_rows($check)===1) {

				$row = mysqli_fetch_array($check);
				if($row['user_type'] == 'Admin') {
					$_SESSION['admin_Id'] = $row['admin_Id'];

					// SAVE LOG
					$adminID = $_SESSION['admin_Id'];
					$logdate = date("F d, Y H:i:s");
					$log = mysqli_query($conn, "INSERT INTO log (adminID, logDate) VALUES ('$adminID', '$logdate')");

					$_SESSION['logDatetime'] = $logdate;
					header("Location: Admin/dashboard.php");
				} elseif($row['user_type'] == 'Staff') {
					$_SESSION['staff_Id'] = $row['admin_Id'];

					// SAVE LOG
					$staffID = $_SESSION['staff_Id'];
					$logdate = date("F d, Y H:i:s");
					$log = mysqli_query($conn, "INSERT INTO log (adminID, logDate) VALUES ('$staffID', '$logdate')");

					$_SESSION['logDatetime'] = $logdate;
					header("Location: Staff/about_me.php");
				} else {
					$_SESSION['message'] = "Password is Incorrect.";
			        $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: login.php");
				}
				// if($row['email'] === $email && $row['password'] === $password) {
				// 	$_SESSION['admin_Id'] = $row['admin_Id'];

				// 	// SAVE LOG
				// 	$adminID = $_SESSION['admin_Id'];
				// 	$logdate = date("F d, Y H:i:s");
				// 	$log = mysqli_query($conn, "INSERT INTO log (adminID, logDate) VALUES ('$adminID', '$logdate')");

				// 	$_SESSION['logDatetime'] = $logdate;
				// 	header("Location: Admin/dashboard.php");

				// } else {
				// 		$_SESSION['message'] = "Password is Incorrect.";
				//         $_SESSION['text'] = "Please try again.";
				// 	    $_SESSION['status'] = "error";
				// 		header("Location: login.php");
				// }
			
		} else {
				
				$_SESSION['message'] = "Password is Incorrect.";
		        $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: login.php");
         }
	}




	// SAVE USERS - REGISTER.PHP
	if(isset($_POST['create_user'])) {

		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$dob              = mysqli_real_escape_string($conn, $_POST['dob']);
		$age              = mysqli_real_escape_string($conn, $_POST['age']);
		$gender           = mysqli_real_escape_string($conn, $_POST['gender']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$contact		  = mysqli_real_escape_string($conn, $_POST['contact']);
		$address          = mysqli_real_escape_string($conn, $_POST['address']);
		$password         = md5($_POST['password']);
		$file             = basename($_FILES["fileToUpload"]["name"]);
		$date_registered  = date('Y-m-d');


		$check_email = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
		      $_SESSION['message'] = "Email already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: register.php");
		} else {

			// Check if image file is a actual image or fake image
		    $target_dir = "images-admin/";
		    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		    $uploadOk = 1;
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check == false) {
			    $_SESSION['message']  = "File is not an image.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: register.php");
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["fileToUpload"]["size"] > 500000) {
			  	$_SESSION['message']  = "File must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: register.php");
		    	$uploadOk = 0;
			}

		    // Allow certain file formats
		    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: register.php");
			    $uploadOk = 0;
		    }

		    // Check if $uploadOk is set to 0 by an error
		    elseif ($uploadOk == 0) {
			    $_SESSION['message'] = "Your file was not uploaded.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: register.php");

		    // if everything is ok, try to upload file
		    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        		$save = mysqli_query($conn, "INSERT INTO admin (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file', '$date_registered')");

              	  if($save) {
		          	$_SESSION['message'] = "Registration successful!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: register.php");
		          } else {
		            $_SESSION['message'] = "Something went wrong while saving the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: register.php");
		          }
	       			
	        } else {
	        	$_SESSION['message'] = "There was an error uploading your profile picture.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: register.php");
	        }
		  }
		}
	}
?>
