<?php
    if ($_SERVER['REQUEST_METHOD']=='GET') {
        $magnet = $_GET ['window'];
        $arr = str_split($magnet,1);
        $status = true;

        $str = file_get_contents('window.json');
        
        $json = json_decode($str,true);
        for($i=0;$i<count($arr);$i++){
            $json[$i]['status'] = $arr[$i];
        }
        file_put_contents('window.json',json_encode($json));
    }
?>