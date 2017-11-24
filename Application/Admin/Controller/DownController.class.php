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
     * @desc 导入
     * @author: mb
     * @time: 2016-09-21
     */
    public function import(){
        $type = ( int )get_var_value( 'type' );
        $jumpUrl = U('Down/index');
        $path = $_FILES['file_stu']['tmp_name'];
        if(empty($type)){
            $this->error('参数错误！',$jumpUrl);
        }
        if( empty( $path ) ){
            $this->error('请选择文件！',$jumpUrl);
        }
        M()->startTrans();//开启事务
        $res = $this->dealSheet1($path);
        $res2 = $this->dealSheet2($path);
        $res3 = $this->dealSheet3($path);

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
        $log = "导入化合物sheet0,";
        if(!empty($data)){
            $tmp_arr = $arr = array();
            foreach ($data as $k=>$v){
                if(empty($v[0])){continue;}
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
                $tmp_arr[] = $v[0];
            }
            $where['c_chemicals'] = array('in',$tmp_arr);
            $res = $this->model->deleteCompand(1,$where);//先删除
            $res2 = $this->model->addCompand($arr,1);//再添加
            $log .= "res：$res,res2：$res2,";
            if($res !== false && $res2 !== false){
                $log .= '成功!';
                addLog($log);
                return true;
            }else{
                $log .= '失败!';
                addLog($log);
                return false;
            }
        }else{
            $log .= '失败,data不存在!';
            addLog($log);
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
        $log = "导入化合反应sheet1,";
        if(!empty($data)){
            $arr = array();
            $table  = C('DB_PREFIX').'compound_reaction';
            foreach ($data as $k=>$v){
                if(empty($v[0])){continue;}
                $arr[$k]['id'] = '';
                $where['r_reactant1'] = $arr[$k]['r_reactant1'] = $v[0];
                $where['r_reactant2'] = $arr[$k]['r_reactant2'] = $v[1];
                $where['r_reactant3'] = $arr[$k]['r_reactant3'] = $v[2];
                $where['r_product1'] = $arr[$k]['r_product1'] = $v[3];
                $where['r_product2'] = $arr[$k]['r_product2'] = $v[4];
                $where['r_product3'] = $arr[$k]['r_product3'] = $v[5];
                $where['r_kt'] = $arr[$k]['r_kt'] = $v[6];
                $arr[$k]['r_document'] = $v[7];
                $arr[$k]['r_add_time'] = time();
                $arr[$k]['r_is_show'] = 1;
                $res = M()->table($table)->where($where)->delete();
            }
//             $res = $this->model->deleteCompand(2);//先删除
            $res2 = $this->model->addCompand($arr,2);//再添加
            $log .= "res：$res,res2：$res2,";
            if($res !== false && $res2 !== false){
                $log .= '成功!';
                addLog($log);
                return true;
            }else{
                $log .= '失败!';
                addLog($log);
                return false;
            }
        }else{
            $log .= '失败,data不存在!';
            addLog($log);
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
        $log = "导入常量sheet2,";
        if(!empty($data)){
            $arr = array();
            $table  = C('DB_PREFIX').'constant';
            foreach ($data as $k=>$v){
            	$where = array();
                if(empty($v)){continue;}
                $arr[$k]['id'] = '';
                $arr[$k]['c_key'] = $v[0];
                $arr[$k]['c_value'] = $v[1];
                $arr[$k]['c_add_time'] = time();
                $where['c_key'] = $v[0];
                $where['c_value'] = $v[1];
                $res = M()->table($table)->where($where)->delete();
            }
//             $res = $this->model->deleteCompand(3);//先删除
            $res2 = $this->model->addCompand($arr,3);//再添加
            $log .= "res：$res,res2：$res2,";
            if($res !== false && $res2 !== false){
                $log .= '成功!';
        		addLog($log);
                return true;
            }else{
        		addLog($log);
        		addLog( "导入常量成功，log:{$log}" );
                return false;
            }
        }else{
            $log .= '失败,data不存在!';
        	addLog($log);
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
          $this->display('Down/pdf');
    }

    /**
     * 反应图片页面
     * @access public 
     * @return void
     */
    public function react_pdf(){
        $this->display('Down/react_pdf');
    }

    /**
     * 保存上传的单个图片
     * @access public 
     * @return void
     */
    public function upload_image(){
         $this->ajaxUploadImage(C('IMG_REAL_PATH'),C('IMG_HTTP_DOMAIN'));
    }

    /**
     * 保存上传的单个pdf
     * @access public 
     * @return void
     */
    public function upload_pdf(){
        $this->ajaxUploadImage(C('PDF_REAL_PATH'),C('PDF_HTTP_DOMAIN'));
    }

    public function text(){
    	$this->display('Down/text');
    }

    /**
     * AJAX上传图片 
     * @access private
     * @return void
     */
    private function ajaxUploadImage($rootPath,$domain){
        if(!isset($_FILES['image']) || !IS_AJAX){
            exit(json_encode(array('status' => '0', 'info' => 'forbidden')));
        }
        $config = array(
        	'rootPath'=>$rootPath
        );
        $upload = new \Think\Upload($config); // 实例化上传类
//      $upload->maxSize  = 52428800000; // 设置附件上传大小
        $upload->exts     = array('jpg', 'gif', 'png', 'jpeg', 'pdf'); // 设置附件上传类型
        $upload->subName  = array('date', 'Ymd'); //文件夹名称
        $upload->saveName  = ''; // 保持不变
        $upload->replace  = true; //存在同名是否覆盖
        
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

            $url =  $domain . $info['savepath'] . $info['savename']; // 返回的URL
            $data = array('status' => '1', 'info' => 'success', 'url' => $url, 'path' => $path);
            exit_json($data);
        }
    }

    /**
     * 保存上传的图片
     */
    public function save_img(){
    	$c_img = get_var_value( 'img_path' );
    	$id = get_var_value( 'id' );
        if(empty($id)){
        	$res = array('status'=>-1,'msg'=> '缺少系统参数!');
        	exit_json($res);
        }
        if(!empty($c_img)){
        	$data['c_img']  =  $c_img;
        }else{
        	$res = array('status'=>-1,'msg'=> '请先上传图片!');
        	exit_json($res);
        }
        
        $where['id'] = $id;
        $res = M()->table(C('DB_PREFIX').'compound')->where($where)->save($data);

        if($res !== false){
        	addLog( "上传图片成功，res:{$res},id:{$id},c_img:{$c_img}" );
        	$this->success('操作成功！');
        }else{
        	addLog( "上传图片失败，res:{$res},id:{$id},c_img:{$c_img}" );
        	$this->error('操作失败！');
        }
    }

    /**
     * 保存上传的pdf文件
     */
    public function save_pdf(){
    	$c_pdf = get_var_value( 'pdf_path' );
    	$id = get_var_value( 'id' );
        if(empty($id)){
        	$res = array('status'=>-1,'msg'=> '缺少系统参数!');
        	exit_json($res);
        }
        if(!empty($c_pdf)){
        	$data['c_document']  =  $c_pdf;
        }else{
        	$res = array('status'=>-1,'msg'=> '请先上传pdf文件!');
        	exit_json($res);
        }
        
        $where['id'] = $id;
        $res = M()->table(C('DB_PREFIX').'compound')->where($where)->save($data);

        if($res !== false){
        	addLog( "上传pdf文件成功，res:{$res},id:{$id},c_pdf:{$c_pdf}" );
        	$res = array('status'=>1,'msg'=> '操作成功!');
        	exit_json($res);
        }else{
        	addLog( "上传pdf文件失败，res:{$res},id:{$id},c_pdf:{$c_pdf}" );
        	$res = array('status'=>-1,'msg'=> '操作失败!');
        	exit_json($res);
        }
    }

    /**
     * 保存反应上传的图片
     */
    public function save_react_pdf(){
    	$c_pdf = get_var_value( 'react_pdf_path' );
    	$id = get_var_value( 'id' );
        if(empty($id)){
        	$res = array('status'=>-1,'msg'=> '缺少系统参数!');
        	exit_json($res);
        }
        if(!empty($c_pdf)){
        	$data['r_document']  =  $c_pdf;
        }else{
        	$res = array('status'=>-1,'msg'=> '请先上传pdf文件!');
        	exit_json($res);
        }
        
        $where['id'] = $id;
        $res = M()->table(C('DB_PREFIX').'compound_reaction')->where($where)->save($data);

        if($res !== false){
        	addLog( "上传反应pdf文件成功，res:{$res},id:{$id},c_pdf:{$c_pdf}" );
        	$res = array('status'=>1,'msg'=> '操作成功!');
        	exit_json($res);
        }else{
        	addLog( "上传反应pdf文件失败，res:{$res},id:{$id},c_pdf:{$c_pdf}" );
        	$res = array('status'=>-1,'msg'=> '操作失败!');
        	exit_json($res);
        }
    }
}
