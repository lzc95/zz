<?php

namespace Home\Controller;
use Think\Controller;
/*
   @功能:登陆模块的实现
   @修改时间:2016-09-20
   @修改人员:koocookie
*/
class  LoginController extends Controller {
	//显示登陆界面
	public function index(){
		$this->display();
	}
    
    //判断登陆
	public function dologin(){
		$db=M("UserLogin");
		$data['u_email']=$_POST['username'];
		$data['u_paswd']=md5($_POST['password']);
        $data['u_status'] = 1;
		$code=$_POST['code'];
        $verify = new \Think\Verify();   //判断验证的内置方法
        if($verify->check($code, $id)){
            $id=$db->where($data)->getfield('u_id');
            if($id){
            	$_SESSION['username'] = $data['u_email'];
                $_SESSION['id'] = $id; 
            	if($data['u_email'] == 'admin@123.com'){
                    $this->success('登录成功',U('Super/index'));
                }else{
                    $this->success('登录成功',U('Index/home'));
                }
            }else{
            	$this->error('登录失败');
            }
        }else{
        	$this->error("验证码错误!");
        }
    }
     
     //退出登录
     public function outlogin(){
     	if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),'',time()-1,'/');
			}
			session_unset();
			session_destroy();
			$this->redirect('Login/index');
        }
}
?>