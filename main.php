<?php

	
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);

	if( isset($_SESSION['ERRORS']) && is_array($_SESSION['ERRORS']) && count($_SESSION['ERRORS']) >0 ) {
	echo '<ul class="err">';
	foreach($_SESSION['ERRORS'] as $msg) {
	echo '<li>',$msg,'</li>';
	}
	echo '</ul>';
	unset($_SESSION['ERRORS']);
	}
	

	//In this section it will be using session to display the errors
?>