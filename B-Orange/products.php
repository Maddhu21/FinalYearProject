<!DOCTYPE html>
<html lang="en">

<!-- DB connection -->
<?php include_once 'db_con.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>All Products | RedStore</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<!-- Read Data -->
<?php
#Boyer's Moore Algorithm
############################################################
#                                                          #
#                                                          #
function boyerMoore($text, $pattern)
{
    #$Initialize variables
    $badChar = array();
    $textLength = strlen($text);
    $patternLength = strlen($pattern);

    #Create Skip Table
    for ($i = 0; $i < $patternLength; $i++) {
        $badChar[$pattern[$i]] = $i;
    }

    #Searching
    $i = 0;
    while ($i <= $textLength - $patternLength) {
        $j = $patternLength - 1;
        while ($j >= 0 && $pattern[$j] == $text[$i + $j]) {
            $j--;
        }

        if ($j < 0) {
            #Pattern found
            return true;
        } else {
            #Shifts
            if (array_key_exists($text[$i + $j], $badChar)) {
                $i += max(1, $j - $badChar[$text[$i + $j]]);
            } else {
                $i += ($patternLength - 1);
            }
        }
    }

    #Pattern not found
    return false;
}
#                                                          #
#                                                          #
############################################################


#Linear Searching Algorithm
##############################################
#                                            #
#                                            #
function linearSearch($text, $pattern)
{
    #Initialize Variables
    $textLength = strlen($text);
    $patternLength = strlen($pattern);

    #Search
    $index = 0;
    while ($index <= $textLength - $patternLength) {
        $totalMatched = 0;
        while ($totalMatched <= ($patternLength - 1) && $pattern[$totalMatched] == $text[$index + $totalMatched]) {
            $totalMatched++;
        }

        if ($totalMatched > ($patternLength - 1)) {
            return true;
        } else {
            $index++;
        }
    }
    return false;
}
#                                            #
#                                            #
##############################################


#Receive search form
##############################################
#                                            #
#                                            #
if(isset($_GET['Search'])){
    $pattern = $_GET['Search'];
    $displayall = false;
    $algo = $_GET['algo'];
}
else{
    $displayall = true;
}
?>

<body>
    <!-- Top menu Bar -->
    <?php include_once 'menubar.php'; ?>

    <!-- All Products -->

    <div class="small-container">
        <div class="row row-2" id="productSpace">
            <div class="row">
                <?php
                if($displayall){
                    //Display all product
                    include_once 'readjason.php';
                    foreach ($products as $item) {
                        $prod_name = $item['prod_name'];
                        $prod_image = $item['prod_image'];
                        $prod_price = $item['prod_price'];
                        echo
                        '
                            <div class="card m-1" style="width: 15rem;float:left;">
                                <div class ="image-container">
                                    <img src="' . $prod_image . '" class="card-img-top center" style="width: 200px; height:auto;"  alt="' . $prod_name . '">
                                </div>
                                <div class="card-img-overlay text-center d-flex flex-column justify-content-end">
                                    <h6 class="card-text bg-secondary" style="line-height: 1.5em; height: 3em; overflow:hidden;">' . $prod_name . '</h6>
                                    <br>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">RM ' . $prod_price .'</p>
                                </div>
                            </div>
                        ';
                    }
                }
                else{
                    $start_time = microtime(true)/1000;
                    include_once 'readjason.php';
                    foreach($products as $item){
                        $prod_name = $item['prod_name'];
                        $prod_desc = $item['prod_desc'];
                        $prod_image = $item['prod_image'];
                        $prod_price = $item['prod_price'];
                        
                        //Display Product
                        if($algo == "BM" && boyerMoore($prod_name,$pattern) || boyerMoore($prod_desc,$pattern)){
                            echo '
                                <div class="card m-1" style="width: 15rem;float:left;">
                                    <div class ="image-container">
                                        <img src="' . $prod_image . '" class="card-img-top center" style="width: 200px; height:auto;"  alt="' . $prod_name . '">
                                    </div>
                                    <div class="card-img-overlay text-center d-flex flex-column justify-content-end">
                                        <h6 class="card-text bg-secondary" style="line-height: 1.5em; height: 3em; overflow:hidden;">' . $prod_name . '</h6>
                                        <br>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">RM ' . $prod_price . '</p>
                                    </div>
                                </div>
                            ';
                        }
                        elseif($algo == "LS" && linearSearch($prod_name,$pattern)){
                            echo '
                                <div class="card m-1" style="width: 15rem;float:left;">
                                    <div class ="image-container">
                                        <img src="' . $prod_image . '" class="card-img-top center" style="width: 200px; height:auto;"  alt="' . $prod_name . '">
                                    </div>
                                    <div class="card-img-overlay text-center d-flex flex-column justify-content-end">
                                        <h6 class="card-text bg-secondary" style="line-height: 1.5em; height: 3em; overflow:hidden;">' . $prod_name . '</h6>
                                        <br>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">RM ' . $prod_price . '</p>
                                    </div>
                                </div>
                            ';
                        }
                    }
                    $end_time = microtime(true)/1000;
                    $execution_time = $end_time - $start_time;
                    echo'
                        <div class="row">
                            Result Fetched in './*$execution_time.*/sprintf("%.20F",$execution_time).' Miliseconds using '.$algo.' Miliseconds
                        </div>
                        ';
                }
                
                ?>

            </div>
        </div>
        <!--    
        </div>
        
        <div class="row">
            <div class="col-4">
                <a href="product_details.html"><img src="images/product-1.jpg"></a>
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-2.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-3.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-4.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="images/product-5.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-6.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-7.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-8.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="images/product-9.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-10.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-11.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-12.jpg">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
        </div>
        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>-->
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>