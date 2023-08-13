<!DOCTYPE html>
<html lang="en">
<!-- DB connection -->
<?php include_once 'db_con.php'; ?>

<!-- Read prodcut table -->
<?php include_once 'readjason.php'; ?>

<!-- Retrieve Product -->
<?php include_once 'BM.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Shop.me | Product Details</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include_once 'menubar.php'; ?>

    <!-- Single Products -->
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo $prod_image ?>" width="100%" id="ProductImg">
            </div>
            <div class="col-2">
                <p>Home / <?php echo $prod_cat ?></p>
                <h1><?php echo $prod_name ?></h1>
                <h4>RM <?php echo $prod_price ?></h4>
                <h4>Size: <?php echo $prod_size ?></h4>
                <input type="number" value="1" id="qty">
                <a href="cart.php?id=<?php echo $prod_id; ?>?amount=#qty" class="btn">Add To Cart</a>

                <h3>Product Details</h3>
                <br>
                <p><?php echo $prod_desc ?></p>
            </div>
        </div>
    </div>
    

    <!-- Footer -->
    <?php include_once 'footer.php'; ?>

    <!-- javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

    <!-- product gallery -->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function () {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function () {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function () {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function () {
            ProductImg.src = SmallImg[3].src;
        }

    </script>
</body>

</html>