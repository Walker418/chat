<!DOCTYPE html>
<html>
	<head>
		<title>ユーザー登録</title>
	</head>
	<body>
		<h1>ユーザー登録</h1>
		<form action="useradded.php" method="POST">
			ユーザー名：<input type="text" name="uname"><br>
			パスワード：<input type="password" name="pw"><br>
			パスワードの再入力：<input type="password" name="pw_conf"><br>
			<button>ユーザー情報を登録</button>
		</form>
		<a href="index.php">ログイン画面に戻る</a>
	</body>
</html>
