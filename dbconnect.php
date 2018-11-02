<?php
	
	// DB connection
	// $servername = "localhost"; error occured.
	$servername = "127.0.0.1";
	$username = "kodard";
	$password = "9999";
	$dbname = "monsterpark";
	$conn = new mysqli($servername,$username,$password, $dbname);
			// DB연결오류시, 오류내용출력
			if($conn->connect_error){
				die("connection failed".$conn->connect_error);
			}

	// 리다이렉션된후 사용자정보 db에 추가
	if($_POST['title']){
		$title = $_POST['title'];
		$pass = $_POST['pass'];
		$about = $_POST['about'];
		$userinfo = "'".$title."','".$pass."','".$about."'";
		$sql = "
			INSERT INTO member(title,pass,about,created)
			VALUES (".$userinfo.",now());
		";
		mysqli_query($conn, $sql);
		echo "*** ".$title."님 성공적으로 등록되었습니다 ***" ;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FreeBoard</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>join us !</h1>
	<h4>at the moment, this page only working with my local computer ...</h4>
	<ol>
		<!-- <li><a href="#">join us !</a></li> -->
	</ol>
	<h2>Welcome</h2>
	<form action="dbconnect.php" method="POST">
		<input name="title" type="text" placeholder="nickname"><br>
		<input name="pass" type="text" placeholder="password"><br>
		description<br>
		<textarea name="about"></textarea><br>
		<input type="submit">
	</form>
</body>
</html>