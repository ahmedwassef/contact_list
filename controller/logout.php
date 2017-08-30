<?php

	@session_start();
	$_SESSION=array();
	session_destroy();
	setcookie('user_id','',time()-9);
	setcookie('user_name','',time()-9);
	setcookie('user_email','',time()-9);
	header('Location: ../login.php');
	exit;