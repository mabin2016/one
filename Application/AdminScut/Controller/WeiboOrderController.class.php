<?php
namespace Adminmh\Controller;
use Think\Controller;
/**
 * WeiboOrder控制器
 * @author mabin
 * @createdate 2016-09-19
 */
class WeiboOrderController extends CommonController {
	public function __construct(){
		parent::__construct();
		$this->model = new \Adminmh\Model\WeiboOrderModel();
		$this->impotModel = new \Adminmh\Model\ImportWeiBoOrderModel();
		$this->orderType = 2;//微博
	}

	/**
	 * @desc 首页
	 * @author mabin
	 */
	public function index(){
		$this->display();
	}

	/**
	 * @desc 获取首页列表
	 * @param $wb_order_type 订单类型 1-直推 2-预约
	 * @author mabin
	 */
	public function get_list(){
		$wb_order_type = get_var_post( 'order_type' );//订单类型 1-直推 2-预约
		$wb_create_time = get_var_post( 'create_time' );//创建时间start
		$wb_end_time = get_var_post( 'end_time' );//创建时间end
		$wb_extension_name = get_var_post( 'extension_name' );//活动名称
		$status = get_var_post( 'status' );//订单状态
		$sub_status = get_var_post( 'sub_status' );//子订单状态
		$wb_check_status = get_var_post( 'check_status' );//审核状态
		$wb_pay_status = get_var_post( 'pay_status' );//支付状态
		$aeid = get_var_post( 'aeid' );//AE
		$bdid = get_var_post( 'bdid' );//BD
		$wo_medid = get_var_post( 'medid' );//拓展媒介
		$createuser = get_var_post( 'createuser' );//广告主
		$nickname = get_var_post( 'nickname' );//帐号昵称
		$tax_type = get_var_post( 'tax_type' );//课税方式(  1:含税( 自营 ) 2:不含税 （直营） )
		empty( $wb_order_type )&&$wb_order_type = 1;
		
		if ( !empty( $wb_create_time ) ){$map['wb_create_time'][]= array( 'egt',strtotime( $wb_create_time ) );}
		if ( !empty( $wb_end_time ) ){$map['wb_create_time'][] = array( 'elt',strtotime( $wb_end_time )+( 60*60*24-1 ) );}
		if ( !empty( $wb_extension_name ) ){$map['wb_extension_name'] = array( 'like',"%$wb_extension_name%" );}
		if ( !empty( $aeid ) ){$map['a.wb_aeid'] = $aeid;}
		if ( !empty( $bdid ) ){$map['a.wb_bdid'] = $bdid;}
		if ( !empty( $wo_medid ) ){$map['b.wo_bdid'] = $wo_medid;}
		if ( !empty( $status ) ){$map['a.wb_status'] = $status;}
		if ( !empty( $sub_status ) ){$map['b.wo_status'] = $sub_status;}
		if ( !empty( $wb_pay_status ) ){$map['wb_pay_status'] = $wb_pay_status;}
		if( !empty( $wb_order_type ) ){$map['a.wb_order_type'] = $wb_order_type;}
		if( !empty( $tax_type ) ){$map['a.wb_tax_type'] = $tax_type;}

		$map['a.is_normal'] = 1;//取出正常的

    	//权限控制
    	$isSeeAll = $this->model->isSeeAll();
    	$aeids = $this->model->getAeIdsByManager();
    	$bdids = $this->model->getBdIdsByManager();
    	$medids = $this->model->getMedIdsByManager();
    	if( !$isSeeAll ){//权限控制，如果没有查看所有的权限就要做判断
    		$map['a.wb_aeid'] = array( 'in',$aeids );//AE
    		$map['b.wo_medid'] = array( 'in',$aeids );//bd
    		$map['a.wb_bdid'] = array( 'in',$bdids );//bd
    		$map['b.wo_medid'] = array( 'in',$medids );//媒介
    	}

    	//查询用户
    	if( !empty( $createuser ) ){
    		$map2['a_u_name'] = array( 'like',"%$createuser%" );
    		$user_info = $this->model->getAll( 'adv_users',array( 'a_u_id' ),$map2 );//广告主信息
    		if( !empty( $user_info ) ){
    			$map['a.a_u_id'] = array( 'in', array_column( $user_info, 'a_u_id' ) );
    		}else{
    			output_list( array(),0 );
    		}
    	}
    	
    	//查询帐号昵称
    	if( !empty( $nickname ) ){
    		$map3['aw_weibo_name'] = array( 'like',"%$nickname%" );
    		$info = $this->model->getAll( 'account_weibo',array( 'aw_id' ),$map3 );//广告主信息
    		if( !empty( $info ) ){
    			$map['b.aw_id'] = array( 'in', array_column( $info, 'aw_id' ) );
    		}else{
				output_list( array(),0 );
    		}
    	}
		$data = $this->model->getList( $map );
    	$data = trim_prefix( $data, 'wb_',true );
		output_list( $data['data'],$data['total'] );
	}

	/**
	 * 详情页面列表
	 * @author: mabin
	 * @time: 2016-09-20
	 */
	public function detail() {
		if( !IS_POST ){$this->display();exit;}
		$this->model->checkRight();
		$id = get_var_post( 'id' );
		if( empty( $id ) ){
			output_data( '缺少参数！',-1 );
		}
		$data = array( 'order'=>array(),'sub_order'=>array() );
		$order = $this->model->getOrder( $id );//获取主订单
		$subOrder = $this->model->getSubOrder( $id );//获取子订单
		$subOrder = $this->dealSubOrderData( $subOrder,$order );//处理子订单
		$order = $this->dealOrderData( $order );//处理主订单
		$order['cnt'] = count( $subOrder );//子订单总单数
		$data['order'] = $order;
		$data['sub_order'] = $subOrder;
		output_data( $data );
	}
    
    /**
     * @desc 处理主订单
     * @author: mabin
     * @time: 2016-09-20
     */
    private function dealOrderData( $data ){
    	if( empty( $data ) ){return $data;}
    	$data['wb_order_type_name'] = $data['wb_order_type'] == 1 ? '直推' : '预约';
    	$data['wb_ad_type_name'] = $data['wb_ad_type'] == 1 ? '软广' : '硬广';
    	$data['wb_platform'] = '新浪微博';
    	$data['wb_execute_time'] = date( 'Y-m-d H:i:s',$data['wb_execute_time'] );
    	$data['wb_create_time'] = date( 'Y-m-d H:i:s',$data['wb_create_time'] );
    	$data = trim_prefix( $data, 'wb_' );
    	return $data;
    }
    
    /**
     * @desc 处理子订单
     * @author: mabin
     * @time: 2016-09-20
     */
    private function dealSubOrderData( $subOrder,$order ){
    	if( empty( $subOrder ) ){return $subOrder;}
    	$arr = array();
    	$medids = $this->model->getAllMeds();//获取所有媒介列表
    	$payAccount = $this->model->getPayAccount( array_column( $subOrder, 'wo_map_id' ) );//获取所有媒介对应的收款帐号
    	foreach ( $subOrder as $k=>$v ){
    		$arr[$k] = array( 
    				'sub_id'=>$v['wo_id'],
    				'account_name'=>$v['aw_weibo_name'],
    				'account_url'=>$v['aw_weibo_url'],
    				'avatar_url'=>$v['aw_face_url'],
    				'qq'=>$v['aw_contact_qq'],
    				'followers'=>$v['aw_followers_count'],
    				'm_u_name'=>$v['m_u_name'],
    				'medid_name'=>array_key_exists( $v['wo_medid'], $medids ) ? $medids[$v['wo_medid']]['name'] : '未分配',
    				'status_name'=>$this->model->get_sub_status_name( $v['wo_status'],$order['wb_order_type'] ),
    				'pay_status_name'=>$this->model->get_pay_status_name( $v['wo_pay_status'] ),
    				'pay_account_name'=>array_key_exists( $v['wo_map_id'], $payAccount ) ? $payAccount[$v['wo_map_id']]['map_account_name'] : '未分配',
    				'a_price'=>$v['wo_a_price'],
    				'a_settlement'=>$v['wo_a_settlement'],
    				'a_reduce_money'=>$v['wo_a_reduce_money'],
    				'm_price'=>$v['wo_m_price'],
    				'm_settlement'=>$v['wo_m_settlement'],
    				'm_reduce_money'=>$v['wo_m_reduce_money'],
    				'is_postpay'=>$v['wo_is_postpay'] == 1 ? '是' : '否',
    				'remark'=>$v['wo_remark'],//接单说明
    				'decline_info'=>$v['wo_decline_info'] ? $v['wo_decline_info'] : '无',//拒单说明
    				'complaint_type'=>$this->model->getComplaintType( $v['wo_complaint_type'] ),//投诉类型
    				'complaint_desc'=>$v['wo_complaint_desc'] ? $v['wo_complaint_desc'] : '无',//问题简述
    				'complaint_refuse_reason'=>$v['wo_complaint_refuse_reason'],//投诉驳回原因
    		 );
			//接单
    		if( $v['wo_status'] >= 2 || $order['wb_check_status'] == 1 ){
	    		$arr[$k]['jiedan_btn'] = 0;
    		}else{
	    		$arr[$k]['jiedan_btn'] = 1;
    		}
			//拒单
    		if( $v['wo_pay_status'] == 4 || in_array( $v['wo_status'], array( 3,4,5 ) ) || $order['wb_check_status'] == 1 ){
	    		$arr[$k]['judan_btn'] = 0;
    		}else{
	    		$arr[$k]['judan_btn'] = 1;
    		}
			//取消订单
    		if( $v['wo_pay_status'] != 1 || $v['wo_status'] == 5 ){
	    		$arr[$k]['cancle_btn'] = 0;
    		}else{
	    		$arr[$k]['cancle_btn'] = 1;
    		}
			//填写执行结果
    		if( $v['wb_pay_status'] != 2 || $v['wo_status'] != 2 || $order['wb_check_status'] < 2 ){
	    		$arr[$k]['execute_btn'] = 0;
    		}else{
	    		$arr[$k]['execute_btn'] = 1;
    		}
			//投诉处理
    		if( $v['wb_pay_status'] != 2 || $v['wo_status'] != 7 || $order['wb_check_status'] < 2 ){
	    		$arr[$k]['handlecomplaint_btn'] = 0;
    		}else{
	    		$arr[$k]['handlecomplaint_btn'] = 1;
    		}
    	}
    	return $arr;
    }

