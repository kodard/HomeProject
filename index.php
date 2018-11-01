<?php


  // 디렉토리 경로설정
  mkdir('./monster/list',0777,true);
  $mondir = './monster/list/';
  $root = 'index.php';

  // 페이지에서 쓰일 변수저장
  if(isset($_GET['page'])){$page = $_GET['page']; }
  else if(isset($_POST['page'])){$page = $_POST['page']; }else{$page = "index.php"; }
  if(isset($_GET['mname'])){$mname = $_GET['mname']; }
  else if(isset($_POST['mname'])){$mname = $_POST['mname']; $mdetail = $_POST['mdetail']; }else{$mname = ''; $mdetail = ''; }
  if(isset($_POST['new_name'])){$new_name = $_POST['new_name']; }
  if(isset($_POST['new_detail'])){$new_detail = $_POST['new_detail'];}

  // 리다이렉션 후 CRUD
  if($page == 'createOK'){
    file_put_contents($mondir.$mname, $mdetail);
    $mname='';
  }else if($page == 'modifyOK'){
    rename($mondir.$mname, $mondir.$new_name);
    file_put_contents($mondir.$new_name, $new_detail);
    $mname = $new_name;
    echo "modify Success!";
  }else if($page == 'deleteOK'){
    unlink($mondir.$mname);
    $mname='';
    echo "delete, Success!";
  }

?>

<!DOCTYPE html>
<html>
<head>
<title>WELCOME TO MONSTER PARK</title>
<script>
function createOK(){
  createForm.submit();
}
function modifyOK(){
  modifyForm.submit();
}
function deleteOK(){
  deleteForm.submit();
}
function cancel(){
  location.href = "index.php?";
}
</script>
</head>
<body>


<h2>Make Monster</h2>
<form id="createForm" method="POST" action='index.php'>
  <p style='border:1px solid black;padding:10px'>
    <input type="hidden" name="page" value="createOK">
    name : <input id=create_name" type="text" name="mname">
    detail : <input id="create_detail" type="text" name="mdetail">
    <input type="button" value="create.." onclick="javascript:createOK()">
  </p>
</form>


<h2>Monster Directory</h2>
<!-- 몬스터디렉토리의 목록 불러오기 -->
<p style='border:1px solid black;padding:10px'>
  <?php
      $list = scandir($mondir);
      $i = 0;
      while($i < count($list)){
        if($list[$i]!='.'){
          if($list[$i]!='..'){
             echo '<a href="'.$root.'?mname='.$list[$i].'">'.$list[$i].'</a><br>';
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
  if($mname!=''){
    // 몬스터 정보
    $pageURL = $mondir.$mname;
    $mdetail = file_get_contents($pageURL);
    echo 'name: '.$mname.'<br>';
    echo 'detail: '.$mdetail;
    if($page=='modifyMonster'){
?>
    <!-- 몬스터 수정 -->
    <form id="modifyForm" method="POST" action="index.php">
    <br>
    <input type="hidden" name="page" value="modifyOK">
    <input type="hidden" name="mname" value="<?=$mname?>">
    <input type="hidden" name="mdetail" value="<?=$mdetail?>">
    <input type="text" name="new_name" placeholder="<?=$mname?>" style="width:200px"><br>
    <input type="text" name="new_detail" placeholder="<?=$mdetail?>" style="width:200px"><br><br>
    <input type="button" value="modify.." onclick="javascript:modifyOK()">
    <input type="button" value="cancel" onclick="javascript:cancel()"><br>
    </form>
<?php
    }else if($page=='deleteMonster'){
?>
    <!-- 몬스터 삭제 -->
    <form id="deleteForm" method="POST" action="index.php">
    <br><b>Would you like to delete?</b><br>
    <input type="hidden" name="mname" value="<?=$mname?>">
    <input type="hidden" name="page" value="deleteOK"><br>
    <input type="button" value="delete" onclick="javascript:deleteOK()">
    <input type="button" value="cancel" onclick="javascript:cancel()"><br>
    </form>
<?php 
    }else{
?>
   <br><br>
    <!-- 몬스터 메뉴 -->
    <a href='<?=$root?>?page=modifyMonster&mname=<?=$mname?>'>... Change name ?</a><br>
    <a href='<?=$root?>?page=deleteMonster&mname=<?=$mname?>'>... Delete monster ?</a><br>
<?php
    }
  }else{
    echo "no monsters selected";
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
<?php

  require_once('footer.php');

?>
</html>