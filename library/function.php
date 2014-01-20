<?php
function random($length) {
    $res = null;
    for($i = 0; $i < $length; $i++) {
        $res .= rand(0, 9);
    }
    return $res;
}
function getConfig($key){
    $config = require BASEPATH.'/config/application.php';
    return $config[$key];
}
function responseJson($data){
    header('Content-type: text/json');
    exit(json_encode($data));
}
function getGavatar($email, $size=48){
    return "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "&s=" . $size;
}
function goto404(){
    header("Location: http://www.gogowo.net/404.html");
    exit();
}
