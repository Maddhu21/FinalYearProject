    <!-- Read Json file -->
    <?php
    $productJson = file_get_contents("products.json");
    $products = json_decode($productJson, true);
    ?>