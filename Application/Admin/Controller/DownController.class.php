<?php
namespace Admin\Controller;
/**
 * 后台用户控制器
 */
class DownController extends AdminController {
    public function __construct(){
        parent::__construct();
        $this->model = new \Admin\Model\DownModel();
        $this->importModel = new \Admin\Model\ImportModel();
    }

    /**
     * 用户管理首页
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index(){
        $nickname       =   I('nickname');
        $map['status']  =   array('egt',0);
        if(is_numeric($nickname)){
            $map['uid|nickname']=   array(intval($nickname),array('like','%'.$nickname.'%'),'_multi'=>true);
        }else{
            $map['nickname']    =   array('like', '%'.(string)$nickname.'%');
        }

        $list   = $this->lists('Member', $map);
        int_to_string($list);
        $this->assign('_list', $list);
        $this->meta_title = '用户信息';
        $this->display();
    }

    /**
     * 修改昵称初始化
     * @author huajie <banhuajie@163.com>
     */
    public function reaction(){
        $nickname = M('Member')->getFieldByUid(UID, 'nickname');
        $this->assign('nickname', $nickname);
        $this->meta_title = '修改昵称';
        $this->display();
    }

    /**
     * @desc 导入订单
     * @author: mb
     * @time: 2016-09-21
     */
    public function import(){
        $type = ( int )get_var_value( 'type' );
        if(empty($type)){
            $res = array('status'=>-1,'msg'=> '参数错误!');
            exit_json($res);
        }
        if( !isset( $_FILES['file_stu'] ) ){
            $res = array('status'=>-2,'msg'=> '请选择文件!');
            exit_json($res);
        }
        $path = $_FILES['file_stu']['tmp_name'];
        M()->startTrans();//开启事务
        $res = $this->dealSheet1($path);
        $res2 = $this->dealSheet2($path);
        $res3 = $this->dealSheet3($path);

        $jumpUrl = U('Down/index');
        if( $res && $res2 && $res3){
           M()->commit();
           S('ch_data',null);//清楚前端的缓存
           $this->success('导入成功！',$jumpUrl);
        }else{
            M()->rollback();
            $this->error('导入失败！',$jumpUrl);
        }
    }

    /**
     * @desc 导入化合物
     * @author: mb
     * @time: 2016-09-21
     */
    public function dealSheet1($path){
        $data = $this->importModel->import($path,0);
        $log = "导入订单sheet0,";
        if(!empty($data)){
            $arr = array();
            foreach ($data as $k=>$v){
                if(empty($v)){continue;}
                $arr[$k]['id'] = '';
                $arr[$k]['c_chemicals'] = $v[0];
                $arr[$k]['c_name1'] = $v[1];
                $arr[$k]['c_name2'] = $v[2];
                $arr[$k]['c_cas'] = $v[3];
                $arr[$k]['c_recursive'] = $v[4];
                $arr[$k]['c_is_ro2'] = $v[5];
                $arr[$k]['c_is_primary'] = $v[6];
                $arr[$k]['c_is_organic'] = $v[7];
                $arr[$k]['c_img'] = $v[8];
                $arr[$k]['c_document'] = $v[9];
                $arr[$k]['c_add_time'] = time();
                $arr[$k]['c_is_show'] = 1;
            }
            $res = $this->model->deleteCompand(1);//先删除
            $res2 = $this->model->addCompand($arr,1);//再添加
            $log .= "res：$res,res2：$res2,";
            if($res !== false && $res2 !== false){
                $log .= '成功!';
                action_log('update_menu', 'index', null, UID,$log);
                return true;
            }else{
                $log .= '失败!';
                action_log('update_menu', 'index', null, UID,$log);
                return false;
            }
        }else{
            $log .= '失败,data不存在!';
            action_log('update_menu', 'index', null, UID, $log);
            return false;
        }
    }

