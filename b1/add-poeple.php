<?php
 include 'header.php';
 include 'connection.php';
    //$conn = mysqli_connect('location','root','','phpbkap');
    $province = mysqli_query($conn, "select * from province");
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $province_id = $_POST['province_id'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $about = $_POST['about'];
        if (isset($_FILES['avatar'])) {
            $file = $_FILES['avatar'];
            $file_name = $file['name'];
            move_uploaded_file($file['tmp_name'],'../uploads'.$file_name);
            # code...
        }
        $sql = "insert into people (name,province_id,birthday,gender,avatar,about) value ('$name','$province_id','$birthday','$gender','$file_name','$about') ";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            header('location:list-poeple.php');
        }
        else {
            echo 'Thêm mới thất bại !';
     
        }
        # code...
    }
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Thêm Mới Người dân</h3>
    </div>
    <br>
    <form action="" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên Người dân</label><span>*</span>
            <input class="form-control" name="name" placeholder="Nhập tên Người dân">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Chọn thành phốc</label><span>*</span>
            <select name="province_id" class="form-control" required>
                <option value="1">--Chọn thành phố--</option>
                <?php foreach ($province as $key => $value):?>
                     <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Ngày sinh</label><span>*</span>
            <input type="date" class="form-control" name="birthday" placeholder="Nhập Ngày sinh">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Giới tính</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="1"> Nam
                </label>
                <label>
                    <input type="radio" name="gender" value="0"> Nữ
                </label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh đại diện</label>
            <input type="file" name="avatar">
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Giới thiệu bản thân</label>
            <textarea name="about" class="form-control" placeholder="Giới thiệu bản thân"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Mới</button>
    </form>
</div>
<?php include 'footer.php'; ?>