    /**
     * @desc 获取收款帐号列表
     * @author: mabin
     * @time: 2016-10-20
     */
    public function get_pay_account_list(){
    	$sub_id = get_var_value( 'sub_id' );
    	if( empty( $sub_id ) ){output_data( '缺少参数',-1 );}
    	$data = $this->model->getPayAccountList( $sub_id );
    	$data = trim_prefix( $data, 'map_', true );
    	output_data( $data );
    }

    /**
     * @desc 更改子订单对应的收款帐号
     * @author: mabin
     * @time: 2016-10-20
     */
    public function change_pay_account(){
    	$sub_id = (int)get_var_value( 'sub_id' );
    	$map_id = (int)get_var_value( 'map_id' );
    	if( empty( $sub_id ) || empty( $map_id ) ){output_data( '缺少参数',-1 );}
    	$res = $this->model->changePayAccount( $sub_id, $map_id );
    	if( $res !== false ){
    		addLog( "更改子订单对应的收款帐号成功，res：{$res},sub_id：{$sub_id},map_id：{$map_id}" );
    		output_data( '操作成功!' );
    	}else{
    		addLog( "更改子订单对应的收款帐号失败，res：{$res},sub_id：{$sub_id},map_id：{$map_id}" );
    		output_data( '操作失败!',-1 );
    	}
    }

    /**
     * @desc 添加新收款帐号
     * @author: mabin
     * @time: 2016-10-20
     */
    public function add_pay_account(){
    	$sub_id = (int)get_var_value( 'sub_id' );
    	$data['map_account_name'] = $account_name = get_var_value( 'account_name' );//收款户名
    	$data['map_account'] = $account = get_var_value( 'account' );//收款账户
    	$data['map_account_bank'] = $account_bank = get_var_value( 'account_bank' );//收款开户银行
    	if( empty( $sub_id ) || empty( $account_name ) || empty( $account ) || empty( $account_bank ) ){output_data( '缺少参数',-1 );}
    	
    	$r_id = $this->model->getRid( $sub_id );//获取子订单的帐号对应的媒介资源id（r_id）
    	if( empty( $r_id ) ){
    		output_data( '操作失败,帐号未关联媒介资源!',-1 );
    	}
    	$has = $this->model->hasExist( $r_id, $account );//查看下有没有重复
    	if( $has ){
    		output_data( '此帐户已经添加，不能重复添加!',-1 );
    	}
    	
    	$data['r_id'] = $r_id;
    	$data['map_addtime'] = $data['map_updatetime'] = time();
    	$res = $this->model->addPayAccount( $data );
    	
    	if( $res !== false ){
    		addLog( "添加收款帐号成功，res：{$res},sub_id：{$sub_id},account_name：{$account_name},account：{$account},account_bank：{$account_bank}" );
    		output_data( '操作成功!' );
    	}else{
    		addLog( "添加收款帐号失败，res：{$res},sub_id：{$sub_id},account_name：{$account_name},account：{$account},account_bank：{$account_bank}" );
    		output_data( '操作失败!',-1 );
    	}
    }
    
    /**
     * @desc 获取一个主订单
     * @author: mabin
     * @time: 2016-09-20
     */
    public function get_order(){
    	$id = get_var_post( 'id' );
    	if( empty( $id ) ){output_data( '缺少参数',-1 );}
    	$data = $this->model->getOrder( $id );
    	$data = trim_prefix( $data, 'wb_' );
    	output_data( $data );
    }
    
    /**
     * @desc 分配AE
     * @author: mabin
     * @time: 2016-09-05
     */
    public function disAE(){
    	$ids = get_var_post( 'ids' );
    	$setid = get_var_post( 'setid' );
    	
    	if( empty( $ids ) || empty( $setid ) ){output_data( '缺少参数',-1 );}

    	$savedata = array( 'wb_aeid' => $setid );
    	$savedata2 = array( 'wo_aeid' => $setid );
    	$where = array( 'wb_id'=>array( 'IN',$ids ) );
    	
    	M()->startTrans();
    	$result = $this->model->toTable( 'weibo_order' )->where( $where )->save( $savedata );
    	$result2 = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $savedata2 );
    	
