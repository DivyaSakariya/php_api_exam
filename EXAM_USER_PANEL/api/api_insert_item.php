<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('../config/config.php');

    $config = new Config();

    $res = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = $_FILES;

        $name = $_POST['name'];
        $price = $_POST['price'];
        $img_name = $data['data']['name'];
        $path = $data['data']['tmp_name'];

        $destination = "../upload_img/" . uniqid("img-") . $img_name;

        $uploaded = move_uploaded_file($path,$destination);

        if($uploaded) {

            $config->insert_items($name, $price, $img_name, $destination);
            
            $res['msg'] = "Successfully item inserted...";

        } else {

            $res['msg'] = "Failed to insert item...";

        }

    } else {

        $res['msg'] = "Only POST method is allowed...";

    } 

    echo json_encode($res);

?>