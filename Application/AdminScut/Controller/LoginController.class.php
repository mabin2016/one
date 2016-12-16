<?php
namespace AdminScut\Controller;
use Think\Controller;
/**
 * Login控制器
 * @author Meifu Gao
 * @createdate 2015-02-27
 * @updatedate 2015-02-28
 */
class LoginController extends Controller {
    /**
     * 登录界面
     */
    public function index() {
        $this->display();
    }
    
    /**
     * 登录
     */
    public function login() {
        $post = I('post.');
        
        if (!isset($post['submit'])) $this->error("非法提交!", U('Login/index'));//redirect(U('Login/index'),3,'非法提交!');
        
        $account = $post['account'];
        $password = $post['password'];
        $vCode = $post['verifycode'];
        
        $manager = D('Manager');
        
        if(!empty($vCode)) {
            $chkRst = $manager->checkVcode($vCode);
        	if (!$chkRst)  $this->error('验证码错误!');	
        } else {
            $this->error('验证码不能为空!');
        }
        
        if (empty($account))  $this->error("账号不能为空!", U('Login/index'));//redirect(U('Login/index'),3,'账号不能为空!');
        if (empty($password)) $this->error("密码不能为空!", U('Login/index'));//redirect(U('Login/index'),3,'密码不能为空!');
        
        $lRst = $manager->Login($post);
        if ($lRst == 1) $this->error("对不起, 您的账号当前被系统设为禁止登录！", U('Login/index'));//redirect(U('Login/index'),3,'对不起, 您的账号当前被系统设为禁止登录！');
        if ($lRst == 2) $this->error("账户或密码不正确,请重新登录!", U('Login/index'));//redirect(U('Login/index'),3,'账户或密码不正确,请重新登录!');
        
        if ($lRst == 3)  redirect(U('Index/index'));
    }
    
    /**
     * 注销
     */
    public function logout(){
    	cookie('am_user', null); //清除cookie
    	cookie('Account', null, array('prefix'=>''));
        redirect(U('Login/index'));
    }
    
   
}
