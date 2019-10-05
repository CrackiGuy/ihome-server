<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];

        include_once '../../conf/connect.php';

        $sql = "Select * from users Where id='$id' ";

        $response = mysqli_query($conn,$sql);

        $result = array();
        $result['read'] = array();

        if(mysqli_num_rows($response) === 1){
            if ($row = mysqli_fetch_assoc($response)) {

                $h['name'] = $row['name'];
                $h['email']= $row['email'];

                array_push($result["read"],$h);

                $result["success"] = "1";
                $result["message"] = "success";

                echo json_encode($result);
                mysqli_close($conn);
            }else{
                $result["success"] = "0";
                $result["message"] = "error";

                echo json_encode($result);
                mysqli_close($conn);
            }
        }
    }
?>