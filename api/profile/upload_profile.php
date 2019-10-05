<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $id = $_POST['id'];
        $photo = $_POST['photo'];

        $path = "../../profile_image/$id.jpeg";
        $finalPath = "http://192.168.30.5/zaymhar/profile_image/$id.jpeg";

        include_once '../../conf/connect.php';

        $sql = "Update users Set photo='$finalPath'  Where id='$id' ";

        if (mysqli_query($conn, $sql)) {
            if(file_put_contents($path,base64_decode($photo))){
                $result['success'] = "1";
                $result['message'] = "success";

                echo json_encode($result);
                mysqli_close($conn);
            }
        }
    }
?>