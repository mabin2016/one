<?php
namespace Adminmh\Model;
use Think\Model;
/**
 * Weibo模型
 * @author mabin
 * @createdate 2016-09-19
 */
class WeiboOrderModel extends CommonModel {
	protected $tableName = 'weibo_order';
	
	/**
	 * 微博订单列表
	 * @return array
	 */
	public function getList( $map = array() ) {
		$return = array( 'total'=>0, 'data'=>array() );
		$totalRecord = $this->toTable( 'weibo_order' )->alias( "a" )
									     ->join( "left join wyx_weibo_sub_order b on a.wb_id=b.wb_id" )
										 ->where( $map )
										 ->count( "DISTINCT a.wb_id" );
		$return['total'] = $totalRecord;
		$limit = $this->get_limit( 3 );
		$field = array( 
				"distinct a.wb_id",
				"a.a_u_id",
				"a.wb_aeid",
				"a.wb_bdid",
				"a.wb_extension_name",
				"a.wb_create_time",
				"a.wb_execute_time",
				"a.wb_status",
				"a.wb_check_status",
				"a.wb_pay_status",
				"a.wb_pay_status",
				"a.wb_order_type",
				"a.wb_tax_type",
				"a.wb_total_price",
				"a.wb_settlement_price",
				"a.wb_income_remark",//定金收入
				"a.wb_expenditure_remark",//定金支出
				"a.wb_apply_no",//合同编号
				"sum( b.wo_m_settlement ) as wb_m_settlement",
				"b.wo_medid as medid"
		 );
		$data = $this->toTable( 'weibo_order' )->field( $field )
									    ->alias( "a" )
									    ->join( "left join wyx_weibo_sub_order b on a.wb_id=b.wb_id" )
									    ->where( $map )
									    ->group( "a.wb_id" )
									    ->limit( $limit )
									    ->order( "a.wb_id desc" )
									    ->select();

	    if ( !empty( $data ) ) {
	    	$idArr = array();
	    	foreach ( $data as $k => $v ) {$idArr[] = $v['wb_id'];}
	    	$ids = implode( ",", $idArr );
			$map2['wb_id'] = array( 'in',$ids );
		    $subOrders = $this->toTable( 'weibo_sub_order' )->field( 'wb_id,wo_status,wo_pay_status' )->where( $map2 )->select();
		    $userInfo = $this->toTable( 'adv_users' )->field( 'a_u_id, a_u_name' )->where( array( 'a_u_id' => array( 'in', array_column( $data, 'a_u_id' ) ) ) )->index( 'a_u_id' )->select();
		    $aeArr = $this->getAllAES();
		    $bdArr = $this->getAllBDS();
		    $contractArr = $this->getContract( array_column( $data, 'a_u_id' ) );//取出订单用户id对应的合同编号名称列表
		    
			foreach ( $data as $k => $v ) {
				$id = $v['wb_id'];
				$data[$k]['a_u_name'] = $userInfo[$v['a_u_id']]['a_u_name'];
				$data[$k]['wb_create_time'] = date( 'Y-m-d H:i:s',$v['wb_create_time'] );
				$data[$k]['wb_execute_time'] = date( 'Y-m-d H:i:s',$v['wb_execute_time'] );
				if( array_key_exists( $id, $aeArr ) ){
					$data[$k]['ae_name'] = $aeArr[$id]['name'];
				}else{
					$data[$k]['ae_name'] = '待分配';
				}
				if( array_key_exists( $id, $bdArr ) ){
					$data[$k]['bd_name'] = $bdArr[$id]['name'];
				}else{
					$data[$k]['bd_name'] = '待分配';
				}
    			$data[$k]['status_name'] = $this->get_status_name( $v['wb_status'],$v['wb_order_type'] );//订单状态
    			$data[$k]['check_status_name'] = $this->get_check_status_name( $v['wb_check_status'] );//审核状态
    			$data[$k]['pay_status_name'] = $this->get_pay_status_name( $v['wb_pay_status'] );//支付状态
				
				$sub_order_status = $this->get_relative_status( $v['wb_status'] );//获取子订单状态值
				$sub_order_num = $count1 = $count2 = $sub_order_total_num = 0;
				foreach( $subOrders as $k2=>$v2 ){//已预约/拒单/已取消 全部在这几个状态的才可以支付
					if( $v['wb_id'] == $v2['wb_id'] ){
						$sub_order_total_num++;
						if( is_string( $sub_order_status ) && $v2['wo_status'] == $sub_order_status ){
							$sub_order_num++;
						}else if( is_array( $sub_order_status ) && in_array( $v2['wo_status'], $sub_order_status ) ){
							$sub_order_num++;
						}
						if( $v2['wo_status'] == 1 ){
							$count1++;//未接单( 待接单/待预约 )
						}
						if( $v2['wo_status'] == 2 ){
							$count2++;//接单( 已接单/已预约 )
						}
					}
				}
				if( $count1 == 0 && $count2 > 0 && $v2['wo_pay_status'] == 1 ) {
					$data[$k]['pay_btn'] = 1;
				}else{
					$data[$k]['pay_btn'] = 0;
				}
				$data[$k]['num_show'] = $sub_order_num.'/'.$sub_order_total_num;
				$data[$k]['sub_order_num'] = $sub_order_total_num;
				$data[$k]['apply_name'] = array_key_exists( $v['wb_apply_no'], $contractArr ) ? $contractArr[$v['wb_apply_no']]['apply_name'] : '暂无';
			}
		}
		$return['data'] = $data;
		return $return;
	}
	
