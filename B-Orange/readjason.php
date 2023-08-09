    <!-- Read Json file -->
    <?php
    $start_time = microtime(true);
    $productJson = file_get_contents("products.json");
    $products = json_decode($productJson, true);
    /*
    if (count($products) != 0) {
        echo "<pre>" . print_r($products, true) . '</pre>';
        
        foreach ($products as $item) {
            echo $item['prod_image'] . "<br>";
        }
       
    }

    $end_time = microtime(true);
    $execution_time = ($end_time - $start_time);
    echo " Execution time of script = ".$execution_time." sec";*/
    ?>