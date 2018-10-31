<?php

  // 디렉토리 경로설정
  mkdir('./monster/list',0777,true);
  $mondir = './monster/list/';
  $root = 'index.php';

  // 등록폼 제출시 페이지리로드 & 파일생성
  if(isset($_POST['name'])){
    file_put_contents($mondir.$_POST['name'],$_POST['colour']);
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>WELCOME TO MONSTER PARK</title>
</head>
<body>


<h2>Make Monster</h2>
<form method="POST" action='index.php'>
  <p style='border:1px solid black;padding:10px'>
    name : <input type="text" name="name">
    detail : <input type="text" name="colour">
    <input type="submit">
  </p>
</form>


<h2>Monster Directory</h2>
<!-- 몬스터디렉토리의 목록 불러오기 -->
<p style='border:1px solid black;padding:10px'>
  <?php
      $list = scandir('monster/list');
      $i = 0;
      while($i < count($list)){
        if($list[$i]!='.'){
          if($list[$i]!='..'){
             echo '<a href="'.$root.'?selid='.$list[$i].'">'.$list[$i].'</a><br>';
          }
        }
       $i = $i + 1;
    }
    if(count($list)==2){
      echo 'no monsters yet...';
    }
  ?>
</p>



<h2>Monster Details</h2>
<!-- 위 리스트에서 선택된 몬스터의 정보 -->
<?php
  if(isset($_GET['selid'])){
    if($_GET['id']=='modifyMonster'){

      echo "youyou";
      echo $_GET['selid'];
    }else if($_GET['id']=='deleteMonster'){
      echo "delete?";
    }else{
      $pageURL = './monster/list/'.$_GET['selid'];
      echo 'name: '.$_GET['selid'].'<br>';
      echo 'detail: '.file_get_contents($pageURL);
    }
?>
<br><br>
<!-- 몬스터 수정할것인가요? -->
<a href='<?=$root?>?id=modifyMonster&selid=<?=$_GET['selid']?>'>... Change name ?</a><br>
<a href='<?=$root?>?id=deleteMonster&selid=<?=$_GET['selid']?>'>... Delete monster ?</a><br>
<?php
  }else{
    echo "no monster selected";
  }
?>



<h2>File Control</h2>
<!-- 현재경로확인, 폴더만들기, 현재폴더 리스트출력 -->
<?php
  echo "make directory : <b>mkdir</b>('./you/are/precious',0777,true)<br>";
  echo "current directory address: <b>getcwd</b>();<br>";
  echo "get list of directory : <b>scandir</b>('./');<br>";
  echo "size of list : <b>count</b>();<br>";
  echo "my cwd<p style='border:1px solid black'>";
  echo "---------------------------------------------<br>";
  echo getcwd().'<br>';
  mkdir('./data/you/are/precious',0777, true);
  $list = scandir('./');
  $i = 0;
  while($i < count($list)){
    echo 
    $list[$i]
    .'&ensp;| strlen() : '.strlen($list[$i]).'<br>';
    $i = $i + 1;
  }
  echo "</p>";
?>

<h2>Colour Palette</h2>
<table>
<tr><td style="background-color:#007bff;width:300px"></td><td>#007bff</td></tr>
<tr><td style="background-color:#6610f2;width:300px"></td><td>#6610f2</td></tr>
<tr><td style="background-color:#6f42c1;width:300px"></td><td>#6f42c1</td></tr>
<tr><td style="background-color:#e83e8c;width:300px"></td><td>#e83e8c</td></tr>
<tr><td style="background-color:#dc3545;width:300px"></td><td>#dc3545</td></tr>
<tr><td style="background-color:#fd7e14;width:300px"></td><td>#fd7e14</td></tr>
<tr><td style="background-color:#ffc107;width:300px"></td><td>#ffc107</td></tr>
<tr><td style="background-color:#28a745;width:300px"></td><td>#28a745</td></tr>
<tr><td style="background-color:#20c997;width:300px"></td><td>#20c997</td></tr>
<tr><td style="background-color:#17a2b8;width:300px"></td><td>#17a2b8</td></tr>
<tr><td style="background-color:#fff;width:300px"></td><td>#fff</td></tr>
<tr><td style="background-color:#f8f9fa;width:300px"></td><td>#f8f9fa</td></tr>
<tr><td style="background-color:#6c757d;width:300px"></td><td>#6c757d</td></tr>
<tr><td style="background-color:#343a40;width:300px"></td><td>#343a40</td></tr>
<tr><td style="background-color:#007bff;width:300px"></td><td>#007bff</td></tr>
</table>
</body>
</html>