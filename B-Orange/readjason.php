    <!-- Read Json file -->
    <?php
    $start_time = microtime(true);
    $productJson = file_get_contents("products.json");
    $products = json_decode($productJson, true);
    ?>