    	if( $result !== false && $result2 !== false ){
    		M()->commit();
    		addLog( "订单分配AE成功，result:$result,result2:$result2,ids:$ids" );
    		output_data( '保存成功' );
    	}else{
    		M()->rollback();
    		addLog( "订单分配AE失败，result:$result,result2:$result2,ids:$ids" );
    		output_data( '保存失败',-1 );
    	}	
    }

    /**
     * @desc 分配BD
     * @author: mabin
     * @time: 2016-09-05
     */
    public function disBD(){
    	$ids = get_var_post( 'ids' );
    	$setid = get_var_post( 'setid' );
    	if( empty( $ids ) || empty( $setid ) ){output_data( '缺少参数',-1 );}
    	
    	$savedata = array( 'wb_bdid'=>$setid );
    	$savedata2 = array( 'wo_bdid'=>$setid );
    	$where = array( 'wb_id'=>array( 'IN',$ids ) );
    	
    	M()->startTrans();
    	$result = $this->model->toTable( 'weibo_order' )->where( $where )->save( $savedata );
    	$result2 = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $savedata2 );
    	
    	if( $result !== false && $result2 !== false ){
    		M()->commit();
    		addLog( "订单BD分配成功,result：$result,result2：$result2,ids:$ids" );
    		output_data( '保存成功' );
    	}else{
    		M()->rollback();
    		addLog( "订单BD分配失败,result：$result,result2：$result2,ids:$ids" );
    		output_data( '保存失败',-1 );
    	}
    }

    /**
     * @desc 订单审核
	 * 			直推订单：支付-》后台审核
	 * 			预约订单：后台修改价格->审核->支付
     * @author: mabin
     * @time: 2016-09-20
     */
    public function check_order() {
    	$this->model->checkRight();
    	$id = get_var_post( 'id' );
    	$check_status = get_var_post( 'check_status' );
    	$decline_info = get_var_post( 'decline_info' );

    	if( empty( $id ) || empty( $check_status ) ){output_data( '缺少参数',-1 );}
    	
    	$order = $this->model->getOrderDetail( $id );//获取主订单
    	if( $order['wb_check_status'] != 1 ){output_data( '该订单已做过审核操作,不能再进行审核操作！',-1 );}
    	if( empty($order['wb_apply_no']) ){output_data( '该订单未选择合同,不能进行审核操作！',-1 );}
    	//if( $order['wb_order_type'] == 1 && $order['wb_pay_status'] != 2 ) exit( json_encode( array( 'status' => 0, 'msg' => '该订单还未支付，暂不能审核！' ) ) );//如果是直推要先支付
    	if ( $check_status==3  && empty( $decline_info ) ){output_data( '选择"否"审核不通过时原因不能为空！',-1 );}
    	if ( $check_status==2  && !empty( $decline_info ) ){output_data( '选择"是"审核通过时不需要填写"审核未通过原因"！',-1 );}
    	if( !in_array( $check_status, array( 2,3 ) ) ){output_data( '提交失败,请重试!',-1 );}
    	
    	$subOrder = $this->model->getSubOrder( $id );//获取子订单
    	$user_info = $this->model->getAdvUsersInfo( $order['a_u_id'] );//广告主信息
    	
    	if( $check_status == 2 ){//审核通过
    		$data['wb_check_status'] = 2;
    		$res = $this->model->checkOrder( $data,$id );
    		$res2 = $res3 = $res4 = true;
    	}else{//审核不通过要退钱给广告主,主订单金额变为0，广告主相关金额更新
    		M()->startTrans();//开启事务
    		$data['wb_check_status'] = 3;
    		if( $order['wb_pay_status'] == 2 ) {$data['wb_pay_status'] = 3;}//只有冻结了的才能解冻
    		$data['wb_decline_info'] = $decline_info;
    		
    		$subOrderArr = $this->model->getSubOrderData( $id );
    		$data2['a_u_balance'] = $user_info['a_u_balance'] + $subOrderArr['settelment'] - $subOrderArr['credit'];//余额支付部分=订单总费用-总使用信用支付部分
    		$data2['a_u_used_credit'] = $user_info['a_u_used_credit'] - $subOrderArr['credit'];//用户新的信用已使用额度
    		$data2['a_u_weibo_frozen_money'] = $user_info['a_u_weibo_frozen_money'] - $subOrderArr['settelment'];//用户新的冻结总金额
    		
    		$remark = "微博订单审核不通过，解冻金额";
    		$res = $this->model->checkOrder( $data,$id );
    		if( $order['wb_pay_status'] == 2 ) {//只有冻结了的才会解冻和记录流水
    			$res2 = $this->model->updateUserData( $order['a_u_id'],$data2 );
    			$res3 = $this->model->logFlow( $order['wb_id'], $order['a_u_id'], $subOrderArr['settelment'], 6, 4, $remark );
    			$res4 = $this->model->toTable( 'weibo_sub_order' )->where(  array(  'wb_id' => $id  )  )->data(  array(  'wo_pay_status' => 3  )  )->save();
    		}else{
    			$res2 = $res3 = $res4 = true;
    		}
    	}
    	
    	if ( $res !== false && $res2 !== false && $res3 !== false && $res4 !== false  ) {
    		if( $check_status != 2 ) {
    			M()->commit();
    		}else{
	    		$weiboType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    			$media_msg = "（微博{$weiboType}）亲爱的自媒体，您在米汇平台收到执行订单，请尽快登录接单，以免超过执行时间造成流单，谢谢合作。 ";
    			$med_msg = "（微博{$weiboType}）亲爱的媒介执行，广告主{$user_info['a_u_name']}新订单{$id}已通过审核，请尽快登录跟进订单，以免超过执行时间造成流单，谢谢合作。";
    			
    			$muids = array();
    			$med_ids = array();
    			if( !empty( $subOrder ) ){
    				foreach( $subOrder as $k=>$v ){
    					if( $v['m_u_id'] ){
    						$muids[] = $v['m_u_id'];
    					}
    					if( $v['wo_medid'] ){
    						$med_ids[] = $v['wo_medid'];
    					}
    				}
    				notice_extend_med( $med_ids, $med_msg );//通知媒介
    				notice_we_media( $muids, $media_msg );//通知媒介主
    			}
    		}
    		
    		addLog( "订单审核成功，res：{$res},res2：{$res2},res3：{$res3},res4：{$res4},id:{$id}" );
    		output_data( '操作成功!' );
    	}else{
    		if( $check_status != 2 ) {M()->rollback();}
    		addLog( "订单审核失败，res：{$res},res2：{$res2},res3：{$res3},res4：{$res4},id:{$id}" );
    		output_data( '操作失败!',-1 );
    	}
    }
    
    /**
     * @desc 修改订单定金收入和支出
     * @param id 主订单id
     * @param type 1-定金收入 2-定金支出
     * @param add_money 增加的金额
     * @param plus_money 减少的金额
     * @author: mabin
     * @time: 2016-09-21
     */
    public function edit_order_payment(){
    	$this->model->checkRight(); // 检查权限
    	$id    = ( int )get_var_post( 'id' );
    	$type  = ( int )get_var_post( 'type' );
    	$add_money = get_var_post( 'add_money' );
    	$plus_money = get_var_post( 'plus_money' );
    	$add_money = floatval( $add_money );
    	$plus_money = floatval( $plus_money );
    	
    	if( !in_array( $type, array( 1,2 ) ) || empty( $id ) ){output_data( '参数错误!',-1 );}
    	$order = $this->model->getOne( 'weibo_order',array( 'wb_income_remark as income','wb_expenditure_remark as spend' ),array( 'wb_id'=>$id ) );
    	if( $type == 1 ){
    		$old_money = $order['income'];
    		$field = 'wb_income_remark';
    	}else{
    		$old_money = $order['spend'];
    		$field = 'wb_expenditure_remark';
    	}
    	$act_money = $add_money - $plus_money;//变化的金额
    	$new_money = $old_money + $act_money;//新的金额
		if( $new_money < 0 ){output_data( '定金收入或支出不能小于0',-1 );}
		$order_type = $this->orderType;//微博	
		
    	M()->startTrans();
    	$map = array( 'wb_id' => $id );
    	$data[$field] = $new_money;
    	$res = $this->model->toTable( 'weibo_order' )->where( $map )->data( $data )->save();
    	$res2 = addPaymentLog( $id, $order_type, $type, $act_money );//添加定金操作记录
    	
    	if( $res !== false && $res2 !== false ){
    		M()->commit();
    		addLog( "修改订单定金成功，res：{$res},res2：{$res2},id:{$id}" );
    		output_data( '操作成功!' );
    	}else{
    		M()->rollback();
    		addLog( "修改订单定金失败，res：{$res},res2：{$res2},id:{$id}" );
    		output_data( '操作失败!',-1 );
    	}
    }
    
    /**
     * @desc 订单定金收入和支出清零操作
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-09-21
     */
    public function clean_order_payment(){
    	$this->model->checkRight();
    	$id = ( int )get_var_post( 'id' );
    	if( empty( $id ) ){output_data( '参数错误!',-1 );}
    	
    	$order = $this->model->getOne( 'weibo_order',array( 'wb_income_remark as income','wb_expenditure_remark as spend' ),array( 'wb_id'=>$id ) );
    	$order_type = $this->orderType;//微博
    	
    	M()->startTrans();
    	$map = array( 'wb_id' => $id );
    	$data['wb_income_remark'] = $data['wb_expenditure_remark'] = 0.00;
    	$res = $this->model->toTable( 'weibo_order' )->where( $map )->data( $data )->save();
    	$res2 = addPaymentLog( $id, $order_type, 1, $order['income'],'订单清零' );
    	$res3 = addPaymentLog( $id, $order_type, 2, $order['spend'],'订单清零' );
    	
    	if( $res !== false && $res2 !== false && $res3 !== false ){
    		M()->commit();
    		addLog( "订单定金清零成功，res：{$res},res2：{$res2},res3：{$res3},id:{$id}" );
    		output_data( '操作成功!' );
    	}else{
    		M()->rollback();
    		addLog( "订单定金清零失败，res：{$res},res2：{$res2},res3：{$res3},id:{$id}" );
    		output_data( '操作失败!',-1 );
    	}
    }
    
    /**
     * @desc 订单定金收入和支出记录
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-09-21
     */
    public function get_payment_log(){
    	$this->model->checkRight();
    	$id = ( int )get_var_post( 'id' );
    	if( empty( $id ) ){output_data( '参数错误!',-1 );}
    	
    	$field = array( 'act_type','act_money','log_name','act_time','log_content' );
    	$map['order_id'] = $id;
    	$map['order_type'] = $this->orderType;//微博
    	$data = $this->model->toTable( 'log_order_payment' )->field( $field )->where( $map )->limit( 100 )->order( "log_id desc" )->select();
    	foreach ( $data as $k=>$v ){
    		$data[$k]['act_time'] = $v['act_time'] != 0 ? date( 'Y-m-d H:i:s',$v['act_time'] ) : '';
    	}
    	output_data( $data );
    }
    
    /**
     * @desc 修改广告主结算金额
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-09-21
     */
    public function edit_ad_data(){
    	$this->model->checkRight();
    	$sub_id = ( int )get_var_post( 'sub_id' );
    	$val = get_var_post( 'val' );
    	if( empty( $sub_id ) || $val == '' ){output_data( '缺少参数 !',-1 );}
    	
    	$subOrder = $this->model->getSubOrderDetail( $sub_id );//获取子订单
    	$order = $this->model->getOrderDetail( $subOrder['wb_id'] );//获取主订单
    	
    	if( !$subOrder || !$order ){output_data( '订单不存在 !',-1 );}
    	if( $order['wb_pay_status'] != 1 ){output_data( '广告主结算价格只有在未支付前可以修改，该订单可能已完成支付或已失效 !',-1 );}
    	if ( $subOrder['wo_status'] == 5 ){output_data( '取消的订单不能操作!',-1 );}
    	
    	$diff = floatval( $val ) - $subOrder['wo_a_settlement'];
    	if( $diff == 0 ){output_data( '修改成功 !' );}
    	
    	M()->startTrans();//开启事务
    	
    	$where['wo_id'] = $sub_id;
    	$data = array( "wo_a_settlement" => $val );
    	$res = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );//修改子订单结算价格
    	$res2 = $this->model->changeOrderPrice( $subOrder['wb_id'] );//修改主订单结算总价
    	
    	if ( $res !== false && $res2 !== false ){
    		M()->commit();
    		addLog( "修改广告主结算金额成功，res：{$res},res2：{$res2},wo_id:$sub_id" );
    		output_data( '修改成功!' );
    	}else{
    		M()->rollback();
    		addLog( "修改广告主结算金额失败，res：{$res},res2：{$res2},wo_id:$sub_id" );
    		output_data( '修改失败 !',-1 );
    	}	
    }
    
    /**
     * @desc 修改自媒体结算金额
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-09-21
     */
    public function edit_med_data(){
    	$this->model->checkRight();
    	$sub_id = ( int )get_var_post( 'sub_id' );
    	$val = get_var_post( 'val' );
    	if( empty( $sub_id ) ){output_data( '缺少参数 !',-1 );}
    	
    	$subOrder = $this->model->getSubOrderDetail( $sub_id );//获取子订单
    	$order = $this->model->getOrderDetail( $subOrder['wb_id'] );//获取主订单
    	 
    	if( !$subOrder || !$order ){output_data( '订单不存在 !',-1 );}
    	if( $order['wb_pay_status'] != 1 ){output_data( '广告主结算价格只有在未支付前可以修改，该订单可能已完成支付或已失效 !',-1 );}
    	if( in_array( $subOrder['wo_status'],array( 3,4,5 ) ) ){output_data( '订单已失效!',-1 );}
    	 
    	$diff = floatval( $val ) - $subOrder['wo_m_settlement'];
    	if( $diff == 0 ){output_data( '修改成功 !' );}
    	 
    	$where['wo_id'] = $sub_id;
    	$data = array( "wo_m_settlement" => $val );
    	$res = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );//修改子订单总价
    	 
    	if ( $res !== false ){
    		addLog( "修改自媒体结算金额成功，res：{$res},sub_id:{$sub_id}" );
    		
    		$orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    		notice_ae( $subOrder['wo_aeid'], "（微博{$orderType}）亲爱的AE，主订单{$order['wb_id']}的子订单{$sub_id}成本价已修改，请尽快登录后台查看，跟进订单。", 0, 1, 0 );
    		
    		output_data( '修改成功 !' );
    	}else{
    		addLog( "修改自媒体结算金额失败，res：{$res},sub_id:{$sub_id}" );
    		output_data( '修改失败 !',-1 );
    	}
    }
    
    /**
     * @desc 修改推广订单执行时间
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-09-21
     */
    public function update_time(){
    	$this->model->checkRight();
    	$id = get_var_post( 'id' );
    	$time = get_var_post( 'time' );
    	if( empty( $id ) ){output_data( '缺少参数 !',-1 );}
    	if( empty( $time ) ){output_data( '时间不能留空 !',-1 );}

    	$data = array( 'wb_execute_time' => strtotime( $time ) );
    	$where = array( 'wb_id' => $id );
    	$res = $this->model->toTable( 'weibo_order' )->where( $where )->save( $data );//修改子订单总价
    	
    	if ( $res !== false ){
    		addLog( "修改推广订单执行时间成功，res：{$res},id:{$id}" );

    		
    		$order = $this->model->getOrderDetail( $id );//获取主订单
    		$subOrder = $this->model->toTable( 'weibo_sub_order' )->field( 'wo_medid' )->where( array( 'wb_id'=>$id, 'wo_status'=>array( 'in', '1,2' ) ) )->select();
    		$medids = array();
    		foreach ( $subOrder as $v ){
    			$medids[] = $v['wo_medid'];
    		}
    		$orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    		notice_extend_med( $medids, "（微博{$orderType}）亲爱的媒介执行，主订单{$wb_id}的广告执行时间已修改，请尽快登录后台查看，跟进订单。", 0 );
    		
    		output_data( '修改成功 !' );
    	}else{
    		addLog( "修改推广订单执行时间失败，res：{$res},id:{$id}" );
    		output_data( '修改失败 !',-1 );
    	}
    }
    
    /**
     * @desc 修改订单详情
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-09-21
     */
    public function edit_order_detail(){
    	$this->model->checkRight();
    	$id = ( int )get_var_post(  'id'  );
    	$type = get_var_post (  'type'  );
    	$val    = get_var_post (  'val'  );
    	if( empty( $id ) || empty( $type ) || is_null( $val ) ){output_data( '缺少参数 !',-1 );}
    	 
    	$order = $this->model->getOrderDetail( $id );//获取主订单
    	if( !$order ){output_data( '订单不存在 !',-1 );}
    	if( $order['wb_pay_status'] != 1 ){output_data( '支付之后不能修改!',-1 );}
    	
    	if( $type == 1 ){
    		$field = 'wb_send_url';
    	}else if( $type == 2 ){
    		$field = 'wb_remark';
    	}else{
    		$field = 'wb_content';
    	}
    	
    	$where['wb_id'] = $id;
    	$data[$field] = $val;
    	$res = $this->model->toTable( 'weibo_order' )->where( $where )->data( $data )->save();
    	
    	if ( $res !== false ){
    		addLog( "修改订单详情字段{$field}成功,type:$type,res：{$res},id:{$id}" );
    		
    		$subOrder = $this->model->toTable( 'weibo_sub_order' )->field( 'wo_medid' )->where( array( 'wb_id'=>$id, 'wo_status'=>array( 'in','1,2' ) ) )->select();
    		$medids = array();
    		foreach ( $subOrder as $v ){
    			$medids[] = $v['wo_medid'];
    		}
    		$orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    		switch( $field ){
    			case 'wb_send_url':
    				$content = "（微博{$orderType}）亲爱的媒介执行，主订单{$wb_id}的转发链接已修改，请尽快登录后台查看，跟进订单。";
    				break;
    			case 'wb_content':
    				$content = "（微博{$orderType}）亲爱的媒介执行，主订单{$wb_id}的发送内容已修改，请尽快登录后台查看，跟进订单。";
    				break;
    			default:
    				$content = '';
    		}
    		if( $content && $medids ){
    			notice_extend_med( $medids, $content, 0 );
    		}
    		
    		output_data( '修改成功 !' );
    	}else{
    		addLog( "修改订单详情字段{$field}失败,type:$type,res：{$res},id:{$id}" );
    		output_data( '修改失败 !',-1 );
    	}
    }
    
    /**
     * @desc 导入订单
     * @author: ymc
     * @time: 2016-09-21
     */
    public function import(){
    	$order_type = ( int )get_var_post( 'order_type' );
    	if( !in_array( $order_type, array( 1,2 ) ) ){
    		output_data( '缺少参数 !',-1 );
    	}
    	S( array( 
    			'type'=>'redis',
    			'prefix'=>'adm_wbo_i_',
    			'expire'=>3600
	    	 )
    	 );
    	if( isset( $_POST['active'] ) && $_POST['active']=='confirm' ){
    		$data = S( session_id().'_wboimport' );
    		if( $data ){
    			$retult = $this->impotModel->addOrder( $data );
    		}else{
    			$retult = array( 'status'=>-2, 'msg'=>'导入失败' );
    		}
    	}else{
    		if( !isset( $_FILES['csv'] ) || !IS_AJAX ){
    			output_data( '请选择文件!',-1 );
    		}
    		$data = readcvsfile( $_FILES['csv']['tmp_name'] );
    		$retult = $this->impotModel->importOrder( $data,$order_type );
    	}
    	if( $retult['status'] == -2 ){
	    	output_data( $retult['msg'],-1 );
    	}else{
	    	output_data( $retult['msg'] );
    	}
    }
    
    /**
     * @desc 支付订单
     * @author ymc
     * @time: 2016-09-21
     */
    public function pay_order(){
    	$id = get_var_post( 'id' );
    	if( !$id ){
    		output_data( '参数错误',-1 );
    	}
    	$retult = $this->impotModel->payOrder( $id );
    	if( $retult['status'] == -1 ){
    		output_data( $retult['msg'],-1 );
    	}else{
    		output_data( $retult['msg'] );
    	}
    }
    
    /**
     * @desc 接单
     * @author mabin
     * @time: 2016-09-21
     */
    public function jiedan() {
    	$this->model->checkRight();
    	$sub_id = ( int )get_var_post( 'sub_id' );
    	if ( empty( $sub_id ) ) {output_data( '参数不能为空！',-1 );}

    	$subOrder = $this->model->getSubOrderDetail( $sub_id );//获取子订单
    	$order = $this->model->getOrderDetail( $subOrder['wb_id'] );//获取订单
    	
    	if ( $subOrder['wo_status'] >= 2 ) {output_data( '已接单，请不要重复操作！',-1 );}
    	if ( $order['wb_check_status'] == 1 ) {output_data( '订单未审核，不能接单！',-1 );}

    	if( $order['wb_order_type'] == 1 ){
    		if( $order['wb_pay_status'] != 2 ) {output_data( '未支付不能接单！',-1 );}
    	}else{
    		if( $order['wb_pay_status'] != 1 ) {output_data( '已支付不能接单！',-1 );}
    	}
    	if( empty( $subOrder['wo_a_settlement'] ) || empty( $subOrder['wo_m_settlement'] ) ) {output_data( '未填写广告主和自媒体的结算金额不能接单！',-1 );}
    	
    	$user_session = session();
    	$data = array( 
    			'wo_status'=>2,
    			'wo_admin_uid'=>$user_session['manager']['id'],
    			'wo_admin_name'=>$user_session['manager']['name'],
    			'wo_admin_update_time'=>time(),
    	 );
    	
    	M()->startTrans();//开启事务
    	$where['wo_id'] = $sub_id;
    	$res = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );//修改子订单
    	$res2 = $this->model->updateOrderStatus( $order['wb_id'],$this->orderType );//更改主订单状态
    	
    	if ( $res !== false && $res2 !== false ) {
    		M()->commit();
    		addLog( "订单接单成功，res：{$res},res2：{$res2},sub_id:{$sub_id}" );
    		 
    		$advInfo = $this->model->getAdvUsersInfo( $order['a_u_id'] );//取出电话
    		$advName = empty( $advInfo['a_u_name'] ) ? '' : $advInfo['a_u_name'];
    		$orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    		notice_ae( $subOrder['wo_aeid'] , "（微博{$orderType}）亲爱的AE，广告主{$advName}的主订单{$order['wb_id']}号的子订单{$sub_id}已接单，请登录米汇后台跟进，谢谢合作。" );
    		 
    		output_data( '操作成功！' );
    	}else{
    		M()->rollback();
    		addLog( "订单接单失败，res：{$res},res2：{$res2},sub_id:{$sub_id}" );
    		output_data( '操作失败！',-1 );
    	}	
    }
    
    /**
     * @desc 子订单拒单
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-09-21
     */
    public function judan() {
    	$this->model->checkRight();
    	$sub_id = ( int )get_var_post( 'sub_id' );
    	$decline_info = get_var_post( 'decline_info' );
        if ( !is_array( $decline_info ) ) {
            output_data( '参数格式错误！', -1 );
        }
    	$other_reason = get_var_post( 'other_reason' );
    	if ( empty( $sub_id ) ) {
    		output_data( '参数不能为空！',-1 );
    	}
    	if( !is_array( $decline_info ) ){
    		output_data( '参数错误！',-1 );
    	}
    	
    	$subOrder = $this->model->getSubOrderDetail( $sub_id );//获取子订单
    	$order = $this->model->getOrderDetail( $subOrder['wb_id'] );//获取主订单
    	$user_info = $this->model->getAdvUsersInfo( $order['a_u_id'] );//广告主信息
    	
    	if ( $subOrder['wo_pay_status'] == 4 ) {output_data( '支付完成的订单不能拒单！',-1 );}
    	if ( in_array( $subOrder['wo_status'], array( 3,4,5 ) ) ) {output_data( '状态是拒单、取消、流单的不能操作！',-1 );}
    	if ( $order['wb_check_status'] == 1 ) {output_data( '订单未审核，不能拒单！',-1 );}
    	
    	if ( empty( $decline_info ) || empty( $other_reason ) ) {output_data( '您还没有填写拒单原因！',-1 );}
    	$decline_info[] = $other_reason;
    	$declineStr = implode( ',', $decline_info );
    	
    	M()->startTrans();//开启事务
    	$user_session = session();
    	$data = array( 
    			'wo_decline_info' => $declineStr,
    			'wo_status' => 3,
    			'wo_a_settlement' => 0,
    			'wo_m_settlement' => 0,
    			'wo_admin_uid'=>$user_session['manager']['id'],
    			'wo_admin_name'=>$user_session['manager']['name'],
    			'wo_admin_update_time'=>time()
    	 );
    	
    	if( $order['wb_pay_status'] == 2 ) $data['wo_pay_status'] = 3;//只有已支付才能退款,解冻
    	$where['wo_id'] = $sub_id;
    	$res = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );//修改子订单
    	
    	$data2 = array( 
    			'wb_total_price'=>$order['wb_total_price']-$subOrder['wo_a_price'],
    			'wb_settlement_price'=>$order['wb_settlement_price']-$subOrder['wo_a_settlement']
    	 );
    	if( $order['wb_pay_status'] == 2 ){//只有已支付才能退款,解冻
    		if( $this->model->isFinishPayStatus( $subOrder['wb_id'],3 ) ) {$data2['wb_pay_status'] = 3;}//如果子订单全部都解冻了主订单也要解冻
    		$data3 = array( 
    				'a_u_balance'=>$user_info['a_u_balance'] + $subOrder['wo_a_settlement'] - $subOrder['wo_use_credit_part'],//余额支付部分=订单总费用-总使用信用支付部分
    				'a_u_used_credit'=>$user_info['a_u_used_credit'] - $subOrder['wo_use_credit_part'],//用户新的信用已使用额度
    				'a_u_weibo_frozen_money'=>$user_info['a_u_weibo_frozen_money'] - $subOrder['wo_a_settlement']//用户新的冻结总金额
    		 );
    		$res3 = $this->model->updateUserData( $order['a_u_id'],$data3 );//更改广告主金额
    	}else{
    		$res3 = true;
    	}
    	
    	$res2 = $this->model->updateOrderData( $order['a_u_id'],$order['wb_id'],$data2 );//修改主订单总价
    	$res4 = $this->model->updateOrderStatus( $order['wb_id'],$this->orderType );//更改主订单状态
    	if( $order['wb_pay_status'] == 2 ){//只有已支付才能退款,解冻才记录流水
	    	$res5 = $this->model->logFlow( $order['wb_id'], $order['a_u_id'], $subOrder['wo_a_settlement'], 6, 4, "微博订单拒单，解冻子订单金额" );
    	}else{
    		$res5 = true;
    	}
    	
    	if ( $res !== false && $res2 !== false && $res3 !== false && $res4 !== false && $res5 !== false ) {
    		M()->commit();
    		
    		$advInfo = $this->model->getAdvUsersInfo( $order['a_u_id'] );//取出电话
    		$orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    		$advName = empty( $advInfo['a_u_name'] ) ? '' : $advInfo['a_u_name'];
    		notice_ae( $subOrder['wo_aeid'], "（微博{$orderType}）亲爱的AE，广告主{$advName}的主订单{$order['wb_id']}的子订单{$sub_id}已拒单，请登录米汇后台跟进，谢谢合作。", 1, 1, 0 );
    		
    		addLog( "微博拒单成功，res：{$res},res2：{$res2},res3：{$res3},res4：{$res4},res5：{$res5},sub_id:{$sub_id}" );
    		output_data( '操作成功!' );
    	}else{
    		M()->rollback();
    		addLog( "微博拒单失败，res：{$res},res2：{$res2},res3：{$res3},res4：{$res4},res5：{$res5},sub_id:{$sub_id}" );
    		output_data( '操作失败!',-1 );
    	}
    }
    
    /**
     * @desc 子订单一键拒单
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-10-10
     */
    public function judan_batch() {
    	$this->model->checkRight();
    	$id = ( int )get_var_post( 'id' );
    	$decline_info = get_var_post( 'decline_info' );
    	$other_reason = get_var_post( 'other_reason' );
    	if ( empty( $id ) ) {output_data( '参数不能为空！',-1 );}
    	
    	$subOrder = $this->model->getSubOrderJudan( $id );//取出符合条件可以拒单的子订单
    	if ( empty( $subOrder ) ) {output_data( '没有可以拒单的子订单！',-1 );}
    	
    	$order = $this->model->getOrderDetail( $id );//获取主订单
    	$user_info = $this->model->getAdvUsersInfo( $order['a_u_id'] );//广告主信息
    	
    	if ( $order['wb_check_status'] == 1 ) {output_data( '订单未审核，不能拒单！',-1 );}
    	if ( empty( $decline_info ) || empty( $other_reason ) ) {output_data( '您还没有填写拒单原因！',-1 );}
    	$decline_info[] = $other_reason;
    	$declineStr = implode( ',', $decline_info );
    	
    	M()->startTrans();//开启事务
    	$user_session = session();
    	$total_a_price = $total_a_settlement = $total_use_credit_part = 0;
    	$subIdArr = array();
    	foreach ( $subOrder as $k=>$v ){
	    	$total_a_price += $v['wo_a_price'];
	    	$total_a_settlement += $v['wo_a_settlement'];
	    	$total_use_credit_part += $v['wo_use_credit_part'];
	    	$subIdArr[] = $v['wo_id'];
	    	
	    	$data = array( 
	    			'wo_decline_info' => $declineStr,
	    			'wo_status' => 3,
	    			'wo_pay_status' => $order['wb_pay_status'] == 2 ? 3 : $v['wo_pay_status'],//只有已支付才能退款,解冻
	    			'wo_a_settlement' => 0,
	    			'wo_m_settlement' => 0,
	    			'wo_admin_uid'=>$user_session['manager']['id'],
	    			'wo_admin_name'=>$user_session['manager']['name'],
	    			'wo_admin_update_time'=>time()
	    	 );
	    	
	    	if( !empty( $v['wo_id'] ) ) {//修改子订单
	    		$where['wo_id'] = $v['wo_id'];
	    		$res = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );
	    	}else{
	    		M()->rollback();
	    		addLog( "微博一键拒单失败,子订单id不存在,id:{$id},data:".json_encode( $v ) );
	    		output_data( '操作失败!',-1 );
	    	}
    	}
    	
    	if( $order['wb_pay_status'] == 2 ){//只有已支付才能退款,解冻
    		if( $this->model->isFinishPayStatus( $id,3 ) ) {$data2['wb_pay_status'] = 3;}//如果子订单全部都解冻了主订单也要解冻
    		$data3 = array( 
    				'a_u_balance'=>$user_info['a_u_balance'] + $total_a_settlement - $total_use_credit_part,//余额支付部分=订单总费用-总使用信用支付部分
    				'a_u_used_credit'=>$user_info['a_u_used_credit'] - $total_use_credit_part,//用户新的信用已使用额度
    				'a_u_weibo_frozen_money'=>$user_info['a_u_weibo_frozen_money'] - $total_a_settlement//用户新的冻结总金额
    		 );
    		$res3 = $this->model->updateUserData( $order['a_u_id'],$data3 );//更改广告主金额
    	}else{
    		$res3 = true;
    	}
    	
    	if( !empty( $data2 ) ){
	    	$res2 = $this->model->updateOrderData( $order['a_u_id'],$id,$data2 );//修改主订单总价
    	}else{
    		$res2 = true;
    	}
    	
    	$res6 = $this->model->changeOrderPrice( $id );//修改主订单总价
    	$res4 = $this->model->updateOrderStatus( $id,$this->orderType );//更改主订单状态
    	if( $order['wb_pay_status'] == 2 ){//只有已支付才能退款,解冻才记录流水
    		$res5 = $this->model->logFlow( $id, $order['a_u_id'], $total_a_settlement, 6, 4, "微博订单一键拒单，解冻子订单金额" );
    	}else{
    		$res5 = true;
    	}
    	
    	if ( $res !== false && $res2 !== false && $res3 !== false && $res4 !== false && $res5 !== false && $res6 !== false ) {
    		M()->commit();
    		
    		$ids = implode( ',', $subIdArr );
    		$advInfo = $this->model->getAdvUsersInfo( $order['a_u_id'] );//取出电话
    		$orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    		$advName = empty( $advInfo['a_u_name'] ) ? '' : $advInfo['a_u_name'];
    		notice_ae( $subOrder['wo_aeid'], "（微博{$orderType}）亲爱的AE，广告主{$advName}的主订单{$order['wb_id']}的子订单{$ids}已拒单，请登录米汇后台跟进，谢谢合作。", 1, 1, 0 );
    		
    		addLog( "微博一键拒单成功，res：{$res},res2：{$res2},res3：{$res3},res4：{$res4},res5：{$res5},res6：{$res6},id:{$id}" );
    		output_data( '操作成功!' );
    	}else{
    		M()->rollback();
    		addLog( "微博一键拒单失败，res：{$res},res2：{$res2},res3：{$res3},res4：{$res4},res5：{$res5},res6：{$res6},id:{$id}" );
    		output_data( '操作失败!',-1 );
    	}
    }
    
    /**
     * @desc 填写执行结果
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-09-21
     */
    public function execute() {
    	$this->model->checkRight();
    	$sub_id = ( int )get_var_post( 'sub_id' );
    	$wo_url = get_var_post( 'url' );
    	if ( empty( $sub_id ) ) {output_data( '参数不能为空！',-1 );}
    	if( empty( $wo_url ) ) {output_data( '链接不能留空！',-1 );}
    	
    	$subOrder = $this->model->getSubOrderDetail( $sub_id );//获取子订单
    	$order = $this->model->getOrderDetail( $subOrder['wb_id'] );//获取主订单
    	
    	if ( $subOrder['wo_status'] != 2 ) {output_data( '还未接单，不能操作！',-1 );}
    	if ( $order['wb_check_status'] < 2 ) {output_data( '订单未审核，不能操作！',-1 );}
    	if ( $order['wb_pay_status'] != 2 ) {output_data( '未支付不能操作！',-1 );}
    	
    	$user_session = session();
    	M()->startTrans();//开启事务
    	$data = array( 
    			'wo_complete_time' => time(),
    			'wo_url' => $wo_url,
    			'wo_status' => 6,
    			'wo_admin_uid'=>$user_session['manager']['id'],
    			'wo_admin_name'=>$user_session['manager']['name'],
    			'wo_finish_execute_time'=>time(),
    			'wo_admin_update_time'=>time()
    	 );
    	
    	$where['wo_id'] = $sub_id;
    	$res = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );
    	$res2 = $this->model->updateOrderStatus( $order['wb_id'],$this->orderType );//更新主订单状态
    	
    	if ( $res !== false && $res2 !== false ) {
    		M()->commit();
    		addLog( "填写执行结果成功，res：{$res},res2：{$res2},sub_id:{$sub_id}" );
    		
    		$weiboType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    		$user_info = $this->model->getAdvUsersInfo( $order['a_u_id'] );//广告主信息
    		//通知商务
    		if( $subOrder['wo_bdid'] ){
    			$content = "（微博{$weiboType}）亲爱的商务，广告主{$user_info['a_u_name']}的订单{$order['wb_id']}已完成，请登录米汇后台查看。";
    			notice_manager( $subOrder['wo_bdid'], $content );
    		}
    		//通知AE
    		$content = "（微博{$weiboType}）亲爱的AE，广告主{$user_info['a_u_name']}的订单{$order['wb_id']}已完成，请登录米汇后台查看。";
    		notice_ae( $subOrder['wo_aeid'], $content );
    		
    		output_data( '操作成功!' );
    	}else{
    		M()->rollback();
    		addLog( "填写执行结果失败，res：{$res},res2：{$res2},sub_id:{$sub_id}" );
    		output_data( '操作失败!',-1 );
    	}	
    }
    
    /**
     * @desc 投诉处理
     * @param id 主订单id
     * @author: mabin
     * @time: 2016-09-21
     */
    public function handlecomplaint() {
    	$this->model->checkRight();
    	$sub_id = ( int )get_var_post( 'sub_id' );
    	$wo_complaint_status = get_var_post( 'complaint_status' );
    	$wo_complaint_refuse_reason = get_var_post( 'complaint_refuse_reason' );
    	$wo_a_reduce_money = get_var_post( 'reduce_money' );
    	$wo_a_reduce_money = floatval( $wo_a_reduce_money );
    	if ( empty( $sub_id ) ) {output_data( '参数不能为空！',-1 );}
    	
    	$subOrder = $this->model->getSubOrderDetail( $sub_id );//获取子订单
    	$order = $this->model->getOrderDetail( $subOrder['wb_id'] );//获取主订单
    	$userInfo = $this->model->getAdvUsersInfo( $subOrder['a_u_id'] );//广告主信息
    	$wo_a_settlement = $subOrder['wo_a_settlement'];
    	
    	if ( $subOrder['wo_status'] != 7 ) {output_data( '该订单没有投诉或已经处理了，不需要进行投诉受理！',-1 );}
    	if ( $order['wb_check_status'] < 2 ) {output_data( '订单未审核，不能操作！',-1 );}
    	if ( $order['wb_pay_status'] != 2 ) {output_data( '订单未支付或已经完成并且解冻，不能操作！',-1 );}
    	if ( $wo_complaint_status==0 && empty( $wo_complaint_refuse_reason ) ) {output_data( '"是否受理投诉"选择"否"时"投诉驳回原因"不能为空!',-1 );}
    	if ( $wo_complaint_status==0 && $wo_a_reduce_money > 0 ) {output_data( '"是否受理投诉"选择"否"时"减免额度必须"为0！',-1 );}
    	if ( $wo_complaint_status==0 && $wo_a_reduce_money == 0 ) {output_data( '"是否受理投诉"选择"是"时"减免额度"必须大于0！',-1 );}
    	if ( $wo_complaint_status==1 && $wo_a_reduce_money > $wo_a_settlement ) {output_data( '"是否受理投诉"选择"是"时"减免额度"不能大于消费额'.$wo_a_settlement,-1 );}
    	
    	if ( $wo_complaint_status != 1 ) {//投诉驳回
    		$data['wo_status'] = 9;
    		$data['wo_complaint_refuse_reason'] = $wo_complaint_refuse_reason;
    		 
    		M()->startTrans();//开启事务
    		$where['wo_id'] = $sub_id;
    		$res = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );
    		$res2 = $this->model->updateOrderStatus( $subOrder['wb_id'],$this->orderType );//3、更新主订单状态
    		 
    		if ( $res !== false && $res2 !== false ) {
    			M()->commit();
    			addLog( "微博投诉处理驳回操作成功，res：{$res},wo_id:$sub_id" );
    			output_data( '操作成功!' );
    		}else{
    			M()->rollback();
    			addLog( "微博投诉处理驳回操作失败，res：{$res},wo_id:$sub_id" );
    			output_data( '操作失败,请重试!',-1 );
    		}
    	} else {//投诉成功，减免金额
    		if( $wo_a_reduce_money > $wo_a_settlement ) {output_data( '减免额度不能大于广告主结算金额!',-1 );	}
    		$fee_rate = 1+C( 'WEIBO_FEE_RATE' );
    		$tmp_money = ceil(  $wo_a_reduce_money / $fee_rate  );
    		$wo_m_reduce_money =  $tmp_money >= $wo_a_settlement ? $wo_a_settlement :  $tmp_money ;
    		 
    		$data['wo_status'] = 8;
    		if( $wo_a_reduce_money == $wo_a_settlement ) $data['wo_pay_status'] = 3;//结算的钱全部减免才解冻
    		$data['wo_a_reduce_money'] = $wo_a_reduce_money;
    		$data['wo_m_reduce_money'] = $wo_m_reduce_money;
    		$data['wo_complaint_refuse_reason'] = $wo_complaint_refuse_reason;
    		$data['wo_a_settlement'] = $subOrder['wo_a_settlement']-$wo_a_reduce_money;//更新广告主结算价格
    		$data['wo_m_settlement'] = $subOrder['wo_m_settlement']-$wo_m_reduce_money>0?$subOrder['wo_m_settlement']-$wo_m_reduce_money:0;//更新自媒体结算价格
    		 
    		M()->startTrans();//开启事务
    		
    		$where['wo_id'] = $sub_id;
    		$res = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );
    		if( $subOrder['wo_use_credit_part'] > 0 ){//如果有使用信用额度
    			if( $subOrder['wo_use_credit_part'] >= $wo_a_reduce_money ){//如果信用额度大于减免金额
    				$data2['wo_use_credit_part'] = $subOrder['wo_use_credit_part'] - $wo_a_reduce_money;
    				$return_balance = 0;//返回到用户余额字段里面的钱
    				$credit = $wo_a_reduce_money;//减少的信用额度
    			}else{
    				$data2['wo_use_credit_part'] = 0;
    				$credit = $subOrder['wo_use_credit_part'];//减少的信用额度
    				$return_balance = $wo_a_reduce_money-$subOrder['wo_use_credit_part'];
    				$wo_a_settlement = $subOrder['wo_a_settlement']-$credit;//更新子订单使用额度=原来使用的额度-( 减免金额-已使用信用 )
    			}
	    		$where['wo_id'] = $sub_id;
	    		$res2 = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );//2、更新子订单使用信用额度
    		}else{
    			$credit = 0;//减少的信用额度
    			$return_balance = $wo_a_reduce_money;
    			$res2 = true;
    		}
    		 
    		$orderData = array( 'wb_settlement_price'=>$order['wb_settlement_price']-$wo_a_reduce_money );
    		if( $this->model->isFinishPayStatus( $order['wb_id'],3 ) ) $orderData['wb_pay_status'] = 3;//所有子订单都解冻就更新主订单解冻
    		$res3 = $this->model->updateOrderData( $userInfo['a_u_id'],$order['wb_id'],$orderData );//3、更新主订单
    		 
    		$userData['a_u_used_credit'] = $userInfo['a_u_used_credit']-$credit;
    		$userData['a_u_balance'] = $userInfo['a_u_balance']+$return_balance;
    		$userData['a_u_weibo_frozen_money'] = $userInfo['a_u_weibo_frozen_money']-$wo_a_reduce_money;
    		$res4 = $this->model->updateUserData( $userInfo['a_u_id'],$userData );//4、更新广告主的相关金额
    		$res5 = $this->model->updateOrderStatus( $order['wb_id'],$this->orderType );//5、更新主订单状态
    		 
    		$remark = "微博投诉成功，减免金额";
    		$res6 = $this->model->logFlow( $order['wb_id'], $order['a_u_id'], $wo_a_reduce_money, 6, 2, $remark );
    		 
    		if ( $res !== false && $res2 !== false && $res3 !== false && $res4 !== false && $res5 !== false && $res6 !== false ) {
    			M()->commit();
    			addLog( "投诉处理操作成功，res：{$res},res2：{$res2},res3：{$res3},res4：{$res4},res5：{$res5},res6：{$res6},sub_id:{$sub_id}" );
    			output_data( '操作成功!' );
    		}else{
    			M()->rollback();
    			addLog( "投诉处理操作失败，res：{$res},res2：{$res2},res3：{$res3},res4：{$res4},res5：{$res5},res6：{$res6},sub_id:{$sub_id}" );
    			output_data( '操作失败!',-1 );
    		}
    	}
    }
    
    /**
     * 取消订单
     * @access public
     * @return void
     */
    public function cancel(){
    	$this->model->checkRight();
    	$sub_id = ( int )get_var_post( 'sub_id' ); // 子订单ID
    	if ( empty( $sub_id ) ) {output_data( '缺少参数!',-1 );}
    	$subOrder = $this->model->getSubOrderDetail( $sub_id );//获取子订单
    	if ( empty( $subOrder ) ) {
    		output_data( '子订单不存在!',-1 );
    	}
    	if ( $subOrder['wo_pay_status'] != 1 ) {
    		output_data( '只有未支付的订单才可以取消!',-1 );
    	}
    	if ( $subOrder['wo_status'] == 5 ) {
    		output_data( '已取消，请不要重复取消!',-1 );
    	}
    	
    	// 事务
    	M()->startTrans();
    	$user_session = session();
    	$data = array( 
    			'wo_a_settlement' => 0,// 广告主结算金额和自媒体结算金额变成0
    			'wo_m_settlement' => 0,// 广告主结算金额和自媒体结算金额变成0
    			'wo_status'            => 5,//已取消
    			'wo_admin_uid'=>$user_session['manager']['id'],
    			'wo_admin_name'=>$user_session['manager']['name'],
    			'wo_admin_update_time' => time()
    	 );
    	$res = $this->model->toTable( 'weibo_sub_order' )->where( array( 'wo_id' => $sub_id ) )->data( $data )->save();
    	$res2 = $this->model->changeOrderPrice( $subOrder['wb_id'] );//更改主订单总价
    	
    	if ( $res !== false && $res2 !== false ) {
    		M()->commit();
    		addLog( "微博订单取消成功，wo_id:$sub_id" );

    		$order = $this->model->getOrderDetail( $subOrder['wb_id'] );//获取主订单
    		$advInfo = D( 'Weibo' )->getAdvUsersInfo( $subOrder['a_u_id'] );//广告主信息
    		$orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    		$advName = empty( $advInfo['a_u_name'] ) ? '' : $advInfo['a_u_name'];
    		notice_extend_med( $subOrder['wo_medid'], "（微博{$orderType}）亲爱的媒介执行，广告主{$advName}的主订单{$subOrder['wb_id']}的子订单{$sub_id}已取消，请登录米汇后台跟进，谢谢合作。", 0 );
    		
    		output_data( '操作成功!' );
    	}else{
    		M()->rollback();
    		addLog( "微博订单取消失败，wo_id:$sub_id" );
    		output_data( '操作失败,请重试!',-1 );
    	}	
    }

    /**
     * 添加账号
     * @access public 
     * @return void
     */
    public function add_account(){
        $this->model->checkRight(); 
        if ( !IS_POST ) {
            $this->display( 'add_account' );
        } else {
            $this->change_account();
        }
    }

    /**
     * 更改主订单对应的微博号
     * 1、取出所有子订单
     * 2、筛选出更新后的自订单
     *      新的微博id不在原来微博id里面就要添加
     * 3、更新主订单的总金额
     * http://newadminmh.weiyingxiao.dev/WeiboOrder/add_account?id=82&uid=1717414360,3204221992
     */
    public function change_account(){
        $id = get_var_post( 'id' ); // 主订单id
        $uid = get_var_post( 'uid' ); // 微博UID
       
        if( empty( $id ) ) {output_data( '参数错误!',-1 );}
        if( empty( $uid ) ) {output_data( '请填写UID!',-1 );}
    	$order = $this->model->getOrderDetail( $id );//获取主订单
        if( empty( $order ) ) {output_data( '订单不存在!',-1 );}
        if( $order['wb_pay_status'] != 1 ) {output_data( '未支付的才能添加帐号!',-1 );}
        $uid = trim( $uid );
        $arr_weibo_uid = explode( ',', $uid );
        $map['aw_weibo_uid'] = array( 'in',$arr_weibo_uid );
        $data = $this->model->toTable( 'account_weibo' )->field( array( 'aw_id','aw_weibo_uid' ) )->where( $map )->index( 'aw_weibo_uid' )->select();
       
        // 判断UID是否存在
        $error_content = '';
        if( empty( $data ) ){
             	$error_content .= '所填写的UID都不存在！,';
        }else{
        	foreach ( $arr_weibo_uid as $k=>$v ){
        		if( !$data[$v] ){
             		$error_content .= "所填写的UID {$v} 不存在！,";
        		}
        	}
        }

        if ( !empty( $error_content ) ) {
        	output_data( trim( $error_content, ',' ),-1 );
        }

        $subOrderArr = $this->model->getSubOrder( $id );//取出所有子订单
        $arr_aw_weibo_uid = array_column( $subOrderArr, 'aw_weibo_uid' );
       
        $error_str = '';
        $medids = array();
        foreach ( $arr_weibo_uid as $value ) {
        	$data = $this->model->toTable( 'account_weibo' )->field( 'aw_id,aw_medid' )->where( array( 'aw_weibo_uid' => $value ) )->find();
        	if ( empty( $data ) ) {
        		$error_str .= '微博UID ' . $value . ' 不存在！,';
        	}else{
        		$medids[] = $data['aw_medid'];
        	}
        }
        
        if ( !empty( $error_str ) ) {
        	output_data( trim( $error_str, ',' ),-1 );
        }

        M()->startTrans(); //开启事务
        // 根据UID得到aw_id
        $arr_aw_id = $this->model->toTable( 'account_weibo' )->field( 'aw_id' )->where( array( 'aw_weibo_uid' => array( 'in', $arr_weibo_uid ) ) )->select();
        $new_arr_aw_id = array_column( $arr_aw_id, 'aw_id' );
        
        $res = $this->model->addSubOrder( $new_arr_aw_id,$order );// 添加子订单
        $res2 = $this->model->changeOrderPrice( $id );//更改主订单总价
        $res3 = $this->model->updateOrderStatus( $id,$this->orderType );//更改主订单状态
        
        if( $res !== false && $res2 !== false && $res2 !== false ){
            M()->commit();
            addLog( "后台添加子订单成功,id:{$id},res:{$res},res2:{$res2},res3:{$res3},uid:{$uid}" );
            
            if( $order['wb_check_status'] != 1 ){//未审核才发邮件
	            $advInfo = $this->model->getAdvUsersInfo( $order['a_u_id'] );//取出电话
	            $advName = empty( $advInfo['a_u_name'] ) ? '' : $advInfo['a_u_name'];
	            $orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
	            $advName = empty( $advInfo['a_u_name'] ) ? '' : $advInfo['a_u_name'];
	            notice_extend_med( $medids, "（微博{$orderType}）亲爱的媒介执行，广告主{$advName}的主订单{$id}有新增子订单，请尽快登录跟进订单，以免超过执行时间造成流单，谢谢合作。", 0 );
            }
            
            $count = count( $arr_weibo_uid );
            output_data( '成功添加' . $count . '个子订单' );
        }else{
            M()->rollback();
            addLog( "后台添加子订单失败,id:{$id},res:{$res},res2:{$res2},res3:{$res3},uid:{$uid}" );
            output_data( '添加失败！',-1 );
        }
    }

    /**
     * ajax上传图片
     * @access public 
     * @return void
     */
    public function ajax_upload_image(){
        if( !isset( $_FILES['image'] ) || !IS_AJAX ){
            output_data( '参数错误',-1 );
        }
        $id = get_var_post( 'id' );
        if( empty( $id ) ) {output_data( '参数错误!',-1 );}
        $order = $this->model->getOrderDetail( $id );//获取主订单
        
        $arr_rs = explode( ',', $order['wb_send_img'] );
        if ( count( $arr_rs ) >=9  ) {// 超出九个提示失败
            output_data( '最多上传九张',-1 );
        }

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     2048000;// 设置附件上传大小
        $upload->exts      =     array( 'jpg', 'gif', 'png', 'jpeg' );// 设置附件上传类型
        $upload->rootPath  =     C( 'IMG_REAL_PATH' );//'uploads/img/'; // 设置附件上传根目录
        //$upload->savePath  =     'images/';
        $upload->subName   =     array( 'date', 'Ymd' );
        // 上传单个文件
        $info   =   $upload->uploadOne( $_FILES['image'] );
        if( !$info ) {// 上传错误提示错误信息
            output_data( $upload->getError(),-1 );
        }else{// 上传成功 获取上传文件信息
            $path=$info['savepath'].$info['savename'];
            $bigname='150_150_'.$info['savename'];
            $smallname='90_90_'.$info['savename'];
            $url=C( 'IMG_HTTP_DOMAIN' ).$info['savepath'].$bigname;
            $image = new \Think\Image();
            $image->open( C( 'IMG_REAL_PATH' ).$path );
            $image->thumb( 150, 150 )->save( C( 'IMG_REAL_PATH' ).$info['savepath'].$bigname );
            $image->thumb( 90, 90 )->save( C( 'IMG_REAL_PATH' ).$info['savepath'].$smallname );

            // 存入genuine_history
            $data = array( 
                'a_u_id'         => $order['a_u_id'], // a_u_id是广告主id
                'gh_path'        => $path,
                'gh_file_md5'    => $info['md5'],
                'gh_create_time' => time()
             );
            $return_id = $this->model->toTable( 'genuine_history' )->data( $data )->add();
            
            if ( $return_id ) {
                $arr = $this->model->toTable( 'weibo_order' )->field( 'wb_send_img' )->where( array( 'wb_id' => $id ) )->find();

                $map['wb_send_img'] = trim( $arr['wb_send_img']. ',' . $return_id, ',' );

                $res = $this->model->toTable( 'weibo_order' )->where( array( 'wb_id' => $id ) )->data( $map )->save();
                if ( $res ) {
                	
                	$subOrder = $this->model->toTable( 'weibo_sub_order' )->field( 'wo_medid' )->where( array( 'wo_status'=>array( 'in', '1,2' ), 'wb_id'=>$id ) )->select();
                	$medids = array();
                	foreach ( $subOrder as $v ){
                		$medids[] = $v['wo_medid'];
                	}
                	$orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
                	notice_extend_med( $medids, "（微博{$orderType}）亲爱的媒介执行，主订单{$id}的发送内容已修改，请尽快登录后台查看，跟进订单。",0 );
                	
                	$tmpArr['img_id'] = $return_id;
                	output_data( $tmpArr,1,$url );
                }
            }
            output_data( '添加失败',-1 );
        }
    }

    /**
     * ajax删除图片
     * @access public 
     * @return void
     */
    public function delete_img(){
        $id = get_var_post( 'id' );
        $gh_id = get_var_post( 'gh_id' );
        $result = $this->model->toTable( 'weibo_order' )->field( 'wb_send_img, wb_pay_status, wb_order_type' )->where( array( 'wb_id' => $id ) )->find();
        if ( $result ) {
        	if ( $result['wb_pay_status'] != 1 ) {
       		 	output_data( '支付后不可删除!',-1 );
        	}
        	
            $wb_send_img = $result['wb_send_img'];
            $arr_img = explode( ',', $wb_send_img );
            $arr = array();
            // 删除对应的gh_id
            foreach ( $arr_img as &$value ) {
                if ( $value != $gh_id ) {
                    $arr[] = $value;
                }
            }
            $data['wb_send_img'] = implode( ',', $arr );
            $res = $this->model->toTable( 'weibo_order' )->where( array( 'wb_id' => $id ) )->data( $data )->save();
            if ( $res !== false ) {
            	
            	$subOrder = $this->model->toTable( 'weibo_sub_order' )->field( 'wo_medid' )->where( array( 'wo_status'=>array( 'in', '1,2' ), 'wb_id'=>$id ) )->select();
            	$medids = array();
            	foreach ( $subOrder as $v ){
            		$medids[] = $v['wo_medid'];
            	}
            	$orderType = $result['wb_order_type'] == 1 ? '直推' : '预约';
            	notice_extend_med( $medids, "（微博{$orderType}）亲爱的媒介执行，主订单{$id}的发送内容已修改，请尽快登录后台查看，跟进订单。",0 );
            	
        		output_data( '删除成功!' );
            }
        }
        output_data( '删除失败!',-1 );
    }
    
    /**
     * 一键下载图片
     * @access public
     * @return void
     */
    public function downloadFile(){
    	$gh_id = get_var_get( 'id' );
    	$result = $this->model->toTable( 'genuine_history' )->field( 'gh_path' )->where( array( 'gh_id' => $gh_id ) )->find();
    	$filename = realpath( C( 'IMG_REAL_PATH' ).$result['gh_path'] );
    
    	$file = substr( $result['gh_path'], strpos( $result['gh_path'], '/' )+1, 13 ).'-'.date( 'YmdHis' );
    	$ext = substr( $result['gh_path'], strpos( $result['gh_path'], '.' )+1 );
    	
    	Header(  "Content-type:  application/octet-stream " );
    	Header(  "Accept-Ranges:  bytes " );
    	Header(  "Accept-Length: " .filesize( $filename ) );
    	Header(  "Content-Disposition:  attachment;  filename= {$file}.{$ext}" );
    	readfile( $filename );
    	exit();
    }

    /**
     * 微博直推一键接单
     * @access public
     * @return void
     */
    public function batch_jiedan(){
    	$id = ( int )get_var_post( 'id' ); // 主订单id
    	if ( empty( $id ) ) {
   			output_data( '参数错误！',-1 );
    	}
    	// 主订单信息
    	$order = $this->model->toTable( 'weibo_order' )->field( 'wb_check_status, wb_pay_status, wb_order_type' )->where( array( 'wb_id' => $id ) )->find();
    	// 主订单需通过审核
    	if ( $lo_result['wb_check_status'] != 2 ) {
   			output_data( '只有已审核通过的订单才可以接单！',-1 );
    	}
    	
    	// 找出主订单下没有接单的子订单
    	$sub_order_res = $this->model->toTable( 'weibo_sub_order' )->field( 'wo_id, wo_a_settlement, wo_m_settlement' )->where( array( 'wb_id' => $id, 'wo_status' => 1 ) )->select();
    	
    	if ( empty( $sub_order_res ) ) {
   			output_data( '没有未接单的子订单！',-1 );
    	}
    	
    	// 根据微博订单类型来定判断条件
    	if ( $order['wb_order_type'] == 1 ) {
    		if ( $order['wb_pay_status'] != 2 ) {
    			output_data( '订单必须先支付才能接单！',-1 );
    		}
    	} else {
    		// 微博预约订单需为子订单结算金额（广）和结算金额（自）有值
    		$err_str = '';
    		foreach ( $sub_order_res as $v ) {
    			if( empty( ( float )$v['wo_a_settlement'] ) || empty( ( float )$v['wo_m_settlement'] ) ) {
    				$err_str .= $v['wo_id'] . ',';
    			}
    		}
    		if ( !empty( $err_str ) ) {
    			output_data( '请先填写子订单ID为 ' . trim( $err_str, ',' ) . ' 的广告主和自媒体的结算金额！',-1 );
    		}
    	}
    	// 更改子订单的状态
    	$user_session = session();
    	$data = array( 
    			'wo_status'            => 2,
    			'wo_admin_uid'=>$user_session['manager']['id'],
    			'wo_admin_name'=>$user_session['manager']['name'],
    			'wo_admin_update_time' => time(),
    	 );

    	M()->startTrans();
    	$save_rs = $this->model->toTable( 'weibo_sub_order' )->where( array( 'wo_id' => array( 'in', array_column( $sub_order_res, 'wo_id' ) ) ) )->data( $data )->save();
    	$order_rs = $this->model->updateOrderStatus( $id,$this->orderType );//更改主订单状态
    	
    	if ( $save_rs !== false && $order_rs !== false ) {
    		M()->commit();
    		addLog( "微博订单一键接单成功，res：$save_rs,res2：$order_rs,id:{$id}" );

    		$advInfo = $this->model->getAdvUsersInfo( $order['a_u_id'] );//取出电话
    		$advName = empty( $advInfo['a_u_name'] ) ? '' : $advInfo['a_u_name'];
    		$orderType = $order['wb_order_type'] == 1 ? '直推' : '预约';
    		$ids = trim( $err_str, ',' );
    		notice_ae( $subOrder['wo_aeid'] , "（微博{$orderType}）亲爱的AE，广告主{$advName}的主订单{$id}号的子订单{$ids}已接单，请登录米汇后台跟进，谢谢合作。" );
    		
    		output_data( '一键接单成功！' );
    	} else {
    		M()->rollback();
    		addLog( "微博订单一键接单失败，res：$save_rs,res2：$order_rs,id:{$id}" );
    		output_data( '一键接单失败！',-1 );
    	}
    }

    /**
     * 更改直营自营
     * @param id 主订单id
     * @return void
     */
    public function change_tax() {
    	$this->model->checkRight();
    	$id = ( int )get_var_post( 'id' );
    	$tax_type = ( int )get_var_post( 'tax_type' );
    	if ( empty( $id ) ) {output_data( '参数不能为空！',-1 );}
    	if( !in_array( $tax_type, array( 1,2 ) ) ){output_data( '参数类型不正确！',-1 );}
    
    	$where['wb_id'] = $id;
    	$data['wb_tax_type'] = $tax_type;
    	$res = $this->model->toTable( 'weibo_order' )->where( $where )->save( $data );
    
    	if ( $res !== false ) {
    		addLog( "更改直营自营成功，res：{$res},id:{$id}" );
    		output_data( '操作成功！' );
    	}else{
    		addLog( "更改直营自营失败，res：{$res},id:{$id}" );
    		output_data( '操作失败！',-1 );
    	}
    }
    
    /**
     * 更改接单和拒单备注
     * @param sub_id 子订单id
     * @param type 1-接单备注 2-拒单备注
     * @param remark 修改后的内容
     * @return void
     */
    public function edit_remark() {
    	$this->model->checkRight();
    	$sub_id = ( int )get_var_post( 'sub_id' );
    	$type = ( int )get_var_post( 'type' );
    	$remark = get_var_post( 'remark' );
    	if ( empty( $sub_id ) ) {output_data( '参数不能为空！',-1 );}
		if( !in_array( $type, array( 1,2 ) ) ){output_data( '参数类型不正确！',-1 );}
		if( $type == 1 ){
			$field = 'wo_remark';
		}else{
			$field = 'wo_decline_info';
		}
		$where['wo_id'] = $sub_id;
		$data[$field] = $remark;
		$res = $this->model->toTable( 'weibo_sub_order' )->where( $where )->save( $data );
    	if ( $res !== false ) {
    		addLog( "更改备注成功，res：{$res},sub_id:{$sub_id},field:{$field}" );
    		output_data( '操作成功！' );
    	}else{
    		addLog( "更改备注失败，res：{$res},sub_id:{$sub_id},field:{$field}" );
    		output_data( '操作失败！',-1 );
    	}
    }

    /**
     * 更改订单对应的合同
     * @param id 主订单id
     * @return void
     */
    public function change_contract() {
    	$this->model->checkRight();
    	$id = ( int )get_var_post( 'id' );
    	$apply_no = get_var_post( 'apply_no' );
    	if ( empty( $id ) ) {output_data( '参数不能为空！',-1 );}
    
    	$where['wb_id'] = $id;
    	$data['wb_apply_no'] = $apply_no;
    	$res = $this->model->toTable( 'weibo_order' )->where( $where )->save( $data );
    
    	if ( $res !== false ) {
    		addLog( "更改订单合同成功，res：{$res},id:{$id}" );
    		output_data( '操作成功！' );
    	}else{
    		addLog( "更改订单合同失败，res：{$res},id:{$id}" );
    		output_data( '操作失败！',-1 );
    	}
    }
}
