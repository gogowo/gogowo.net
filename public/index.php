<?php
define('BASEPATH',dirname(dirname(__FILE__)));
define('NOW', time());
require BASEPATH.'/library/function.php';
$uri = trim($_SERVER["REQUEST_URI"]);
$uri = explode('?', $uri);
$uri = $uri[0];
$route = getConfig('route');
foreach($route as $key=>$value){
   if(preg_match('/'.$key.'/i', $uri, $matches)){
       $handler = $value;
       unset($matches[0]);
   }
}
if(empty($handler)){
    goto404();
}
$method = strtolower($_SERVER['REQUEST_METHOD']);   
require BASEPATH.'/handler/common.php';
require BASEPATH.'/handler/'.$handler.'.php';
$class = new $handler;
call_user_func_array(array($class, $method), $matches);
/*    
if(!file_exists(BASEPATH.'/handler/'.$handler.'.php')){
        exit();
    }
*/
