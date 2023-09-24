<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Shop.me</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="header">
        <!-- Top menu Bar -->
        <?php include_once 'menubar.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h1>Spice up your days <br> With our Outfits!</h1>
                    <p>It does not take a great amount of effort to look presentable <br> Enjoy your day without the headache to </p>
                    <a href="products.php" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/landing.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Feadtued Categories -->

    <div class="categories">
        <div class="small-container" style="position: relative;text-align: center;color: white;">
        <h2 class="title">Choose your categories</h2>
            <div class="row">
                <div class="col-3">
                    <img src="images/cat1.jpg">
                </div>
                <div class="col-3">
                    <img src="images/cat2.jpg">
                </div>
                <div class="col-3">
                    <img src="images/cat3.jpg">
                </div>
                <div class="col-3">
                    <a href=""></a>
                </div>
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
            } else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

</body>

</html>