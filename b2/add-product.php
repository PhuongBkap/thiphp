<?php include 'header.php';
include'connection.php';
$category = mysqli_query($conn,"select * from category");
// $nameErr = $category_idErr = $priceErr = $statusErr = $descriptionErr ="";
// $name = $category_id = $price = $status = $description = "";
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (empty($_POST["name"])) {
//     $nameErr = "Name is required";
//   } else {
//     $name = test_input($_POST["name"]);
//   }

//   // if (empty($_POST["category_id"])) {
//   //   $category_idErr = "category_id is required";
//   // } else {
//   //   $category_id = test_input($_POST["category_id"]);
//   // }

//   if (empty($_POST["price"])) {
//     $priceErr = "Price is required";
//   } else {
//     $price = test_input($_POST["price"]);
//   }

//   if (empty($_POST["statusErr"])) {
//     $statusErr = "Status is required";
//   } else {
//     $status = test_input($_POST["statusErr"]);
//   }

//   if (empty($_POST["description"])) {
//     $descriptionErr = "description is required";
//   } else {
//     $description = test_input($_POST["description"]);
//   }
// }
// function test_input($product) {
//   $product =  "insert into product (name,category_id,price,status,image,description) value ('$name','$category_id','$price','$status','$file_name','$description')";
//   $product = stripslashes($product);
//   $product = htmlspecialchars($product);
//   return $product;
// }
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $description= $_POST['description'];
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp.name'],'../uploads'.$file_name);
        # code...
    }
    $sql = "insert into product (name,category_id,price,status,image,description) value ('$name','$category_id','$price','$status','$file_name','$description')";
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
        <h3 class="panel-title">Thêm Mới Sản Phẩm</h3>
    </div>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên sản phẩm</label><span>*</span>
            <input class="form-control" name="name" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Danh mục sản phẩm</label><span>*</span>
            <select name="category_id" class="form-control" required="required">
                <option value="1">--Chọn Danh Mục--</option>
                <?php foreach ($category as $key => $value):?>
                   <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                <?php endforeach  ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Giá sản phẩm</label><span>*</span>
            <input class="form-control" name="price" placeholder="Nhập giá sản phẩm">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Trạng thái sản phẩm</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="1" checked="checked"> Hiện
                </label>
                <label>
                    <input type="radio" name="status" value="0"> Ẩn
                </label>
               
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh sản phẩm</label>
            <input type="file" name="image">
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Mô tả sản phẩm</label>
            <textarea name="description" class="form-control" placeholder="Mô tả sản phẩm"></textarea>
           
        </div>
        <button type="submit" class="btn btn-primary"  value="submit">Thêm Mới</button>
    </form>
</div>

<?php include 'footer.php'; ?>