    /**
     * @desc 导入化合反应
     * @author: mb
     * @time: 2016-09-21
     */
    public function dealSheet2($path){
        $data = $this->importModel->import($path,1);
        $log = "导入订单sheet1,";
        if(!empty($data)){
            $arr = array();
            foreach ($data as $k=>$v){
                if(empty($v)){continue;}
                $arr[$k]['id'] = '';
                $arr[$k]['r_reactant1'] = $v[0];
                $arr[$k]['r_reactant2'] = $v[1];
                $arr[$k]['r_reactant3'] = $v[2];
                $arr[$k]['r_product1'] = $v[3];
                $arr[$k]['r_product2'] = $v[4];
                $arr[$k]['r_product3'] = $v[5];
                $arr[$k]['r_kt'] = $v[6];
                $arr[$k]['r_document'] = $v[7];
                $arr[$k]['r_add_time'] = time();
                $arr[$k]['r_is_show'] = 1;
            }
            $res = $this->model->deleteCompand(2);//先删除
            $res2 = $this->model->addCompand($arr,2);//再添加
            $log .= "res：$res,res2：$res2,";
            if($res !== false && $res2 !== false){
                $log .= '成功!';
                action_log('update_menu', 'index', null, UID,$log);
                return true;
            }else{
                $log .= '失败!';
                action_log('update_menu', 'index', null, UID,$log);
                return false;
            }
        }else{
            $log .= '失败,data不存在!';
            action_log('update_menu', 'index', null, UID, $log);
            return false;
        }
    }

    /**
     * @desc 导入常量
     * @author: mb
     * @time: 2016-09-21
     */
    public function dealSheet3($path){
        $data = $this->importModel->import($path,2);
        $log = "导入订单sheet2,";
        if(!empty($data)){
            $arr = array();
            foreach ($data as $k=>$v){
                if(empty($v)){continue;}
                $arr[$k]['id'] = '';
                $arr[$k]['c_key'] = $v[0];
                $arr[$k]['c_value'] = $v[1];
                $arr[$k]['c_add_time'] = time();
            }
            $res = $this->model->deleteCompand(3);//先删除
            $res2 = $this->model->addCompand($arr,3);//再添加
            $log .= "res：$res,res2：$res2,";
            if($res !== false && $res2 !== false){
                $log .= '成功!';
                action_log('update_menu', 'index', null, UID,$log);
                return true;
            }else{
                $log .= '失败!';
                action_log('update_menu', 'index', null, UID,$log);
                return false;
            }
        }else{
            $log .= '失败,data不存在!';
            action_log('update_menu', 'index', null, UID, $log);
            return false;
        }
    }

    /**
     * 化合物列表
     * @author huajie <banhuajie@163.com>
     */
    public function CompoundList(){
        $map['c_is_show']    =   1;
        $order = "id asc";
        $list   =   $this->lists('Compound', $map, $order);
       // p($list);die;
        foreach ($list as $key=>$value){
            $list[$key]['c_add_time']    =   date("Y-m-d H:i:s",$value['c_add_time']);
            $list[$key]['c_img_url']    =   !empty($value['c_img']) ? C('IMG_HTTP_DOMAIN').$value['c_img'] : '';
            $list[$key]['c_document_url']    =   !empty($value['c_document']) ? C('IMG_HTTP_DOMAIN').$value['c_document'] : '';
        }
        $this->assign('_list', $list);
        $this->meta_title = '化合物列表';
        $this->display('compoundList');
    }

    /**
     * 	反应列表
     */
    public function ReactionList(){
        $map['r_is_show']    =   1;
        $order = "id asc";
        $list   =   $this->lists('CompoundReaction', $map, $order);
        foreach ($list as $key=>$value){
            $list[$key]['r_add_time']    =   date("Y-m-d H:i:s",$value['r_add_time']);
            $list[$key]['r_document_url']    =   !empty($value['r_document']) ? C('IMG_HTTP_DOMAIN').$value['r_document'] : '';
        }
        $this->assign('_list', $list);
        $this->meta_title = '反应列表';
        $this->display('reactionList');
    }

