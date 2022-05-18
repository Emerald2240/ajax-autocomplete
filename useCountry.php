<?php
echo 'reached level 1<br>';
extract($_POST);
echo 'reached level 2<br>';
require_once("dbcontroller.php");
echo 'reached level 3<br>';
$db_handle = new DBController();
echo 'reached level 4<br>';

if (!empty($submitted)) {
    echo 'reached level 5<br>';
    $query = "INSERT INTO used_country(country_name, note) VALUES ('$countryName', '$note')";
    echo 'reached level 6<br>';
    $result = $db_handle->runQueryWithoutResponse($query);
    echo 'reached level 7<br>';

    if ($result) {
        echo 'reached level 8<br>';
        echo '<script>window.location("success.php")</script>';
        exit();
    } else {
        echo 'reached level 10<br>';
        echo 'error';
    }
}
