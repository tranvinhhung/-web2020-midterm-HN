<?php
require_once ('dbhelp.php');

$s_macthd = $s_mahd = $s_makh =$s_soluong= '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['macthd'])) {
		$s_macthd = $_POST['macthd'];
	}

	if (isset($_POST['mahd'])) {
		$s_mahd = $_POST['mahd'];
	}

	if (isset($_POST['makh'])) {
		$s_makh = $_POST['makh'];
	}

	if (isset($_POST['soluong'])) {
		$s_soluong= $_POST['soluong'];
	}
	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}

	$s_macthd = str_replace('\'', '\\\'', $s_macthd);
	$s_mahd      = str_replace('\'', '\\\'', $s_mahd);
	$s_makh  = str_replace('\'', '\\\'', $s_makh);
	$s_soluong  = str_replace('\'', '\\\'', $s_soluong);
	$s_id       = str_replace('\'', '\\\'', $s_id);


	if ($s_id != '') {
		//update
		$sql = "update chitiethoadon set macthd = '$s_macthd', mahd = '$s_mahd', makh = '$s_makh',soluong = '$s_soluong' where id = " .$s_id;
	} else {
		//insert
		$sql = "insert into chitiethoadon(macthd, mahd, makh,soluong) value ('$s_macthd', '$s_mahd', '$s_makh',''$_soluong)";
	}

	// echo $sql;

	execute($sql);

	header('Location: index.php');
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from chitiethoadon where id = '.$id;
	$hdList = executeResult($sql);
	if ($hdList != null && count($hdList) > 0) {
		$std        = $hdList[0];
		$s_macthd = $std['macthd'];
		$s_mahd      = $std['mahd'];
		$s_makh  = $std['makh'];
		$s_soluong  = $std['soluong'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add </h2>
			</div>
			<div class="panel-body">
				<form method="post">
				<div class="form-group">
					  <label for="birthday">ma macthd</label>
					  <input type="number" min ="1" class="form-control" id="macthd" name="macthd" value="<?=$s_macthd?>">
					</div>
					<div class="form-group">
					  <label for="birthday">ma hoa don</label>
					  <input type="number" min ="1" class="form-control" id="mahd" name="mahd" value="<?=$s_mahd?>">
					</div>
					<div class="form-group">
					  <label for="address">so luong</label>
					  <input type="text" class="form-control" id="soluong" name="soluong" value="<?=$s_soluong?>">
					</div>
					<div class="form-group">
					  <label for="address">makh </label>
					  <input type="text" class="form-control" id="makh" name="makh" value="<?=$s_makh?>">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>