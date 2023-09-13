<?php 
	
	  use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require 'vendor/PHPMailer/src/Exception.php';
		require 'vendor/PHPMailer/src/PHPMailer.php';
		require 'vendor/PHPMailer/src/SMTP.php';

	include '../config.php';


  // UPDATE ADMIN
	if(isset($_POST['update_admin'])) {

		$admin_Id    = $_POST['admin_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		$file       = basename($_FILES["fileToUpload"]["name"]);
		$usertype   = $_POST['usertype'];

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', user_type='$usertype' WHERE admin_Id='$admin_Id'");
		            if($save) {
			                // $_SESSION['success']  = "Admin information has been updated!";
			                // header("Location: admin.php");
			                $_SESSION['message'] = "Admin information has been updated!";
							        $_SESSION['text'] = "Updated successfully!";
							        $_SESSION['status'] = "success";
											header("Location: admin.php");                                
		            } else {
			                // $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
			                // header("Location: admin.php");
			                $_SESSION['message'] = "Something went wrong while saving the information. Please try again.";
							        $_SESSION['text'] = "Please try again.";
							        $_SESSION['status'] = "error";
											header("Location: admin.php");
				        }

		} else {

				  // Check if image file is a actual image or fake image
		          $target_dir = "../images-admin/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $uploadOk = 0;
                  // $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                  // header("Location: admin.php");
                  $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  // $_SESSION['error']  = "Your file was not uploaded.";
                  // header("Location: admin.php");
                  $_SESSION['message'] = "Your file was not uploaded.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', user_type='$usertype',  image='$file' WHERE admin_Id='$admin_Id'");
							            if($save) {
								                // $_SESSION['success']  = "Admin information has been updated!";
								                // header("Location: admin.php");
								                $_SESSION['message'] = "Admin information has been updated!";
												        $_SESSION['text'] = "Updated successfully!";
												        $_SESSION['status'] = "success";
																header("Location: admin.php");                                
							            } else {
								                // $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
								                // header("Location: admin.php");
								                $_SESSION['message'] = "Something went wrong while saving the information. Please try again.";
												        $_SESSION['text'] = "Please try again.";
												        $_SESSION['status'] = "error";
																header("Location: admin.php");
									        }
                      } else {
                            // $_SESSION['exists'] = "There was an error uploading your file.";
                            // header("Location: admin.php");
                            $_SESSION['message'] = "There was an error uploading your file.";
										        $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: admin.php");
                      }
				 }

		}
	}




	// CHANGE ADMIN PASSWORD
	if(isset($_POST['password_admin'])) {

    	$admin_Id    = $_POST['admin_Id'];	
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM admin WHERE password='$OldPassword' AND admin_Id='$admin_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				// $_SESSION['exists']  = "Password does not matched. Please try again";
		        //   	header("Location: admin.php");
		          	$_SESSION['message'] = "Password does not matched.";
				        $_SESSION['text'] = "Please try again!";
				        $_SESSION['status'] = "error";
								header("Location: admin.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE admin SET password='$password' WHERE admin_Id='$admin_Id' ");

			    			if($update_password) {
			    					// $_SESSION['success']  = "Password has been changed.";
		                // header("Location: changepassword.php");
		          			$_SESSION['message'] = "Password has been changed.";
						        $_SESSION['text'] = "Please Try Again!";
						        $_SESSION['status'] = "error";
										header("Location: admin.php");
			    			} else {
			    					// $_SESSION['exists']  = "Something went wrong while changing the password.";
			         			// header("Location: changepassword.php");
					          $_SESSION['message'] = "Something went wrong while changing the password.";
						        $_SESSION['text'] = "Please Try Again!";
						        $_SESSION['status'] = "error";
										header("Location: admin.php");
			    			}

		    		}
    	} else {
    				// $_SESSION['exists']  = "Old password is incorrect.";
        //     header("Location: admin.php");
            $_SESSION['message'] = "Old password is incorrect.";
		        $_SESSION['text'] = "Please Try Again!";
		        $_SESSION['status'] = "error";
						header("Location: admin.php");
    	}

    }








  // IMPOUND
	if(isset($_POST['update_impound'])) {

			$impound_Id        = $_POST['impound_Id'];
			$violators_name    = $_POST['violators_name'];
			$ticket            = $_POST['ticket'];
			$chassis           = $_POST['chassis'];
			$engine            = $_POST['engine'];
			$plate             = $_POST['plate'];
			$color             = $_POST['color'];
			$penalty           = $_POST['penalty'];
			$date_impounded    = $_POST['date_impounded'];
			$vehicle           = $_POST['vehicle'];
			$ownership         = $_POST['ownership'];
			$accident          = $_POST['accident'];
			$official_receipt  = $_POST['official_receipt'];

			$update = mysqli_query($conn, "UPDATE impound SET impound_violator_Id='$violators_name', ticket='$ticket', chassis_no='$chassis', engine_no='$engine', plate_no='$plate', color='$color', impound_penalty='$penalty', date_impound='$date_impounded', vehicle='$vehicle', ownership='$ownership', accident='$accident', official_receipt='$official_receipt' WHERE impound_Id='$impound_Id' ");
			
			if($update) {
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['text'] = "Updated successfully!";
        $_SESSION['status'] = "success";
				header("Location: Impound.php");
      } else {
      	$_SESSION['message'] = "Something went wrong while updating the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: Impound.php");
      }
	}




	// VIOLATION
	if(isset($_POST['update_violation'])) {

			$violation_Id  = $_POST['violation_Id'];
			$violationname = mysql_real_escape_string($_POST['violationname']);
			$penalty       = $_POST['penalty'];

			$update = mysqli_query($conn, "UPDATE violations SET violation='$violationname', penalty='$penalty' WHERE violation_Id='$violation_Id' ");
			
			if($update) {
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['text'] = "Updated successfully!";
        $_SESSION['status'] = "success";
				header("Location: violations.php");
      } else {
      	$_SESSION['message'] = "Something went wrong while updating the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: violations.php");
      }
	}





	// PAID VIOLATOR
	if(isset($_POST['paid_violator'])) {

			$violator_Id  = $_POST['violator_Id'];

			$update = mysqli_query($conn, "UPDATE violators SET payment='Paid' WHERE violator_Id='$violator_Id' ");
			
			if($update) {
        $_SESSION['message'] = "Violator has been paid!";
        $_SESSION['text'] = "Paid successfully!";
        $_SESSION['status'] = "success";
				header("Location: violators.php");
      } else {
      	$_SESSION['message'] = "Something went wrong while saving the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: violators.php");
      }
	}




	// VIOLATORS
	if(isset($_POST['update_violators'])) {

			$violator_Id      = $_POST['violator_Id'];
			$name             = mysqli_real_escape_string($conn, $_POST['name']);
			$gender           = mysqli_real_escape_string($conn, $_POST['gender']);
			$civil            = mysqli_real_escape_string($conn, $_POST['civil']);
			$province         = mysqli_real_escape_string($conn, $_POST['province']);
			$municipality     = mysqli_real_escape_string($conn, $_POST['municipality']);
			$barangay         = mysqli_real_escape_string($conn, $_POST['barangay']);
			$contact          = mysqli_real_escape_string($conn, $_POST['contact']);
			$confiscated      = mysqli_real_escape_string($conn, $_POST['confiscated']);
			$plate            = mysqli_real_escape_string($conn, $_POST['plate']);
			$ticket           = mysqli_real_escape_string($conn, $_POST['ticket']);
			$violation        = $_POST['driver_violation'];
			$violation        = str_replace("'", "\'", $violation);
			$violation_date   = mysqli_real_escape_string($conn, $_POST['violation_date']);
			$vehicle          = mysqli_real_escape_string($conn, $_POST['vehicle']);
			$ownership        = mysqli_real_escape_string($conn, $_POST['ownership']);
			$accident         = mysqli_real_escape_string($conn, $_POST['accident']);
			$date_paid        = mysqli_real_escape_string($conn, $_POST['date_paid']);
			$official_receipt = mysqli_real_escape_string($conn, $_POST['official_receipt']);

			$all_violations=""; 

  	  foreach($violation as $violate)  
      {  
         $all_violations .= $violate.",";  
      }

			$update = mysqli_query($conn, "UPDATE violators SET name='$name', gender='$gender', civil_status='$civil', province='$province', municipality='$municipality', barangay='$barangay', contact='$contact', confiscated_Id='$confiscated', plate_no='$plate', traffic_offense_ticket='$ticket', violators_violation='$all_violations', date_violated='$violation_date', vehicle_type='$vehicle', ownership='$ownership', accident='$accident', date_paid='$date_paid', official_receipt='$official_receipt' WHERE violator_Id='$violator_Id'");
					if($update) {
            $_SESSION['message'] = "Record has been updated!";
            $_SESSION['text'] = "Updated successfully!";
		        $_SESSION['status'] = "success";
						header("Location: violators.php");
          } else {
          	$_SESSION['message'] = "Something went wrong while saving the information.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: violators.php");
          }
	}




	// RELEASED IMPOUND
	if(isset($_POST['release_impound'])) {

			$impound_Id  = $_POST['impound_Id'];
			$date        = date('Y-m-d');

			$update = mysqli_query($conn, "UPDATE impound SET release_status='Released', release_date='$date' WHERE impound_Id='$impound_Id' ");
			
			if($update) {
        $_SESSION['message'] = "Vehicle has been set to released!";
        $_SESSION['text'] = "Released successfully!";
        $_SESSION['status'] = "success";
				header("Location: impound.php");
      } else {
      	$_SESSION['message'] = "Something went wrong while updating the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: impound.php");
      }
	}





	if(isset($_POST['update_violator_profile'])) {

		$violator_Id = $_POST['violator_Id'];
		$file        = basename($_FILES["fileToUpload"]["name"]);

		  // Check if image file is a actual image or fake image
	    $target_dir = "../images-violators/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check == false) {
			    $_SESSION['message']  = "Selected file is not an image.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
					header("Location: violators.php");
		    	$uploadOk = 0;
		  } 

			// Check file size // 500KB max size
			elseif ($_FILES["fileToUpload"]["size"] > 500000) {
			  	$_SESSION['message']  = "File must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
					header("Location: violators.php");
		    	$uploadOk = 0;
			}

	    // Allow certain file formats
	    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
				header("Location: violators.php");
	    	$uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    elseif ($uploadOk == 0) {
		    $_SESSION['message']  = "Your file was not uploaded.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			headerheader("Location: violators.php");

	    // if everything is ok, try to upload file
	    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	          	$save = mysqli_query($conn, "UPDATE violators SET image='$file' WHERE violator_Id='$violator_Id'");
	     
	            if($save) {
	            	$_SESSION['message'] = "Profile picture has been updated!";
		            $_SESSION['text'] = "Updated successfully!";
			        	$_SESSION['status'] = "success";
								header("Location: violators.php");
	            } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        	$_SESSION['status'] = "error";
								header("Location: violators.php");
	            }
	        } else {
	            $_SESSION['message'] = "There was an error uploading your file.";
	            $_SESSION['text'] = "Please try again.";
		        	$_SESSION['status'] = "error";
							header("Location: violators.php");
	        }

			}
	}

?>