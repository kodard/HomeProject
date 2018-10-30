<html>
<head>
  <title>KODARD HOME</title>
</head>
<body>
    <!-- units 폴더의 php 리스트 출력  -->
    <?php
      $dir="./units";
      $i=2;
      $list = scandir($dir);
      while($i<count($list)){
        echo "<a href='$dir/$list[$i]'><li>$list[$i]</li></a>\n";
        $i=$i+1;
      }
    ?>
</body>
</html>