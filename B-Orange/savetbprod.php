<!DOCTYPE html>
<html lang="en">
    <?php include_once 'db_con.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save as</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);

    #Set into JSON
    $json_array = array();
    while($row = mysqli_fetch_assoc($result)){
        $json_array[] = $row;
    }

    #preview
    #echo "<pre>" .print_r($json_array,true). "</pre>";

    #encode
    $jsoned = json_encode($json_array);

    #open file
    $myfile = fopen("products.json", "w");
    #Save into file
    fwrite($myfile, $jsoned );
    #close file
    fclose($myfile);
    ?>
</body>
</html>