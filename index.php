<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title> Management</title>
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
				Quản lý thông tin sản phẩm
				<form method="get">
					<input type="text" name="" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo mã hoá đơn">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>mã chi tiết hoá đơn</th>
							<th>mã  hoá đơn</th>
							<th>mã khách hàng</th>
							<th> số lượng</th>
							
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php
if (isset($_GET['mahd']) && $_GET['mahd'] != '') {
	$sql = 'select * from chitiethoadon where mahd like "%'.$_GET['mahd'].'%"';
} else {
	$sql = 'select * from chitiethoadon';
}

$hdList = executeResult($sql);

$index = 1;
foreach ($hdList as $std) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$std['macthd'].'</td>
			<td>'.$std['mahd'].'</td>
			<td>'.$std['makh'].'</td>
			<td>'.$std['soluong'].'</td>
			
			<td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['id'].'","_self")\'>Edit</button></td>
			<td><button class="btn btn-danger" onclick="delete('.$std['id'].')">Delete</button></td>
		</tr>';
}
?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('input.php', '_self')">Add </button>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function delete(id) {
			option = confirm('Bạn có muốn xoá cái này này không')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('delete_chitietsanpham.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
</body>
</html>