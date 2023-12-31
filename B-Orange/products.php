<!DOCTYPE html>
<html lang="en">

<!-- DB connection -->
<?php include_once 'db_con.php'; ?>

<!-- Write product table to Json-->
<?php include_once 'savetbprod.php'; ?>
<!-- Read Json -->
<?php include_once 'readjason.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Shop.me | Products</title>
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
            } 
            else {
                $i += $patternLength -1;
            }
            
        }
    }

    #Pattern not found
    return false;
}
#                                                          #
#                                                          #
############################################################


#Brute force Algorithm
##############################################
#                                            #
#                                            #
function bruteForce($text, $pattern)
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
if (isset($_GET['Search'])) {
    $pattern = $_GET['Search'];
    $displayall = false;
    $algo = $_GET['algo'];
} else {
    $displayall = true;
}
#                                            #
#                                            #
##############################################
?>

<body>
    <!-- Top menu Bar -->
    <?php include_once 'menubar.php'; ?>


    <!-- All Products -->

    <div class="small-container">
        <div class="row">
            <!-- Search Bar -->
            <div>
                <form action="products.php" method="get" class="d-flex">
                    <input type="search" name="Search" class="form-control" placeholder="Jeans" />
                    <input type="radio" style="width:100px;" name="algo" value="BM" id="algo1" checked />
                    <label for="algo1" style="width:200px;" class="form-label">Boyer Moore Algorithm</label>
                    <input type="radio" style="width:100px;" name="algo" value="BF" id="algo2" />
                    <label for="algo2" style="width:200px;" class="form-label">Brute Force Algorithm</label>
                    <input type="submit" style="width:200px;" value="Search" class="btn" id="submit">

                </form>
            </div>
        </div>
        <div class="row row-2" id="productSpace">
            <h2>All Products</h2>
            <div class="row">
                <?php
                if ($displayall) {
                    //Display all product
                    $colcount = 0;
                    foreach ($products as $item) {
                        $prod_name = $item['prod_name'];
                        $prod_image = $item['prod_image'];
                        $prod_price = $item['prod_price'];

                        if($colcount < 4){
                            echo
                            '
                                <div class="col-4">
                                    <div class="card m-1" style="width: 15rem;float:left;">
                                        <div class ="image-container">
                                            <img src="' . $prod_image . '" class="card-img-top center" style="width: 200px; height:auto;"  alt="' . $prod_name . '">
                                        </div>
                                        <div class="card-img-overlay text-center d-flex flex-column justify-content-end">
                                            <h6 class="card-text bg-secondary" style="line-height: 1.5em; height: 3em; overflow:hidden;">' . $prod_name . '</h6>
                                            <br>
                                        </div>
                                        <div class="card-body">
                                            <a href="product_details.php?id=' . $item["prod_id"] . '" class="card-text stretched-link">RM ' . $prod_price . '</a>
                                        </div>
                                    </div>
                                </div>
                            ';
                            $colcount++;
                        }
                        else{
                            //starts new row
                            $colcount = 0;
                            echo '</div>';
                            echo '<div class="row">';
                            echo    '
                                    <div class="col-4">
                                        <div class="card m-1" style="width: 15rem;float:left;">
                                            <div class ="image-container">
                                                <img src="' . $prod_image . '" class="card-img-top center" style="width: 200px; height:auto;"  alt="' . $prod_name . '">
                                            </div>
                                            <div class="card-img-overlay text-center d-flex flex-column justify-content-end">
                                                <h6 class="card-text bg-secondary" style="line-height: 1.5em; height: 3em; overflow:hidden;">' . $prod_name . '</h6>
                                                <br>
                                            </div>
                                            <div class="card-body">
                                                <a href="product_details.php?id=' . $item["prod_id"] . '" class="card-text stretched-link">RM ' . $prod_price . '</a>
                                            </div>
                                        </div>
                                    </div>
                            ';
                            $colcount++;
                        }
                        
                    }

                    while($colcount < 4){
                        echo '
                                <div class="col-4">
                                </div>
                            ';
                        $colcount++;
                    }

                } else {
                    //save time
                    $start_time = hrtime(true);
                    //Retrieve records and start searching
                    $verify = 0;
                    $colcount = 0;
                    foreach ($products as $item) {
                        $prod_name = $item['prod_name'];
                        $prod_desc = $item['prod_desc'];
                        $prod_image = $item['prod_image'];
                        $prod_price = $item['prod_price'];

                        //convert both strings to lowercase
                        $name= strtolower($prod_name);
                        $desc = strtolower($prod_desc);
                        $pattern = strtolower($pattern);

                        //Display Product
                        if ($algo == "BM" && boyerMoore($desc, $pattern) || boyerMoore($name, $pattern)) {
                            $verify++;
                            if ($colcount < 4) {
                                echo
                                '
                                    <div class="col-4">
                                        <div class="card m-1" style="width: 15rem;float:left;">
                                            <div class ="image-container">
                                                <img src="' . $prod_image . '" class="card-img-top center" style="width: 200px; height:auto;"  alt="' . $prod_name . '">
                                            </div>
                                            <div class="card-img-overlay text-center d-flex flex-column justify-content-end">
                                                <h6 class="card-text bg-secondary" style="line-height: 1.5em; height: 3em; overflow:hidden;">' . $prod_name . '</h6>
                                                <br>
                                            </div>
                                            <div class="card-body">
                                                <a href="product_details.php?id=' . $item["prod_id"] . '" class="card-text stretched-link">RM ' . $prod_price . '</a>
                                            </div>
                                        </div>
                                    </div>
                                ';
                                $colcount++;
                            } else {
                                //starts new row
                                $colcount = 0;
                                echo '</div>';
                                echo '<div class="row">';
                                echo    '
                                        <div class="col-4">
                                            <div class="card m-1" style="width: 15rem;float:left;">
                                                <div class ="image-container">
                                                    <img src="' . $prod_image . '" class="card-img-top center" style="width: 200px; height:auto;"  alt="' . $prod_name . '">
                                                </div>
                                                <div class="card-img-overlay text-center d-flex flex-column justify-content-end">
                                                    <h6 class="card-text bg-secondary" style="line-height: 1.5em; height: 3em; overflow:hidden;">' . $prod_name . '</h6>
                                                    <br>
                                                </div>
                                                <div class="card-body">
                                                    <a href="product_details.php?id=' . $item["prod_id"] . '" class="card-text stretched-link">RM ' . $prod_price . '</a>
                                            </div>
                                        </div>
                                    </div>
                                ';
                                $colcount++;
                            }

                        } elseif ($algo == "BF" && bruteForce($desc, $pattern) || bruteForce($name, $pattern)) {
                            $verify++;
                            if ($colcount < 4) {
                                echo
                                '
                                    <div class="col-4">
                                        <div class="card m-1" style="width: 15rem;float:left;">
                                            <div class ="image-container">
                                                <img src="' . $prod_image . '" class="card-img-top center" style="width: 200px; height:auto;"  alt="' . $prod_name . '">
                                            </div>
                                            <div class="card-img-overlay text-center d-flex flex-column justify-content-end">
                                                <h6 class="card-text bg-secondary" style="line-height: 1.5em; height: 3em; overflow:hidden;">' . $prod_name . '</h6>
                                                <br>
                                            </div>
                                            <div class="card-body">
                                                <a href="product_details.php?id=' . $item["prod_id"] . '" class="card-text stretched-link">RM ' . $prod_price . '</a>
                                            </div>
                                        </div>
                                    </div>
                                ';
                                $colcount++;
                            } else {
                                //starts new row
                                $colcount = 0;
                                echo '</div>';
                                echo '<div class="row">';
                                echo    '
                                        <div class="col-4">
                                            <div class="card m-1" style="width: 15rem;float:left;">
                                                <div class ="image-container">
                                                    <img src="' . $prod_image . '" class="card-img-top center" style="width: 200px; height:auto;"  alt="' . $prod_name . '">
                                                </div>
                                                <div class="card-img-overlay text-center d-flex flex-column justify-content-end">
                                                    <h6 class="card-text bg-secondary" style="line-height: 1.5em; height: 3em; overflow:hidden;">' . $prod_name . '</h6>
                                                    <br>
                                                </div>
                                                <div class="card-body">
                                                    <a href="product_details.php?id=' . $item["prod_id"] . '" class="card-text stretched-link">RM ' . $prod_price . '</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                $colcount++;
                            }
                        }
                    }

                    //fill empty with col
                    while($colcount < 4){
                        echo '
                                <div class="col-4">
                                </div>
                            ';
                        $colcount++;
                    }

                    $end_time = hrtime(true);
                    $execution_time = $end_time - $start_time;
                    if($verify > 0){
                        echo '
                        <div class="row">
                            Result Fetched in ' .$execution_time/1e+6. ' Miliseconds using ' . $algo . '
                        </div>
                        ';
                    }
                    else{
                        echo '
                        <div class="row">
                            <center><h4> Product does not exist </h4></center>
                            Result Fetched in ' .$execution_time/1e+6. ' Miliseconds using ' . $algo . '
                        </div>
                        ';
                    }
                    
                }

                ?>
            </div>
        </div>
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