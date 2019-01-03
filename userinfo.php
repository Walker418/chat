<!DOCTYPE html>
<html>
	<head>
		<title>ユーザー登録</title>
		<style>
			.userinfoform
			{
				border: 5px solid #5abbe4;
				padding: 25px;
				width: 335px;
			}
			h1
			{
				font-size: 24px;
			}
			.textfield_label
			{
				display: inline-block;
				width: 10em;
			}
			.submitbutton
			{
				font-size: 16px;
			}
			.return
			{
				text-align: right;
			}
		</style>
	</head>
	<body>
		<div class="userinfoform">
			<h1>ユーザー登録</h1>
			<form action="useradded.php" method="POST">
				<p>
					<label for="username" class="textfield_label">ユーザー名：</label>
					<input type="text" name="uname" autofocus required>
				</p>
				<p>
					<label for="password" class="textfield_label">パスワード：</label>
					<input type="password" name="pw" required>
				</p>
				<p>
					<label for="password_conf" class="textfield_label">パスワードの再入力：</label>
					<input type="password" name="pw_conf" required>
				</p>
					<button  class="submitbutton">ユーザー情報を登録</button>
			</form>
			<p class="return">
				<a href="index.php">ログイン画面に戻る</a>
			</p>
		</div>
	</body>
</html>
