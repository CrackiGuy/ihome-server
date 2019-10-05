<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $id = $_POST['id'];

        include_once 'conf/connect.php';
        $sql = "Select * From users Where id='$id'";
        $response = mysqli_query($conn,$sql);

        $result = array();
        $result['login'] = array();

        if (mysqli_num_rows($response)===1) {
            $row = mysqli_fetch_assoc($response);
            if($id == $row['id']){
                $index['name'] = $row['name'];
                $index['email'] = $row['email'];

                array_push($result['login'],$index);

                $result['success'] = "1";
                $result['message'] = "success";
                echo json_encode($result);

                mysqli_close($conn);
            }else{
                $result['success'] = "0";
                $result['message'] = "error";
                echo json_encode($result);

                mysqli_close($conn);
            }
        }
    }
?>
