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
                $arr[$k]['c_recursive'] = $v[4] == 'Yes' ? 1 : 0;
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
     */
    public function CompoundList(){
    	$c_name = get_var_value( 'c_name' );
        $map['c_is_show']    =   1;
        if(!empty($c_name)){
        	$map['c_chemicals']    =   array("like","%{$c_name}%");
        }
        $order = "id asc";
        $list   =   $this->lists('Compound', $map, $order);
//        p($list);die;
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
    	$c_name = get_var_value( 'c_name' );
        $map['r_is_show']    =   1;
        if(!empty($c_name)){
        	$map['r_reactant1']    =   array("like","%{$c_name}%");
        }
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
    	$c_name = get_var_value( 'c_name' );
    	$map = array();
        if(!empty($c_name)){
        	$map['c_key']    =   array("like","%{$c_name}%");
        }
        $order = "id asc";
        $list   =   $this->lists('Constant', $map, $order);
        foreach ($list as $key=>$value){
            $list[$key]['c_add_time']    =   date("Y-m-d H:i:s",$value['c_add_time']);
        }
        $this->assign('_list', $list);
        $this->meta_title = '常量列表';
        $this->display('constantList');
    }

    /**
     * 上传图片页面
     * @access public 
     * @return void
     */
    public function image(){
          $this->display('Down/image');
    }

    /**
     * 上传pdf页面
     * @access public 
     * @return void
     */
    public function pdf(){
          $this->display('Down/image');
    }

    /**
     * 保存上传的单个图片
     * @access public 
     * @return void
     */
    public function upload_image(){
         $this->ajaxUploadImage(C('IMG_REAL_PATH'));
    }

    /**
     * 保存上传的单个pdf
     * @access public 
     * @return void
     */
    public function upload_pdf(){
        $this->ajaxUploadImage(C('_REAL_PATH'));
    }

    public function text(){
    	$this->display('Down/text');
    }

    /**
     * AJAX上传图片 
     * @access private
     * @return void
     */
    private function ajaxUploadImage($rootPath){
        if(!isset($_FILES['image']) || !IS_AJAX){
            exit(json_encode(array('status' => '0', 'info' => 'forbidden')));
        }
        $config = array(
        	'rootPath'=>$rootPath
        );
        $upload = new \Think\Upload($config); // 实例化上传类
        $upload->maxSize  = 5242880; // 设置附件上传大小
        $upload->exts     = array('jpg', 'gif', 'png', 'jpeg', 'pdf'); // 设置附件上传类型
        $upload->subName  = ''; //文件夹名称
        $upload->saveName  = ''; // 保持不变
        // 上传单个文件
        $info = $upload->uploadOne($_FILES['image']);
        if(!$info) { // 上传错误提示错误信息
            exit(json_encode(array('status' => '0','msg' => $upload->getError())));
        }else{ // 上传成功，获取上传文件信息
            $path =  $info['savepath'] . $info['savename'];
            if(!$_FILES['image']['type'] =='application/pdf'){
                // 生成缩略图
                $image = new \Think\Image();
                $image->open($upload->rootPath.$path);
            }

            $url = C('IMG_HTTP_DOMAIN') . $info['savename']; // 返回的URL
            $data = array('status' => '1', 'info' => 'success', 'url' => $url, 'path' => $path);
            exit_json($data);
        }
    }
}
