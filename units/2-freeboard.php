<?php

  $savebox = "temp";
  if($_POST['title']!=null){
  file_put_contents($savebox.'/'.$_POST['title'],$_POST['description']);
  };
  
  // 리다이렉션 코드
  // header('Location: /index.php?id='.$POST['title']);

?>
<html>
<head>
  <title>KODARD HOME</title>
</head>
<body>
  <center>
    <form action="2-freeboard.php" method="POST">
    	<p>
    		<input type="text" name="title" style="width:200px">
    	</p>
    	<p>
    		<textarea name="description" style="width:200px">
        </textarea>
    	</p>
    	<p>
    		<input type="submit">
    	</p>
    </form>
    <hr>
    <?php
      $list = scandir($savebox);
      $i = 2;
      while($i<count($list)){
        echo "<a href='$list[$i]'>$list[$i]</a><br>";
        $i = $i + 1;
      }
    ?>
  </center>
</body>
</html>