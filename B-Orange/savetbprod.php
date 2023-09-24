<?php
$sql = "SELECT * FROM product ORDER BY `prod_name` ASC";
$result = mysqli_query($conn, $sql);

#Set into JSON
$json_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}


#encode
$jsoned = json_encode($json_array);

#open file
$myfile = fopen("products.json", "w");
#Save into file
fwrite($myfile, $jsoned);
#close file
fclose($myfile);
?>
