<?php  

	session_start();

	// check that session already set or not include time of session got expire or not
	// also update last activity to session
	// if someone login return true 
	// if no one return false
	function checkSession()
	{
		# code...
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
		    // last request was more than 1 minutes ago
		    session_unset();     // unset $_SESSION variable for the run-time 
		    session_destroy();   // destroy session data in storage
		}
		else {

			$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
			if (isset($_SESSION['uid'])){
				return true;
			}
		}
		return false;
	}
?>