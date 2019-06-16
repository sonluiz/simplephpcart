<?php
session_start();
include_once "Database.php";
$database = new Database();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</head>
<body>
<div class="container">
    <h2>Giỏ Hàng</h2>
    <p>Danh Sách Chi Tiết Giỏ Hàng.</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>id Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Giá Tiền</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <th>Xóa Khỏi giỏ Hàng</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Camera</td>
            <td></td>
            <td>100000</td>
            <td>2</td>
            <td>200000</td>
            <td><a href="#">Xóa sản phẩm</a></td>
        </tr>
        </tbody>
    </table>

    <div style="margin-bottom: 20px">Tổng Hóa Đơn: <strong>200000đ</strong>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT *FROM products";
            $products = $database ->runQuery($sql);

            ?>
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>

                    <div class="col-sm-6">
                        <form action="process.php" name="product<?php echo $product["id"]?>" method="post">

                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" style="height: 295px; width: 100%; display: block;" src="img/<?php echo $product["product_image"]?>" data-holder-rendered="true">
                                <div class="card-body">
                                    <p class="card-text">product <?php echo $product["product_name"]?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="form-inline">
                                            <input type="text" class="form-control" name="quantily" value="1">
                                            <input type="hidden" class="form-control" name="product_id" value="<?php echo $product["id"]?>">
                                            <input type="hidden" class="form-control" name="action" value="add">
                                            <label style="margin-left: 10px">
                                                <input type="submit" name="submit" class="btn btn-primary" value="thêm vào giỏ hàng">

                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>





</body>
</html>
