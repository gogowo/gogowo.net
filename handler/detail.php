<?php
class Detail extends Common{
    public function __construct(){
        parent::__construct();
    }
    public function get($id){
        $sql = 'select id,title,description,email,status,time from post where id = ?';
        $args = array($id);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($post)){
            goto404();
        }
        if($post['status'] == 0){
            require BASEPATH.'/view/token.php';
            exit;
        }
        require BASEPATH.'/view/detail.php';
    }
    public function put($id){
        parse_str(file_get_contents('php://input'), $_PUT);
        $token = (int)$_PUT['token'];
        $id = (int)$id;
        $sql = 'select status,token from post where id = ?';
        $args = array($id);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($info)){
            responseJson(array('status'=>'error', 'message'=>'404'));
        }
        if($this->getFail($id) >=5){
            responseJson(array('status'=>'error', 'message'=>'错误次数过多，稍等5分钟后在尝试'));
        }
        if($this->getTop($id)>=3){
            responseJson(array('status'=>'error', 'message'=>'刷新频率太高，一天后尝试'));
        }
        if($info['token'] != $token){
            //记录失败
            $this->setFail($id, NOW);
            responseJson(array('status'=>'error', 'message'=>'token错误'));
        }
        $this->setTop($id, NOW);
        $sql = 'update post set status=1,time=? where id=?';
        $args = array(NOW, $id);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
        responseJson(array('status'=>'success'));
    }
    private function setFail($pid, $time){
        $sql = 'insert into fail(pid,time) values(?,?)';
        $args = array($pid, $time);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
    }
    private function getFail($pid){
        $sql = 'select count(*) from fail where pid=?';
        $args = array($pid);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
        $info = $stmt->fetch();
        return $info[0];    
    }
    private function getTop($pid){
        $sql = 'select count(*) from top where pid=?';
        $args = array($pid);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
        $info = $stmt->fetch();
        return $info[0];    
    }
    private function setTop($pid, $time){
        $sql = 'insert into top(pid,time) values(?,?)';
        $args = array($pid, $time);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
    }
}
?>