	/**
	 * @desc 取出子订单状态数量
	 * @param array $data	订单数据
	 * @return array
	 * @author: mabin
	 * @time: 2016-09-07
	 */
	function get_status_cnt( $data ){
		if( empty( $data ) ) {return $data;}
		foreach ( $data as $k=>$v ){
			if( in_array( $v['lo_status'], array( 1,4 ) ) ) {
				$status = '1';
			}else if( in_array( $v['lo_status'], array( 2 ) ) ){
				$status = '5';
			}else if( in_array( $v['lo_status'], array( 3,7 ) ) ){
				$status = '2';
			}else if( $v['lo_status'] == 5 ){
				$status = '6';
			}else if( $v['lo_status'] == 6 ){
				$status = '4';
			}else if( $v['lo_status'] == 8 ){
				$status = '3';
			}else if( $v['lo_status'] == 9 ){
				$status = '7';
			}else if( $v['lo_status'] == 10 ){
				$status = array( 8,9 );
			}else{
				$status = array();
			}
			$where['lo_id'] = $v['lo_id'];
			$subOrders = M()->table( 'wyx_live_sub_order' )->field( 'lso_status' )->where( $where )->select();
				
			$count = $count1 = $count2 = 0;
			foreach( $subOrders as $sk=>$sv ){//已预约/拒单/已取消 全部在这几个状态的才可以支付
				if( is_string( $status ) && $sv['lso_status'] == $status ){
					$count++;
				}else if( is_array( $status ) && in_array( $sv['lso_status'], $status ) ){
					$count++;
				}
				if(  $sv['lso_status'] == 1 ){
					$count1++;//未接单( 待接单/待预约 )
				}
				if( $sv['lso_status'] == 2 ){
					$count2++;//接单( 已接单/已预约 )
				}
			}
			if( $count1 == 0 && $count2 > 0 && $v['lo_pay_status'] == 1 ) {
				$data[$k]['pay_btn'] = 1;
			}else{
				$data[$k]['pay_btn'] = 0;
			}
			$data[$k]['cnt'] = $count;
		}
		return $data;
	}
	
