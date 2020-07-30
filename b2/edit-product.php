<?php include 'header.php';
include 'connection.php';
$category = mysqli_query($conn,"select * from category");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from product where id = $id";
    $product = mysqli_query($conn,$sql);
    $pro = mysqli_fetch_assoc($product);
    # code...
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
     $price = $_POST['price'];
     $status = $_POST['status'];
     $description = $_POST['description'];
     if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'], '../uploads'.$file_name);
     }
     $sql = "update product set
     name = '$name',
     category_id = '$category_id',
     price = '$price',
     status = '$status',
     image = '$file_name',
     description = '$description' where id = $id";
     $query = mysqli_query($conn,$sql);
     if ($query) {
        header('location:list-product.php');
         # code...
     }
     else{
        echo 'That bai !';
     }
 }
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Chỉnh sửa Sản Phẩm</h3>
    </div>
    <br>
    <form action="" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên sản phẩm</label><span>*</span>
            <input class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="<?php echo $pro['name'] ?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Danh mục sản phẩm</label><span>*</span>
            <select name="category_id" class="form-control" required="required">
                 <option value="">--Chọn Danh Mục--</option>
                    <?php foreach ($category as $key => $value):?>
                     <option value="<?php echo $value['id'] ?>" <?php echo ($value['id']== $pro['category_id'])?'selected':''?>> <?php echo $value['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Giá sản phẩm</label><span>*</span>
            <input class="form-control" name="price" placeholder="Nhập giá sản phẩm" value="<?php echo $pro['price']?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Trạng thái sản phẩm</label>
             <div class="radio">
                <label>
                    <input type="radio" name="status" value="1" <?php echo (($pro['status']==1)?'checked':'')?>> Hien
                </label>
                <label>
                    <input type="radio" name="status" value="0" <?php echo(($pro['status']==0)?'checked':'')?>> An
                </label>
             </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh sản phẩm</label>
            <input type="file" name="image">
            <div class="col-md-4 pro-img">
                <img src="../uploads<?php echo $pro['image'] ?>" alt="" class="img-responsive">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Mô tả sản phẩm</label>
            <textarea name="description" class="form-control" placeholder="Mô tả sản phẩm"><?php echo $pro['description']?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
</div>
<!-- <?php include 'footer.php'; ?> -->