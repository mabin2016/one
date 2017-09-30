<?php
namespace Home\Model;
use Think\Model;
class MainModel extends Model {
	protected $tableName = 'compound';

	/**
	 * 查询列表
	 * @return array
	 */
	public function getSearch( $map = array(), $page = 1, $pageSize = 5) {
		$return = array( 'total'=>0, 'data'=>array() );
		$page = $page-1;
		$limit = "$page,$pageSize";
		$totalRecord = M()->table(C('DB_PREFIX').'compound' )->where( $map )->count();
		$return['total'] = $totalRecord;
		$field = array('id','c_chemicals','c_name1','c_name2','c_cas','c_img');
		$data = M()->table(C('DB_PREFIX').'compound' )->field( $field )->where( $map )->limit( $limit )->select();
		$return['data'] = $data;
		return $return;
	}

	/**
	 * 反应列表(有图片页)
	 * @return array
	 */
	public function reactionList( $map ) {
		$group = "r_reactant1,r_reactant2,r_reactant3,r_product1,r_product2,r_product3"; 
		$data = M()->table(C('DB_PREFIX').'compound_reaction' )->where($map)->group($group)->select();
		return $data;
	}

	/**
	 * 取出还有下一步反应的物质
	 * @return array
	 */
	public function hasloop($arr) {
		if(empty($arr)){
			return array();
		}
		$where['r_reactant1'] = array('in',$arr);
		$data = M()->table(C('DB_PREFIX').'compound_reaction' )->field(array('r_reactant1'))->where($where)->group('r_reactant1')->select();
		return $data;
	}

	/**
	 * 获取化合物
	 * @return array
	 */
	public function getCompound( $map ) {
		if(empty($map)){return '';}
		$data = M()->table(C('DB_PREFIX').'compound' )->field('c_chemicals,c_name1,c_name2')->where( $map )->find();
		return $data;
	}

	/**
	 * 取所有数据(取出反应和反应物关联数据)
	 * @return array
	 */
	public function getAllData() {
		$map["b.c_recursive"] = 1;//是否终止
		$map["a.r_is_show"] = 1;//显示的
		$field = array(
			"a.r_reactant1",
			"a.r_reactant2",
			"a.r_reactant3",
			"a.r_product1",
			"a.r_product2",
			"a.r_product3",
			"IFNULL(a.r_kt,'') as r_kt"
		);
		$group = "a.r_reactant1,a.r_reactant2,a.r_reactant3,a.r_product1,a.r_product2,a.r_product3";
		$data = M()->table(C('DB_PREFIX').'compound_reaction' )->alias("a")
					->join(C('DB_PREFIX')."compound as b on a.r_reactant1 = b.c_chemicals")
					->field($field)->group($group)->where($map)->select();
		return $data;
	}

	/**
	 * 常量列表
	 * @return array
	 */
	public function getConstatnt( $order ) {
		$data = M()->table(C('DB_PREFIX').'constant' )->order( $order)->select();
		return $data;
	}

	/**
	 * 反应列表（纯文字页）
	 * @return array
	 */
	/*public function getReaction( $r_reactant1,$resArr = array(),$a=0 ) {
		//echo $r_reactant1."<br>";die;
		$res = $this->getData( $r_reactant1,$a );
		$a++;
		if(!empty($res)){
			foreach ($res as $k=>$v) {
				$arr1 = array_unique(array_column($res, "r_product1"));
				$arr2 = array_unique(array_column($res, "r_product2"));
				$arr3 = array_unique(array_column($res, "r_product3"));
				$data = array_merge($arr1, $arr2);
				$data = array_merge($data, $arr3);
				$data = array_filter($data);
				$data = array_values(array_unique($data));
				$resArr[$v] = $res;
				//$resArr[] = $a;
				//$res = $this->getData( $v,$a );
				p($data);die;
				foreach ($data as $v2){
					$data = self::getReaction($v2,$resArr,$a);
				}
			}
		}
		return $resArr;
	}
	public function getReaction( $data,&$resArr = array(),$a=1 ) {
		$a++;
		foreach ($data as $v) {
			$res = $this->getData( $v );
			if(!empty($res)) {
				$resArr[$res[0]['r_reactant1']] = $res;
				$arr1 = array_unique(array_column($res, "r_product1"));
				$arr2 = array_unique(array_column($res, "r_product2"));
				$arr3 = array_unique(array_column($res, "r_product3"));
				$data2 = array_merge($arr1, $arr2);
				$data2 = array_merge($data2, $arr3);
				$data2 = array_filter($data2);
				$data2 = array_values(array_unique($data2));
				//if (!empty($data)) {
				//p($data2);die;
					self::getReaction($data2, $resArr, $a);
				//}
			}
		}
		return $resArr;
	}*/

	/**
	 * 循环内取数据(取出反应和反应物关联数据)
	 * @return array
	 */
	/*public function getData( $r_reactant1 ) {
		$map["b.c_recursive"] = 1;//是否终止
		$map["a.r_reactant1"] = $r_reactant1;
		$map["a.r_is_show"] = 1;//显示的
		$field = array(
			"a.r_reactant1",
			"a.r_reactant2",
			"a.r_reactant3",
			"a.r_product1",
			"a.r_product2",
			"a.r_product3",
			"a.r_kt"
		);
		$data = M()->table(C('DB_PREFIX').'compound_reaction' )->alias("a")
			->join(C('DB_PREFIX')."compound as b on a.r_reactant1 = b.c_chemicals")
			->field($field)->where( $map )->select();
		return $data;
	} */


}
