<?php
class Post extends Common{
    public function __construct(){
        parent::__construct();
    }
    public function get(){
        $time = NOW - 21*24*3600;
        $sql = 'select * from post where status=1 and time>? order by time desc limit 0,50';
        $args = array($time);
        if(isset($_GET['email'])){
            $email = $_GET['email'];
            $sql = 'select * from post where status=1 and time>? and email=? order by time desc limit 0,80';
            $args = array($time, $email);
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        require BASEPATH.'/view/post.php';
    }
    public function post(){
        //验证数据
        if(empty($_POST['email'])){
            responseJson(array('status'=>'error', 'message'=>'email不能为空'));
        }
        if(empty($_POST['title'])){
            responseJson(array('status'=>'error', 'message'=>'标题不能为空'));
        }
        if(empty($_POST['description'])){
            responseJson(array('status'=>'error', 'message'=>'详情不能为空'));
        }
        $email = $_POST['email'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        //生成校验码
        $token = random(6);
        //入库
        $sql = 'insert into post(title,description,email,token,status,time) values(?,?,?,?,?,?)';
        $args = array($title, $description, $email, $token, 0, NOW);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);
        $lastInsertId = $this->db->lastInsertId();
        require BASEPATH.'/library/phpmailer/class.phpmailer.php';
        $mailConfig = getConfig('mail');
        $mail = new PHPMailer();
        $mail->IsSMTP(); // send via SMTP
        $mail->Host = $mailConfig['host']; // SMTP servers
        $mail->Port = $mailConfig['port'];
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->Username = $mailConfig['username']; // SMTP username 注意：普通邮件认证不需要加 @域名
        $mail->Password = $mailConfig['password']; // SMTP password
        $mail->From = $mailConfig['from']; // 发件人邮箱
        $mail->FromName = $mailConfig['fromname']; // 发件人
        $mail->CharSet = 'utf8'; // 这里指定字符集！
        $mail->Encoding = 'base64';
        $mail->AddAddress($email,'亲'); // 收件人邮箱和姓名
        $mail->IsHTML(true); // send as HTML
        // 邮件主题
        $mail->Subject = '格格屋-校验码';
        // 邮件内容
        $mail->Body = '校验码为:'.$token.'<br/>
               详情地址:<a href="http://www.gogowo.net/post/'.$lastInsertId.'">http://www.gogowo.net/post/'.$lastInsertId.'</a><br/>
               置顶地址:<a href="http://www.gogowo.net/top.html?'.$lastInsertId.'">http://www.gogowo.net/top.html?'.$lastInsertId.'</a>
               关于格格屋:<a href="http://www.gogowo.net/about.html">http://www.gogowo.net/about.html</a>';
        $mail->AltBody ="text/html";
        if(!$mail->Send()){
            responseJson(array('status'=>'error','message'=>'邮件错误信息:'.$mail->ErrorInfo));
        }else {
            responseJson(array('status'=>'success', 'message'=>$lastInsertId));
        }    
    }
}
