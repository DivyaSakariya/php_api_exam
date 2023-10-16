<?php

    header("Access-Control-Allow-Methods: PUT/PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    $res = array();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH" ) {

        $file_data = file_get_contents("php://input");

        $data = array();

        parse_str($file_data,$data);

        $id = $data['id'];
        $name = $data['name'];
        $price = $data['price'];

        if($config->update_item($id,$name,$price)) {
            
            $res['msg'] = "Successfully item updated...";

        } else {

            $res['msg'] = "Failed to update item...";

        }

    } else {

        $res['msg'] = "Only PUT or PATCH methods are allowed...";

    }

    echo json_encode($res);

?>