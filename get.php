<?php
	require("lib.php");
	
	$chat = new ChatAPI();
	if (array_key_exists("id", $_GET))
	{
		$chat->get($_GET["id"]);
	}
	else
	{
		$chat->get();
	}
?>
