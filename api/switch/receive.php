<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $device_name = $_POST['name'];
        $device_status = $_POST['status'];
        $status = true;

        $str = file_get_contents('devices.json');
        
        $json = json_decode($str,true);
        for($i=0;$i<10;$i++){
            $json_name = $json[$i]['name'];

            if ($device_name == $json_name) {
                $json[$i]['status'] = $device_status;
            }
            file_put_contents('devices.json',json_encode($json));
        }

        for($i=0;$i<10;$i++){
            $data[$json[$i]['io']] = $json[$i]['status'];
        }
        file_put_contents('io.json',json_encode($data));

        if ($device_name != "") {
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