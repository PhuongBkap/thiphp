<?php include 'header.php';
include'connection.php';
$product = mysqli_query($conn,"select product.*, category.name as 'NameCategory' FROM product 
JOIN category on product.category_id = category.id ");
$category = mysqli_query($conn,"select * from category");
$sql = "select * from product";
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách sản phẩm</h3>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="ct">STT</th>
                <th class="ct">Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($product as $key => $value):?>
            <tr>
                <td class="ct"><?php echo $key+1?></td>
                <td class="ct">
                    <img src="../uploads<?php echo $value['image'] ?>" alt="" width="50px">
                </td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo (($value['status'] == 0)? 'Ẩn' : 'Hiện') ?></td>
                <td  class="ct">
                    <a href="edit-product.php?id=<?php echo $value['id']?>" class="btn btn-xs btn-primary">Sửa</a>
                    <a href="delete-product.php?id=<?php echo $value['id']?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>