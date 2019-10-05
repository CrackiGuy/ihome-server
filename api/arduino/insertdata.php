<?php
    include_once '../../conf/connect.php';
    $temp = $_GET ['temperature'];
    $huma = $_GET ['humidity'];
    $light = $_GET ['light'];
    $flame = $_GET ['flame'];
    $motion = $_GET ['motion'];
    $water = $_GET ['water'];

    $json = array();
    $json['temperature'] = intval($temp);
    $json['humidity'] = intval($huma);

    file_put_contents('temp.json','['.json_encode($json).']');

    $sql_insert = "insert into sensor (temp ,huma , light, flame, motion, water) values('$temp','$huma','$light','$flame','$motion','$water')";

if (mysqli_query($conn, $sql_insert)) {
    echo "success";
} else {
    echo "Error " ;
}
?>
