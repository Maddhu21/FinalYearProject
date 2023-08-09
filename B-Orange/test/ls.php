<?php
function linearSearch($text,$pattern){
    #Initialize Variables
    $textLength = strlen($text);
    $patternLength = strlen($pattern);

    #Search
    $index = 0;
    while($index <= $textLength - $patternLength){
        $totalMatched = 0;
        while($totalMatched <= ($patternLength-1) && $pattern[$totalMatched] == $text[$index+$totalMatched]){
            $totalMatched++;
        }

        if($totalMatched > ($patternLength-1)){
            return true;
        }
        else{
            $index++;
        }
    }

    /* Token
    #search
    $currentWord = strtok($text," ");
    $m = strlen($pattern);  //pattern length
    while($currentWord != false){
        $n = strlen($currentWord);
        $match = true;
        for($i = 0; $i < $m; $i++){
            if($n != $m || $currentWord[$i] != $pattern[$i]){
                $match = false;
            }
        }
        if($match) return true;
        $currentWord = strtok(" ");
    }
    */
    return false;
}

//example usaage

#$text = "Embrace a playful yet sophisticated look with our Versace Jeans Couture Clown Trouser. Designed to captivate, the lively green color adds a pop of vibrancy to your outfit. The tailored fit effortlessly flatters your figure, while the medium size ensures a comfortable and versatile fit. Elevate your style with a touch of luxury and artistry that only Versace can deliver.";
$start_time = microtime(true)/1000;
$productJson = file_get_contents("products2.json");
$products = json_decode($productJson, true);
$pattern = "Copenhagen";

foreach ($products as $item) {
    $check = linearSearch($item['prod_desc'], $pattern);
    if ($check) {
        echo $item["prod_name"] . '<br>';
        continue;
    }
    $check = linearSearch($item["prod_cat"], $pattern);
    if ($check) {
        echo $item["prod_name"] . '<br>';
        continue;
    }
    $check = linearSearch($item["prod_name"], $pattern);
    if ($check) {
        echo $item["prod_name"] . '<br>';
        continue;
    }
}

$end_time = microtime(true)/1000;
$execution_time = ($end_time - $start_time);
echo " Execution time of script = ".$execution_time." ms";
?>