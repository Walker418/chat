<?php
	function connectDB()
	{
		$dsn = 'mysql:dbname=chat;host=127.0.0.1';
		$user = 'root';
		$pw = 'H@chiouji1';
		
		return (new PDO($dsn, $user, $pw));
	}
	
	class APIBase
	{
		protected function sendjson($flag, $body=null)
		{
			echo json_encode
			([
				"head" => ["status" => $flag], "body" => $body
			]);
		}
	}
	
	class ChatAPI extends APIBase
	{
		// ログイン
		function auth($id, $pw)
		{
			$sql = "SELECT user_id, pw, name FROM user WHERE user_id=?";
			
			try
			{
				$dbh = connectDB();
				$sth = $dbh->prepare($sql);
				$sth->execute([$id]);
				$buff = $sth->fetch(PDO::FETCH_ASSOC);
				
				if($buff && $buff["pw"] === $pw)
				{
					session_start();
					$_SESSION['id'] = $id;
					$_SESSION['name'] = $buff['name'];
					$flag = true;
				}
				else
				{
					$flag = false;
				}
			}
			catch(PDOException $e)
			{
				$flag = false;
			}
			
			$this->sendjson($flag);
		}
	
		// メッセージの取得
		function get($name=null)
		{
			$result = [];
			$value = [];
			
			if ($name === null)
			{
				$sql = 'SELECT name, message, time '
				. ' FROM log, user '
				. ' WHERE log.user_id=user.user_id';
			}
			else
			{
				$sql = "SELECT * FROM log WHERE name=?";
				$value[] = $name;
			}
			
			$flag = false;
			try {
				$dbh = connectDB();
				$sth = $dbh->prepare($sql);
				$sth->execute($value);
				
				while (true)
				{
					$buff = $sth->fetch(PDO::FETCH_ASSOC);
					if ($buff === false)
					{
						break;
					}
					
					$result[] = [
						"name" => $buff["name"],
						"message" => $buff["message"],
						"time" => $buff["time"]
					];
				}
				
				$flag = true;
			}
			catch (PDOException $e)
			{
				$flag = false;
			}
			
			$this->sendjson($flag, $result);
		}
		
		// メッセージの書き込み
		function set($message)
		{
			session_start();
			if(!array_key_exists('id', $_SESSION))
			{
				$this->sendjson(false);
				return(false);
			}
			
			$sql = 'INSERT INTO log(user_id,message,time) VALUES(?,?,?)';
			try
			{
				$dbh = connectDB();
				$dbh->beginTransaction();
				$sth = $dbh->prepare($sql);
				$sth->execute([
						$_SESSION['id'],
						$message,
						date("Y-m-d H:i:s", time())]
				);
				$dbh->commit();
				$flag = true;
			}
			catch (PDOException $e)
			{
				$dbh->rollBack();
				$flag = false;
			}
			
			$this->sendjson($flag);
		}
		
		// ユーザーの追加
		function registration($uname, $pw)
		{		
			// データベースにユーザー情報を追加
			$sql = 'INSERT INTO user(pw,name) VALUES(?,?)';
			try
			{
				$dbh = connectDB();
				$dbh->beginTransaction();
				$sth = $dbh->prepare($sql);
				$sth->execute
				([
					$pw,
					$uname
				]);
				$dbh->commit();
				$flag = true;
			}
			catch (PDOException $e)
			{
				$dbh->rollBack();
				$flag = false;
			}
			
			$this->sendjson($flag);
		}
	}
?>
