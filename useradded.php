<?php
	$uname = $_POST["uname"];
	$pw = $_POST["pw"];
	$pw_conf = $_POST["pw_conf"];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ユーザー登録完了</title>
	</head>
	<body>
		<a href="index.php">ログイン画面に戻る</a>
	</body>
	<script>
		window.onload = function()
		{
			var request = new XMLHttpRequest();
			request.open('POST', 'http://127.0.0.1/chat/registration.php', false);
			request.onreadystatechange = function()
			{
				if (request.status === 200 || request.status === 304)
				{
					var response = request.responseText;
					var json = JSON.parse(response);
					
					if (json["head"]["status"] === false)
					{
						alert("ユーザーの登録が失敗しました");
					}
					else
					{
						alert("ユーザーの登録が完了しました");
					}
				}
			};
			
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send
			(
				"uname=" + encodeURIComponent("<?php echo $uname; ?>") + "&" +
				"pw=" + encodeURIComponent("<?php echo $pw; ?>")
			);
		};
	</script>
</html>