    /**
     * 常量列表
     */
    public function ConstantList(){
        $order = "id asc";
        $list   =   $this->lists('Constant', array(), $order);
        foreach ($list as $key=>$value){
            $list[$key]['c_add_time']    =   date("Y-m-d H:i:s",$value['c_add_time']);
        }
        $this->assign('_list', $list);
        $this->meta_title = '常量列表';
        $this->display('constantList');
    }





    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function submitPassword(){
        //获取参数
        $password   =   I('post.old');
        empty($password) && $this->error('请输入原密码');
        $data['password'] = I('post.password');
        empty($data['password']) && $this->error('请输入新密码');
        $repassword = I('post.repassword');
        empty($repassword) && $this->error('请输入确认密码');

        if($data['password'] !== $repassword){
            $this->error('您输入的新密码与确认密码不一致');
        }

        $Api    =   new UserApi();
        $res    =   $Api->updateInfo(UID, $password, $data);
        if($res['status']){
            $this->success('修改密码成功！');
        }else{
            $this->error($res['info']);
        }
    }

    /**
     * 用户行为列表
     * @author huajie <banhuajie@163.com>
     */
    public function action(){
        //获取列表数据
        $Action =   M('Action')->where(array('status'=>array('gt',-1)));
        $list   =   $this->lists($Action);
        int_to_string($list);
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('_list', $list);
        $this->meta_title = '用户行为';
        $this->display();
    }

    /**
     * 新增行为
     * @author huajie <banhuajie@163.com>
     */
    public function addAction(){
        $this->meta_title = '新增行为';
        $this->assign('data',null);
        $this->display('editaction');
    }

    /**
     * 编辑行为
     * @author huajie <banhuajie@163.com>
     */
    public function editAction(){
        $id = I('get.id');
        empty($id) && $this->error('参数不能为空！');
        $data = M('Action')->field(true)->find($id);

        $this->assign('data',$data);
        $this->meta_title = '编辑行为';
        $this->display();
    }

    /**
     * 更新行为
     * @author huajie <banhuajie@163.com>
     */
    public function saveAction(){
        $res = D('Action')->update();
        if(!$res){
            $this->error(D('Action')->getError());
        }else{
            $this->success($res['id']?'更新成功！':'新增成功！', Cookie('__forward__'));
        }
    }

    /**
     * 会员状态修改
     * @author 朱亚杰 <zhuyajie@topthink.net>
     */
    public function changeStatus($method=null){
        $id = array_unique((array)I('id',0));
        if( in_array(C('USER_ADMINISTRATOR'), $id)){
            $this->error("不允许对超级管理员执行该操作!");
        }
        $id = is_array($id) ? implode(',',$id) : $id;
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map['uid'] =   array('in',$id);
        switch ( strtolower($method) ){
            case 'forbiduser':
                $this->forbid('Member', $map );
                break;
            case 'resumeuser':
                $this->resume('Member', $map );
                break;
            case 'deleteuser':
                $this->delete('Member', $map );
                break;
            default:
                $this->error('参数非法');
        }
    }

    public function add($username = '', $password = '', $repassword = '', $email = ''){
        if(IS_POST){
            /* 检测密码 */
            if($password != $repassword){
                $this->error('密码和重复密码不一致！');
            }

            /* 调用注册接口注册用户 */
            $User   =   new UserApi;
            $uid    =   $User->register($username, $password, $email);
            if(0 < $uid){ //注册成功
                $user = array('uid' => $uid, 'nickname' => $username, 'status' => 1);
                if(!M('Member')->add($user)){
                    $this->error('用户添加失败！');
                } else {
                    $this->success('用户添加成功！',U('index'));
                }
            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid));
            }
        } else {
            $this->meta_title = '新增用户';
            $this->display();
        }
    }

    /**
     * 获取用户注册错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showRegError($code = 0){
        switch ($code) {
            case -1:  $error = '用户名长度必须在16个字符以内！'; break;
            case -2:  $error = '用户名被禁止注册！'; break;
            case -3:  $error = '用户名被占用！'; break;
            case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
            case -5:  $error = '邮箱格式不正确！'; break;
            case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
            case -7:  $error = '邮箱被禁止注册！'; break;
            case -8:  $error = '邮箱被占用！'; break;
            case -9:  $error = '手机格式不正确！'; break;
            case -10: $error = '手机被禁止注册！'; break;
            case -11: $error = '手机号被占用！'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }

}
