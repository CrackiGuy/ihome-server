<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $height = $_POST['height'];
        $percent = $_POST['percent'];
        $pump = $_POST['pump'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        $auto = $_POST['auto'];

        $high = intval($height);
        $val = 0;
        
        $status = true;

        $str = file_get_contents('water.json');
        $json = json_decode($str,true);

        include_once '../../conf/connect.php';
        $result = $conn->query('Select water from sensor ORDER BY id DESC LIMIT 1');
            if($data = $result->fetch_array()){
                $json[0]['distance'] = $data['water'];
                $val = intval($data['water']);
            }
        
        
        $json[0]['height'] = $height;
        $json[0]['percent'] = $percent;
        $json[0]['min'] = $min;
        $json[0]['max'] = $max;
        $json[0]['pump'] = $pump;
        $json[0]['auto'] = $auto;

        file_put_contents('water.json',json_encode($json));

        $stt = file_get_contents('io.json');
        $jsonW = json_decode($stt,true);

        $jsonW['auto']=$auto;
        $jsonW['pump']=$pump;

        $mi = ($min*$high)/100;
        $ma = ($max*$high)/100;
        $jsonW['min'] = $mi;
        $jsonW['max'] = $ma;

        file_put_contents('io.json',json_encode($jsonW));
    

        if ($height != "") {
            $result["success"] = "1";
            $result["message"] = "success";

            echo json_encode($result);
        }else{
            $result["success"] = "0";
            $result["message"] = "error";

            echo json_encode($result);
        }
    }
?>