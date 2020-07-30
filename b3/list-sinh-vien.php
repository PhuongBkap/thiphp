<?php include 'header.php';
$sinh_vien = mysqli_query($conn,"select sinh_vien.*, lop_hoc.name as 'Namelophoc'
 from sinh_vien join lop_hoc 
 on sinh_vien.lop_hoc_id = lop_hoc.id");
$sql = "select * from sinh_vien";
$lop_hoc = mysqli_query($conn,"select * from lop_hoc");
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách sinh viên</h3>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="ct">STT</th>
                <th class="ct">Ảnh</th>
                <th>Tên sinh viên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinh_vien as $key => $value): ?>
            <tr>
                <td class="ct"><?php echo $key+1 ?></td>
                <td class="ct">
                    <img src="../uploads<?php echo $value['avatar'] ?>" alt="" width="50px">
                </td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['birthday'] ?></td>
                <td>
                    <?php echo (($value['gender'] ==0)?'Nu':'Nam') ?>
                </td>
                <td class="ct">
                    <a href="edit-sinh-vien.php?id=<?php echo $value['id']?>" class="btn btn-xs btn-primary">Sửa</a>
                    <a href="delete-sinh-vien.php?id=<?php echo $value['id']?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>