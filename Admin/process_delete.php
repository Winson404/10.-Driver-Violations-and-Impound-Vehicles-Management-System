<?php 
	include '../config.php';


	// DELETE ADMIN
	if(isset($_POST['delete_admin'])) {
		$admin_Id = $_POST['admin_Id'];

		$delete = mysqli_query($conn, "DELETE FROM admin WHERE admin_Id='$admin_Id'");
		  if($delete) {
	        $_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
		    $_SESSION['status'] = "success";
			header("Location: admin.php");
	      } else {
	      	$_SESSION['message'] = "Something went wrong while deleting the information.";
	        $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: admin.php");
	      }
	}


	// DELETE IMPOUND
	if(isset($_POST['delete_impound'])) {
		$impound_Id = $_POST['impound_Id'];

		$delete = mysqli_query($conn, "UPDATE impound SET deleted=1 WHERE impound_Id='$impound_Id'");
		  if($delete) {
	        $_SESSION['message'] = "Record has been moved to arhived!";
	        $_SESSION['text'] = "Success";
		    $_SESSION['status'] = "success";
			header("Location: Impound.php");
	      } else {
	      	$_SESSION['message'] = "Something went wrong while moving the record to arhive folder.";
	        $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: Impound.php");
	      }
	}




	// DELETE VIOLATION
	if(isset($_POST['delete_violation'])) {
		$violation_Id = $_POST['violation_Id'];

		$delete = mysqli_query($conn, "DELETE FROM violations WHERE violation_Id='$violation_Id'");
		  if($delete) {
	        $_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
		    $_SESSION['status'] = "success";
			header("Location: violations.php");
	      } else {
	      	$_SESSION['message'] = "Something went wrong while deleting the information.";
	        $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: violations.php");
	      }
	}


	// DELETE VIOLATOR
	if(isset($_POST['delete_violator'])) {
		$violator_Id = $_POST['violator_Id'];

		$delete = mysqli_query($conn, "UPDATE violators SET deleted=1 WHERE violator_Id='$violator_Id'");
		  if($delete) {
	        $_SESSION['message'] = "Record has been moved to arhived!";
	        $_SESSION['text'] = "Success";
		    $_SESSION['status'] = "success";
			header("Location: violators.php");
	      } else {
	      	$_SESSION['message'] = "Something went wrong while moving the record to arhive folder.";
	        $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: violators.php");
	      }
	}

















	// ADMIN LOGOUT 
	if(isset($_POST['logout'])) {
		$admin_Id   = $_POST['admin_Id'];
		$logDate    = $_POST['logDate'];
		$logoutDate = date("F d, Y H:i:s");
		$exist = mysqli_query($conn, "SELECT * FROM log WHERE adminID='$admin_Id' AND logDate='$logDate' ");
		if(mysqli_num_rows($exist) > 0 ) {
			$update = mysqli_query($conn, "UPDATE log SET logoutDate='$logoutDate' WHERE adminID='$admin_Id' AND logDate='$logDate'");
			if($update) {
				header("Location: ../logout.php");
			} else {
				$_SESSION['message'] = "Can not log you out.";
		        $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: dashboard.php");
			}

		} else {
			$_SESSION['message'] = "You were not the same user as before";
	        $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: dashboard.php");
		}
		  
	}



?>
