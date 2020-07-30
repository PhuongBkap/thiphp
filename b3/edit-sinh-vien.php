<?php include 'header.php';
$lop_hoc = mysqli_query($conn,"select *from lop_hoc");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from sinh_vien where id = $id";
    $sinh_vien = mysqli_query($conn,$sql);
    $sv = mysqli_fetch_assoc($sinh_vien);
    # code...
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $lop_hoc_id = $_POST['lop_hoc_id'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];
    if (isset($_FILES['avatar'])) {
        $file = $_FILES['avatar'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'],'../uploads'.$file_name);
        # code...
    }
    $sql = "update sinh_vien set
    name = '$name',
    lop_hoc_id = '$lop_hoc_id',
    birthday = '$birthday',
    gender = '$gender',
    avatar = '$file_name',
    about = '$about' where id = $id
    ";
    $query = mysqli_query($conn,$sql);
    if ($query) {
        header('location:list-sinh-vien.php');
        # code...
    }else{
        echo 'That bai !';

    }
    # code...
}
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Chỉnh Sửa Sinh Viên</h3>
    </div>
    <br>
    <form action="" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên sinh viên</label><span>*</span>
            <input class="form-control" name="name" placeholder="Nhập tên sinh viên" value="<?php echo $sv['name']?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Chọn lớp học</label><span>*</span>
            <select name="lop_hoc_id" class="form-control" required>
                <option value="">--Chọn lớp học--</option>
                <?php foreach ($lop_hoc as $key => $value):?>
                    <option value="<?php echo $value['id'] ?>" <?php echo ($value['id']==$sv['lop_hoc_id']?'selected':'')?>><?php echo $value['name']?></option>
                <?php endforeach ?>
                
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Ngày sinh</label><span>*</span>
            <input type="date" class="form-control" name="birthday" placeholder="Nhập Ngày sinh" value="<?php echo $sv['birthday']?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Giới tính</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="1" <?php  echo (($sv['gender']==1)?'checked':'')?>> Nam
                </label>
                <label>
                    <input type="radio" name="gender" value="0" <?php echo (($sv['gender']==0)?'checked':'')?>> Nữ
                </label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh đại diện</label>
            <input type="file" name="avatar">
            <div class="col-md-4 avatar-img">
                <img src="../uploads<?php echo $sv['avatar']?>" alt="" class="img-responsive">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Giới thiệu bản thân</label>
            <textarea name="about" class="form-control" placeholder="Giới thiệu bản thân"><?php echo $sv['about']?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<?php include 'footer.php'; ?>