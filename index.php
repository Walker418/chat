<!DOCTYPE html>
<html>
	<head>
		<title>ログイン</title>
	</head>
	<body>
		<h1>ログイン</h1>
		<form action="chat.php" method="POST">
			ユーザーID:<input type="text" name="id" value="<?= $_COOKIE['id'] ?>"><br>
			パスワード:<input type="password" name="pw"><br>
			<button>ログイン</button>
		</form>
		<a href="userinfo.php">ユーザー登録</a>
	</body>
</html>
