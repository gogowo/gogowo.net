<?php
if(!defined('BASEPATH')){
    exit('deny');
}
return array(
    'route' => array(
        '^\/$' => 'post',
        '^\/post\/(\d*)$'    =>   'detail',
    ),
    'mysql' => array(
        'dsn'=>'mysql:host=localhost;dbname=gogowo',
        'username'=>'root',
        'password'=>'root1990'
    ),
    'mail' => array(
        'host'=>'smtp.exmail.qq.com',
        'port'=>465,
        'username'=>'gogo@gogowo.net',
        'password'=>'root1990',
        'from'=>'gogo@gogowo.net',
        'fromname'=>'罗丹'
    )
);