	/**
	 * 获取主订单
	 * @param int $id
	 */
	public function getOrder( $id,$map = array() ) {
		if( empty( $id ) ){return array();}
		$map['wb_id'] = $id;
		$res = $this->toTable( 'weibo_order' )->where( $map )->find();
		$wb_genuine = $res['wb_send_img'];
		$wb_genuine2 = $res['wb_prove_img'];
		$imgStr = $imgStr2 = '';
		if ( !empty( $wb_genuine ) ) {
			$map2['gh_id'] = array( 'in',$wb_genuine );
			$genuineImg = $this->toTable( 'genuine_history' )->field( array( 'gh_id, gh_path' ) )->where( $map2 )->select();
		}else{
			$genuineImg = '';
		}
	
		if ( !empty( $wb_genuine2 ) ) {
			$map3['gh_id'] = array( 'in',$wb_genuine2 );
			$genuineImg2 = $this->toTable( 'genuine_history' )->field( 'gh_path' )->where( $map3 )->select();
		}else{
			$genuineImg2 = '';
		}
	
		if( !empty( $genuineImg ) ){
			$img = array();
			foreach ( $genuineImg as &$v ){
				$v['gh_path'] = C( 'IMG_HTTP_DOMAIN' ).$v['gh_path'];
			}
		}
	
		if( !empty( $genuineImg2 ) ){
			$img = array();
			foreach ( $genuineImg2 as $k=>$v ){
				$a = C( 'IMG_HTTP_DOMAIN' ).$v['gh_path'];
				$img[] = "<img src=".$a." style='width:46px;height:46px;' />";
			}
			$imgStr2 = implode( ",", $img );
		}
		$user = $this->getAdvUsersInfo( $res['a_u_id'] );//获取用户名称
		$res['ad_name'] = $user['a_u_name'];
		$res['sendImg'] = $genuineImg;
		$res['proveImg'] = $imgStr2;
		unset( $res['is_normal'] );
		unset( $res['wb_complete_time'] );
		unset( $res['wb_update_time'] );
		return $res;
	}

	/**
	 *  获取多个子订单
	 */
	public function getSubOrder( $id ) {
		$field = array( 
				'a.wo_id',
				'a.m_u_id',
				'a.wo_medid',
				'a.wo_a_price',
				'a.wo_a_settlement',
				'a.wo_a_reduce_money',
				'a.wo_m_price',
				'a.wo_m_settlement',
				'a.wo_m_reduce_money',
				'a.wo_status',
				'a.wo_pay_status',
				'a.wo_is_postpay',
				'a.wo_remark',
				'a.wo_decline_info',
				'a.wo_complaint_type',
				'a.wo_complaint_desc',
				'a.wo_complaint_refuse_reason',
				'a.wo_map_id',
				'b.aw_weibo_name',
				'b.aw_weibo_url',
				'b.aw_contact_qq',
				'b.aw_followers_count',
				'b.aw_weibo_uid',
				'b.aw_face_url',
				'c.m_u_name',
				'd.wb_check_status',
				'd.wb_status',
				'd.wb_pay_status',
// 				'e.name as aw_med_name'
		 );
		$where['a.wb_id'] = $id;
		$order = $this->toTable( 'weibo_sub_order' )
						->field( $field )
						->alias( "a" )
						->join( "left join wyx_account_weibo b on a.aw_id=b.aw_id" )
						->join( "left join wyx_media_users c on b.m_u_id=c.m_u_id" )
						->join( "left join wyx_weibo_order d on a.wb_id=d.wb_id" )
// 						->join( "left join wyx_manager e on e.id=b.aw_medid" )
						->where( $where )
						->group( "a.wo_id desc" )
						->select();
		return $order;
	}
	
	 /**
	 * @desc 获取主订单详情
	 * @param int $id 主订单id
	 * @return array
	 * @author: mabin
	 * @time: 2016-06-16
	 */
	function getOrderDetail( $id,$field = array( "*" ) ){
		$map['wb_id'] = $id;
		$res = $this->toTable( 'weibo_order' )->field( $field )->where( $map )->find();
		return $res;
	}
	
