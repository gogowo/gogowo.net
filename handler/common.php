<?php
class Common{
    function __construct(){
        $this->initDB();
        $this->clearTop(NOW);
        $this->clearFail(NOW);
    }
    function initDB(){
        $mysql = getConfig('mysql');
        $this->db = new PDO($mysql['dsn'], $mysql['username'], $mysql['password']);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec('set names utf8');
    }
    private function clearTop($time){
        $time = $time - 24*60*60; //删除1天以前的刷新记录
        $sql = 'delete from top where time<?';
        $args = array($time);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
    }
    private function clearFail($time){
        $time = $time - 5*60;//删除5分钟以前的错误记录
        $sql = 'delete from fail where time<?';
        $args = array($time);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args); 
    }

}
