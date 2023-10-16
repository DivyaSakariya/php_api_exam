<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('../config/config.php');

    $config  = new Config();

    $res = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $result = $config->register_user_admin($email, $password);

        if($result) {

            $res['msg'] = "Successfully user register...";
            http_response_code(201);

        } else {

            $res['msg'] = "User insert failed...";

        }

    } else {

        $res['msg'] = "Only POST method is allowed...";

    }

    echo json_encode($res);

?>
