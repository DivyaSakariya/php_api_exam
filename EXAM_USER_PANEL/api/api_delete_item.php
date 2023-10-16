<?php

    header("Access-Control-Allow-Methods: DELETE");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    $res = array();

    if($_SERVER['REQUEST_METHOD'] == "DELETE") {

        $str = file_get_contents("php://input");
        
        $res2 = array();

        parse_str($str,$res2);

        $id = $res2['id'];

        if($config->delete_item($id)) {

            $res['msg'] = "Successfully item deleted...";

        } else {
            
            $res['msg'] = "Failed to delete item...";

        }

    } else {

        $res['msg'] = "Only DELETE method is allowed...";
        
    } 

    echo json_encode($res);

?>