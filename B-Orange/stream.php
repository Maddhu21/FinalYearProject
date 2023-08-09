<?php
$string = "Embrace a playful yet sophisticated look with our Versace Jeans Couture Clown Trouser. Designed to captivate, the lively green color adds a pop of vibrancy to your outfit. The tailored fit effortlessly flatters your figure, while the medium size ensures a comfortable and versatile fit. Elevate your style with a touch of luxury and artistry that only Versace can deliver.";
$pattern = "embrace
";

#tokenizing
$token = strtok($string," ");

while($token !== false){
    $current = $token;
    if(strcmp($pattern,$current) == 0) echo "matched<br>";
    $token = strtok(" ");
}


?>