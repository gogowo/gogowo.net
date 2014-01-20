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
        'username'=>'',
        'password'=>''
    ),
    'mail' => array(
        'host'=>'smtp.exmail.qq.com',
        'port'=>465,
        'username'=>'',
        'password'=>'',
        'from'=>'',
        'fromname'=>'罗丹'
    )
);