	/**
	 * @desc 获取子订单详情
	 * @param int $sub_id 子订单id
	 * @return array
	 * @author: mabin
	 * @time: 2016-06-16
	 */
	function getSubOrderDetail( $sub_id,$field = array( "*" ) ){
		$map['wo_id'] = $sub_id;
		$res = $this->toTable( 'weibo_sub_order' )->field( $field )->where( $map )->find();
		if( $res['wo_complaint_type'] ){$res['ct_desc'] = $this->getComplaintType( $res['wo_complaint_type'] );}
		return $res;
	}

	/**
	 * @desc 取出符合条件可以拒单的单
	 * @param int $id 主订单id
	 * @return array
	 * @author: mabin
	 * @time: 2016-06-16
	 */
	function getSubOrderJudan( $id ){
		$field = array( 'wo_id','wo_a_price','wo_a_settlement','wo_a_settlement','wo_use_credit_part' );
		$map['wb_id'] = $id;
		$map['wo_pay_status'] = array( 'neq',4 );//支付完成的订单不能拒单！
		$map['wo_status'] = array( 'not in',array( '3','4','5' ) );//状态是拒单、取消、流单的不能操作
		$res = $this->toTable( 'weibo_sub_order' )->field( $field )->where( $map )->select();
		return $res;
	}

	/**
	 * @desc 更新主订单结算总价
	 * @param int $id 主订单id
	 * @return boolean
	 * @author: mabin
	 * @time: 2016-06-16
	 */
	function changeOrderPrice( $id ){
		$where['wb_id'] = $id;
		$where['wo_status'] = array( 'neq',5 );//取消的不计算
		$arr = $this->toTable( 'weibo_sub_order' )->field( array( "sum( wo_a_price ) as total_price","sum( wo_a_settlement ) as settlement_price" ) )->where( $where )->find();
		$data['wb_total_price'] = $arr['total_price'] > 0 ? $arr['total_price'] : 0;
		$data['wb_settlement_price'] = $arr['settlement_price'] > 0 ? $arr['settlement_price'] : 0;
		$map['wb_id'] = $id;
		$res = $this->toTable( 'weibo_order' )->where( $map )->data( $data )->save();
		return $res;
	}
	
	/**
	 * 添加子订单操作
	 */
	function addSubOrder( $arr,$order ){
		if( empty( $arr ) ) return true;
		$user = $this->getAdvUsersInfo( $order['a_u_id'] );
		$data = array();
		foreach ( $arr as $k=>$v ){
			$info = $this->getInfo( $v,$order['wb_order_type'],$order['wb_ad_type'],$order['wb_extension_type'] );//取出微博的相关信息
			$wo_m_price = $info['wo_m_price'];//自媒体价格
			if( $wo_m_price <= 0 ) continue;//价格为0就是不接单，过滤掉
			$fee_rate = 1+C( 'WEIBO_FEE_RATE' );
			$wo_a_price = ceil( $wo_m_price*$fee_rate );//广告主价格要乘以一个费率
			$wo_a_settlement = ceil( $wo_a_price * $user['a_u_discount'] ); //计算广告主结算价格*折扣
			$data[$k]['wb_id'] = $order['wb_id'];//主订单id
			$data[$k]['a_u_id'] = $order['a_u_id'];
			$data[$k]['m_u_id'] = $info['m_u_id'];
			$data[$k]['wo_is_postpay'] = $info['aw_is_postpay'];//账号是否后付值
			$data[$k]['aw_id'] = $v;//微博id
			$data[$k]['wo_a_price'] = $wo_a_price;//广告主价格,等于软广直发价格
			$data[$k]['wo_a_settlement'] = ( int )$order['wb_order_type'] == 1 ? $wo_a_settlement : 0;//广告主结算价格,初始值和广告主价格一样
			$data[$k]['wo_a_reduce_money'] = 0.00;//广告主减免金额
			$data[$k]['wo_m_price'] = $wo_m_price;//自媒体价格
			$data[$k]['wo_m_settlement'] = ( int )$order['wb_order_type'] == 1 ? $wo_m_price : 0;//自媒体结算金额( 可修改 ),如果是预约则默认是0
			$data[$k]['wo_m_reduce_money'] = 0.00;//自媒体减免金额
			$data[$k]['wo_aeid'] = $order['a_u_aeid'] >0 ? $order['a_u_aeid'] : 0;        //关联aeid
			$data[$k]['wo_bdid'] = $order['a_u_bdid'] > 0 ? $order['a_u_bdid'] : 0;        //关联商务id    Edit by quanzelin
			$data[$k]['wo_exec_medid'] = $info['aw_medid'];     //关联执行媒介id=拓展媒介id
			$data[$k]['wo_medid'] = $info['aw_medid'];//拓展媒介id
		}
		$res = $this->toTable( 'weibo_sub_order' )->addAll( $data );//2、添加子订单
		return $res;
	}
	
