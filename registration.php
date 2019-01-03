<?php
	require("lib.php");
	
	$uname = $_POST["uname"];
	$pw = $_POST["pw"];
	
	$chat = new ChatAPI();
	$chat->registration($uname, $pw);
?>
