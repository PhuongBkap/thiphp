<?php 
include 'connection.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "delete from sinh_vien where id = $id";
	$query = mysqli_query($conn,$sql);
	if ($query) {
		header('location:list-sinh-vien.php');
		# code...
	}else{
		echo 'That bai';
	}
	# code...
}
// SINH VIEN thực hiện xóa

// chuyển  hướng về trang danh sách sản phẩm
?>