	/**
	 * 获取微博信息
	 */
	public function getInfo( $aw_id,$wb_order_type,$wb_ad_type,$wb_extension_type ) {
		$where['aw_id'] = $aw_id;
		$arr = M( 'account_weibo' )->where( $where )->find();
		if( $wb_order_type == 1 ){//直推
			if( $wb_ad_type == 1 ){//软广
				if( $wb_extension_type == 1 ){//直发
					$arr['wo_m_price'] = $arr['aw_soft_zhifa_price'];
				}else{//转发
					$arr['wo_m_price'] = $arr['aw_soft_zhuanfa_price'];
				}
			}else{//硬广
				if( $wb_extension_type == 1 ){//直发
					$arr['wo_m_price'] = $arr['aw_hard_zhifa_price'];
				}else{//转发
					$arr['wo_m_price'] = $arr['aw_hard_zhuanfa_price'];
				}
			}
		}else{//预约
			$arr['wo_m_price'] = $arr['aw_soft_zhifa_price'];//全部是软广价格
		}
		return $arr;
	}
	
	/**
	 * 获取子订单使用信用额度和总使用额度
	 */
	function getSubOrderData( $id ){
		$map['wb_id'] = $id;
		$map['wo_status'] = array( 'neq',5 );//已取消的订单不处理
		$field = array( 
				'SUM( wo_a_settlement ) AS settelment',
				'SUM( wo_use_credit_part ) AS credit'
		 );
		$res = $this->toTable( 'weibo_sub_order' )->field( $field )->where( $map )->select();
		return $res[0];
	}
	
