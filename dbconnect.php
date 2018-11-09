<?php
	
	// DB connection
	// $servername = "localhost";
	 
	// 터미널에서 ./mysql -uroot 실행해야 웹페이지에서 db접속가능해지는 이유...? 

	$servername = "127.0.0.1";
	$username = "root";
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
		echo "*** ".$title."님 성공적으로 등록되었습니다 ***<br>" ;
	}

	// 아이디선택시 회원정보출력
	if($_GET['id']){

	}
	// 아이디정보창에서 수정또는삭제
	if($_GET['id']){
		
	}

	// 리스트 가져오기
	$sql = "SELECT * FROM member LIMIT 1000";
	$result = mysqli_query($conn,$sql);
	$list = '';
	while($row = mysqli_fetch_array($result)){
		$list = $list."<li><a href=\"dbconnect.php?id={$row['id']}\">{$row['title']}</a></li>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>register</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>join us !</h1>
	<h4>at this moment, page only working with my local computer ...</h4>
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
	<h2>member list</h2>
	<?= $list; ?>
</body>
</html>