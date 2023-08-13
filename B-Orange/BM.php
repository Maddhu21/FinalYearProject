<?php
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


foreach($products as $item){
    if($item["prod_id"] == $_GET["id"]){
        $prod_name = $item["prod_name"];
        $prod_image = $item["prod_image"];
        $prod_cat = $item["prod_cat"];
        $prod_desc = $item["prod_desc"];
        $prod_price = $item["prod_price"];
        $prod_size = $item["prod_size"];
        $prod_gen = $item["prod_gen"];
        break;
    }
}
?>