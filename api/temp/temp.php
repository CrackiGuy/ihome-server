<?php
    include_once '../../conf/connect.php';
    $str = file_get_contents('temp.json');
    $json = array();

    $result = $conn->query('Select temp from sensor ORDER BY id DESC LIMIT 1');
    if($data = $result->fetch_array()){
        $json['temperature'] = $data['temp'];
        echo 'Temperature '.$data['temp'];
    }
    $result = $conn->query('Select huma from sensor ORDER BY id DESC LIMIT 1');
    if($data = $result->fetch_array()){
        $json['humidity'] = $data['huma'];
        echo 'Humidity '.$data['huma'];
    }
    file_put_contents('temp.json','['.json_encode($json).']');
?>