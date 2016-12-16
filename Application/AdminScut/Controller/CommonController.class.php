<?php
namespace Manager\Controller;
use Think\Controller;
/**
 * Common控制器
 * @author Meifu Gao
 * @createdate 2015-05-27
 * @updatedate 2015-06-02
 */
class CommonController extends Controller {
	protected  $user_cookie_info; 	//用户cookie
	protected  $user_privilege; 	//用户权限
	protected  $user_menu;		    //用户拥有权限的菜单
	
    public function __construct() { 
        parent::__construct();
        
        $user_cookie = proCookie('am_user');
        $this->user_cookie_info = $user_cookie;
        $privilege_menu = D('Manager')->getPrivilegeMenu($user_cookie['role_id']);
        $privilege = $privilege_menu['privilege'];
        $menu = $privilege_menu['menu'];
        $this->user_privilege = $privilege;
        $this->user_menu = $menu;
        
        $cur_ip = get_client_ip();
        $last_login_ip = $user_cookie['login_ip'];
        //上次登录的cookie不存在和两次登录的ip不一样则退出
        if((empty($user_cookie) || !$user_cookie['manager_id']) && $cur_ip!=$last_login_ip || empty($_COOKIE['Account']) || $_COOKIE['Account']!==$user_cookie['account']) {
        	if (IS_AJAX) {
        		exit(json_encode(array('status' => 0, 'msg' => '请先登录！')));
        	} else {
        		$this->error("请先登录！", U('Login/index'));
        	}	
        }
        
        if(MODULE_NAME == 'Manager' && CONTROLLER_NAME == 'Index') return true;
        if($privilege != '*' && !in_array(MODULE_NAME .'/'. CONTROLLER_NAME .'/'. ACTION_NAME, $privilege)) {
        	if (IS_AJAX) {
        		exit(json_encode(array('status' => 0, 'msg' => '您无权操作！')));
        	} else {
        		$this->error('您无权操作！');
        	}
        }
    }
    

    /**
     * 获取管理员信息
     * @return unknown
     */
    public function get_manager_info(){
    	//$info = session( 'manager_info' );
    	//$info = json_decode( $info , TRUE );
    	$ucookie = proCookie('am_user');
    	$info = array(
    			'id' => $ucookie['manager_id'],
    			'role_id' => $ucookie['role_id']
    	);
    	return $info;
    }
    
    public function exit_json( $status, $msg ){
    	exit_json( array( 'status' => $status, 'msg' => $msg ) );
    }
    
    /**
     * 获取当前账号接单备注
     * @param int $id 账号接单备注id
     * @return array 当前账号接单备注信息
     */
    public function getCurrentAccountOrdersRemarkInfo($id) {
    	$map['aor_id'] = $id;
    	$data = $this->where($map)->find();
    	return $data;
    }
    
    
  
}
