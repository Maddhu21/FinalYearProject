<div class="container">

    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container">
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img src="images/logo.png" alt="logo" width="125px"></a>
            </div>

            <!-- Search Bar -->
            <div class="d-none d-lg-block">
                <form action="products.php" method="get" class="d-flex">
                    <input type="search" name="Search" class="form-control" placeholder="Search">
                    <input type="radio" name="algo" value="BM" checked>Boyer Moore</input>
                    <input type="radio" name="algo" value="LS">Linear Search</input>
                    <input type="submit" value="Search" class="btn">
                </form>
            </div>


            <!-- Menu -->
            <div class="collapse navbar-collapse" id="main-menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="account.html">Account</a></li>
                </ul>
            </div>

            <a href="cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
            <button data-bs-toggle="collapse" data-bs-target="#main-menu" type="button" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--img src="images/menu.png" class="menu-icon" onclick="menutoggle()"-->
        </div>
    </nav>
</div>