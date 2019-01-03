<!DOCTYPE html>
<html>
	<head>
		<title>ログイン</title>
		<style>
			.loginform
			{
				border: 5px solid #5abbe4;
				padding: 25px;
				width: 300px;
			}
			h1
			{
				font-size: 24px;
			}
			.textfield_label
			{
				display: inline-block;
				width: 8em;
			}
			.loginbutton
			{
				font-size: 16px;
			}
			.registration
			{
				text-align: right;
			}
		</style>
	</head>
	<body>
		<div class="loginform">
			<h1>ログイン</h1>
			<form action="chat.php" method="POST">
				<p>
					<label for="userid" class="textfield_label">ユーザーID:</label>
					<input type="text" name="id" value="<?= $_COOKIE['id'] ?>" autofocus required>
				</p>
				<p>
					<label for="password" class="textfield_label">パスワード:</label>
					<input type="password" name="pw" required>
				</p>
				<button class="loginbutton">ログイン</button>
			</form>
			</br>
			<p class="registration">
				<a href="userinfo.php" >ユーザー登録はこちら</a>
			</p>
		</div>
	</body>
</html>
