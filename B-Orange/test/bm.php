<?php
function boyerMoore($text, $pattern) {
    #$Initialize variables
    $badChar = array();
    $textLength = strlen($text);
    $patternLength = strlen($pattern);

    #Create Skip Table
    for ($i = 0; $i < $patternLength; $i++) {
        $badChar[$pattern[$i]] = max(1,($patternLength-1-$i));
    }

    #Searching
    $i = 0;    
    while ($i <= $textLength - $patternLength) {
        $j = $patternLength - 1;
        while ($j >= 0 && $pattern[$j] == $text[$i + $j]) {
            $j--;
        }
        
        if ($j < 0) {
            #echo "Pattern found at index $i\n<br>";
            return true;
        } else {
            #echo 'pattern not found<br>';
            if(array_key_exists($text[$i + $j], $badChar)){
                $i += $badChar[$text[$i + $j]];
            }
            else{
                $i+= $patternLength;
            }
            
        }
    }

    #echo "Pattern not found<br>";
    return false;
}

// Example usage:

#$text = "Embrace a playful yet sophisticated look with our Versace Jeans Couture Clown Trouser. Designed to captivate, the lively green color adds a pop of vibrancy to your outfit. The tailored fit effortlessly flatters your figure, while the medium size ensures a comfortable and versatile fit. Elevate your style with a touch of luxury and artistry that only Versace can deliver.";

$start_time = microtime(true)/1000;
$productJson = file_get_contents("products2.json");
$products = json_decode($productJson, true);
$pattern = "shirt";
$pattern = strtolower($pattern);
foreach($products as $item){
    $prod_name = strtolower($item["prod_name"]);
    if (boyerMoore($prod_name, $pattern)) {
        echo $item["prod_name"] . '<br>';
        continue;
    }
}
#boyerMoore($text, $pattern);
$end_time = microtime(true)/1000;
$execution_time = $end_time - $start_time;
echo " Execution time of script = ".$execution_time." ms";
?>