	/**
	 * @desc 判断是不是所有子订单都解冻了
	 * @return int
	 * @author mabin
	 */
	function isFinishPayStatus( $id,$wo_pay_status ){
		$where['wb_id'] = $id;
		$cnt = $this->toTable( 'weibo_sub_order' )->where( $where )->count();
		$where['wo_pay_status'] = $wo_pay_status;
		$cnt2 = $this->toTable( 'weibo_sub_order' )->where( $where )->count();
		if( $cnt2 == 0 ) return false;
		if( $cnt2 >= $cnt ){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 更新广告主数据
	 */
	function updateUserData( $a_u_id,$data ){
		if( empty( $a_u_id ) ) return false;
		$map['a_u_id'] = $a_u_id;
		return $this->toTable( 'adv_users' )->where( $map )->data( $data )->save();
	}

	/**
	 * 更新主订单数据
	 */
	function updateOrderData( $a_u_id,$id,$data ){
		if( empty( $data ) ) return true;//没有数据就直接返回成功
		if( empty( $a_u_id ) || empty( $id ) ) return false;
		$map['a_u_id'] = $a_u_id;
		$map['wb_id'] = $id;
		return $this->toTable( 'weibo_order' )->where( $map )->data( $data )->save();
	}

	/**
	 * 获取投诉类型
	 */
	function getComplaintType( $ct_id ){
		$map['ct_id'] = $ct_id;
		$res = $this->toTable( 'complaint_type' )->field( array( 'ct_desc' ) )->where( $map )->find();
		return $res['ct_desc'];
	}

	/**
	 * 审核订单
	 */
	function checkOrder( $data,$id ){
		if( empty( $id ) ) return false;
		$map['wb_id'] = $id;
		$res = $this->toTable( 'weibo_order' )->where( $map )->data( $data )->save();
		return $res;
	}
	
	/**
	 * @desc 获取收款帐号列表
	 * @param array $mapArr	map_id数组
	 * @return array
	 * @author: mabin
	 * @time: 2016-10-20
	 */
	function getPayAccountList( $sub_id ){
		$where['c.wo_id'] = $sub_id;
		$field = array(
				'map_id',
				'map_account_name',
				'map_account',
				'map_account_bank'
		);
		$res = $this->toTable( 'med_account_payee' )->alias( 'a' )
													->join( "left join wyx_account_weibo b on a.r_id = b.r_id" )
													->join( "left join wyx_weibo_sub_order c on b.aw_id = c.aw_id" )
													->field( $field )->where( $where )->select();
		return $res;
	}
	
	/**
	 * @desc 更改子订单对应的收款帐号
	 * @param int $sub_id	子订单id
	 * @param int $map_id	收款帐号id
	 * @return boolean
	 * @author: mabin
	 * @time: 2016-10-20
	 */
	function changePayAccount( $sub_id, $map_id ){
		$where['wo_id'] = $sub_id;
		$data['wo_map_id'] = $map_id;
		$res = $this->toTable( 'weibo_sub_order' )->where( $where )->save($data);
		return $res;
	}
	
	/**
	 * @desc 获取子订单的帐号对应的媒介资源id（r_id）
	 * @param int $sub_id	子订单id
	 * @author: mabin
	 * @time: 2016-10-20
	 * @return array
	 */
	public function getRid( $sub_id ){
		$where['b.wo_id'] = $sub_id;
		$field = array(
				'a.r_id',
		);
		$res = $this->toTable( 'account_weibo' )->alias( 'a' )
													->join( "left join wyx_weibo_sub_order b on a.aw_id = b.aw_id" )
													->field( $field )->where( $where )->find();
		return $res['r_id'];
	}
	
	/**
	 * @desc 查看下有没有重复
	 * @param int $r_id	媒介资源id
	 * @param int $account	帐号
	 * @author: mabin
	 * @time: 2016-10-20
	 * @return array
	 */
	public function hasExist( $r_id, $account ){
		$where['r_id'] = $r_id;
		$where['map_account'] = $account;
		$field = array(
				'map_id',
		);
		$res = $this->toTable( 'med_account_payee' )->field( $field )->where( $where )->find();
		return !empty($res) ? true : false;
	}
	
	/**
	 * @desc 添加新收款帐号
	 * @param array $data	添加的数据
	 * @return boolean
	 * @author: mabin
	 * @time: 2016-10-20
	 */
	public function addPayAccount( $data ){
		$res = $this->toTable( 'med_account_payee' )->add( $data );
		return $res;
	}
	
	/**
	 * 检查权限
	 */
	function checkRight(){
		$id = get_var_value( "id" );
		$sub_id = get_var_value( "sub_id" );
		if( !empty( $sub_id ) ) {
			$subOrder = $this->getSubOrderDetail( $sub_id );//获取子订单
			$id = $subOrder['wb_id'];
		}
		if( !empty( $id ) ) {
			$isSeeAll = $this->isSeeAll();
			if( !$isSeeAll ){//权限控制，如果没有查看所有的权限就要做判断
				$order = $this->getOrder( $id );//获取主订单
				if( empty( $subOrder ) ){$subOrder = $this->getSubOrderDetail( $sub_id );}//获取子订单
				$aeids = $this->getAeIdsByManager();
				$bdids = $this->getBdIdsByManager();
				$medids = $this->getMedIdsByManager();
				if( !in_array( $order['wb_aeid'], $aeids ) || !in_array( $order['wb_bdid'], $bdids ) || !in_array( $order['wo_medid'], $medids ) ){
					output_data( '您无权访问！',-1 );
				}
			}
		}else{
			output_data( '缺少参数id！',-1 );
		}
	}
}
