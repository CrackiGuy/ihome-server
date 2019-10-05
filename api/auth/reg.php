<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $password =$_POST['password'];

        $password_hash = password_hash($password,PASSWORD_DEFAULT);

        include_once '../../conf/connect.php';

        $sql = "Insert into users ( name,email,phone,password,address) values('$name','$email','$phone','$password_hash','$address');";

        if (mysqli_query($conn,$sql)) {
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
?>