<?php
namespace Home\Controller;
use Think\Controller;
class MailController extends Controller{
    public function index($u_email,$u_code,$u_id){
    	$address = $u_email;
    	$title="账号注册";
    	$body="<a href='http://localhost/zz/index.php/Home/Registered/info/id/$u_id'>进入完成注册</a>"." "."验证码:".$u_code;
    	$status=SendMail($address,$title,$body);   //邮件的整体格式
    	if(!$status) {
    		$this->error("邮件发送失败,请重试!:" . $mail->ErrorInfo);
    	}else{
    		$this->redirect('Login/index');   //发送成功跳转到登陆界面
    	}
    }
}
?>