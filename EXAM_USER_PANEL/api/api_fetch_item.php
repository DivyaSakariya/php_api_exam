<?php

    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    $res = array();

    if($_SERVER['REQUEST_METHOD'] == "GET") {

        $data = $config->get_all_item();

        $all_item = array();

        while($rescord = mysqli_fetch_assoc($data)) {

            array_push($all_item, $rescord);

        }

        $res['data'] = $all_item;
 
    } else {

        $res['msg'] = "Only Get method is allowed...";

    }

    echo json_encode($res);

?>