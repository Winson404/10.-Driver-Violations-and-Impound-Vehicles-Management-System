<?php 
	include '../config.php';


	// SAVE ADMIN
	if(isset($_POST['create_admin'])) {

		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);
		$usertype        = $_POST['usertype'];

		$check_email = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
						// $_SESSION['exists']  = "Email is already taken.";
      //       header("Location: admin.php");
            $_SESSION['message'] = "Email is already taken.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: admin.php");
		} else {

			if($password != $cpassword) {
							// $_SESSION['exists']  = "Password does not matched.";
       //      	header("Location: admin.php");
            	$_SESSION['message'] = "Password does not matched.";
	            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
							header("Location: admin.php");
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
                     	
                      	$save = mysqli_query($conn, "INSERT INTO admin (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered, user_type) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered', '$usertype')");

                            if($save) {
                            	$_SESSION['message'] = "Admin information has been successfully saved!";
									            $_SESSION['text'] = "Saved successfully!";
											        $_SESSION['status'] = "success";
															header("Location: admin.php");
	                            // $_SESSION['success']  = "Admin information has been successfully saved!";
	                            // header("Location: admin.php");                                
                            } else {
                              // $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
                              // header("Location: admin.php");
                              $_SESSION['message'] = "Something went wrong while saving the information. Please try again.";
									            $_SESSION['text'] = "Please try again.";
											        $_SESSION['status'] = "error";
															header("Location: admin.php");
                            }
                      } else {
                      				$_SESSION['message'] = "There was an error uploading your file.";
									            $_SESSION['text'] = "Please try again.";
											        $_SESSION['status'] = "error";
															header("Location: admin.php");
                              // $_SESSION['exists'] = "There was an error uploading your file.";
                              // header("Location: admin.php");
                      }
				 }

			}

		}

	}





	// IMPOUND
	if(isset($_POST['impound'])) {

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


			$exist = mysqli_query($conn, "SELECT * FROM impound WHERE chassis_no='$chassis' AND engine_no='$engine' AND plate_no='$plate'");
			if(mysqli_num_rows($exist) > 0) {
					$_SESSION['message'] = "This vehicle has already been added.";
					$_SESSION['text'] = "Record already exist.";
		      $_SESSION['status'] = "error";
				  header("Location: impound.php");
			} else {

					$save = mysqli_query($conn, "INSERT INTO impound (impound_violator_Id, ticket, chassis_no, engine_no, plate_no, color, impound_penalty, date_impound, vehicle, ownership, accident, official_receipt) VALUES ('$violators_name', '$ticket', '$chassis', '$engine', '$plate', '$color', '$penalty', '$date_impounded', '$vehicle', '$ownership', '$accident', '$official_receipt')");
					if($save) {
            $_SESSION['message'] = "New record has been added!";
            $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
						header("Location: impound.php");
          } else {
          	$_SESSION['message'] = "Something went wrong while saving the information.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: impound.php");
          }
			}
	}




	// VIOLATION
	if(isset($_POST['violation'])) {

			$violation  = $_POST['violationname'];
			$penalty    = $_POST['penalty'];

			$exist = mysqli_query($conn, "SELECT * FROM violations WHERE violation='$violation'");
			if(mysqli_num_rows($exist) > 0) {
					$_SESSION['message'] = "Violation name has already been added.";
					$_SESSION['text'] = "Record already exist.";
		      $_SESSION['status'] = "error";
				  header("Location: violations.php");
			} else {

					$save = mysqli_query($conn, "INSERT INTO violations (violation, penalty) VALUES ('$violation', '$penalty')");
					if($save) {
            $_SESSION['message'] = "New record has been added!";
            $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
						header("Location: violations.php");
          } else {
          	$_SESSION['message'] = "Something went wrong while saving the information.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: violations.php");
          }
			}
	}





	// VIOLATORS
	if(isset($_POST['violators'])) {

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
			$violation                  = str_replace("'", "\'", $violation);
			$violation_date   = mysqli_real_escape_string($conn, $_POST['violation_date']);
			$vehicle          = mysqli_real_escape_string($conn, $_POST['vehicle']);
			$ownership        = mysqli_real_escape_string($conn, $_POST['ownership']);
			$accident         = mysqli_real_escape_string($conn, $_POST['accident']);
			$date_paid        = mysqli_real_escape_string($conn, $_POST['date_paid']);
			$official_receipt = mysqli_real_escape_string($conn, $_POST['official_receipt']);
			$date             = date('Y-m-d');

			$all_violations=""; 

  	  foreach($violation as $violate)  
      {  
         $all_violations .= $violate.",";  
      }


			$exist = mysqli_query($conn, "SELECT * FROM violators WHERE name='$name'");
			if(mysqli_num_rows($exist) > 0) {
					$_SESSION['message'] = "This violator has already a record. Just update violators record.";
					$_SESSION['text'] = "Record already exist.";
		      $_SESSION['status'] = "error";
				  header("Location: violators.php");
			} else {

					$save = mysqli_query($conn, "INSERT INTO violators (name, gender, civil_status, province, municipality, barangay, contact, confiscated_Id, plate_no, traffic_offense_ticket, violators_violation, date_violated, vehicle_type, ownership, accident, date_paid, official_receipt, date_added) VALUES ('$name', '$gender', '$civil', '$province', '$municipality', '$barangay', '$contact', '$confiscated', '$plate', '$ticket', '$all_violations', '$violation_date', '$vehicle', '$ownership', '$accident', '$date_paid', '$official_receipt', '$date')");
					if($save) {
            $_SESSION['message'] = "New record has been added!";
            $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
						header("Location: violators.php");
          } else {
          	$_SESSION['message'] = "Something went wrong while saving the information.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: violators.php");
          }
			}
	}





?>