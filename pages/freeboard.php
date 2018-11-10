<!DOCTYPE html>
<html>
<head>
	<title>freeboard</title>
	<?php
		require_once('../import.php');
	?>
</head>
<body>
	<?php
		require_once('../header.php');
	?>

	<div class="card" align="center" style="padding:30px;margin:0 20px">
		<div class="col-md-8">
			<div class="md-form">
			  <textarea type="text" id="form7" class="md-textarea form-control" rows="3"></textarea>
			  <label for="form7">Material textarea</label>
			</div>
			<div class="form-group shadow-textarea">
			  <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
			</div>
		</div>
	</div>
	<?php
		require_once('../footer.php');
	?>
</body>
</html>