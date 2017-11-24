<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends Controller {
    public function __construct(){
        parent::__construct();
        $this->model = new \Home\Model\MainModel();
    }
    /**
     * search_result
     */
    public function search_result(){
        $q = get_var_value('q');
        $page = get_var_value('page');
        $pageSize = get_var_value('pageSize');
        $page = $page > 0 ? $page : 1;
        $map = array();
        if(!empty($q)){
            $map['c_chemicals'] = array("like","%$q%");
        }
        $data = $this->model->getSearch($map,$page,$pageSize);
        $marks = cookie('marks');
        $marks = array_values($marks);
        if(!empty($data)){
            foreach ($data['data'] as $k=>$v){
                if(in_array($v['c_chemicals'],$marks)){
                    $data['data'][$k]['is_sel'] = 1;
                }else{
                    $data['data'][$k]['is_sel'] = 0;
                }
                $data['data'][$k]['c_img'] = C('IMG_HTTP_DOMAIN').$v['c_img'];
            }
            $data['current_page'] = $page;
        }
        exit_json($data);
    }

    /**
     * 获取化合反应
     */
    public function reaction_list(){
        $q = get_var_value('q');
        if(!empty($q)){
            $map['r_reactant1'] = $q;
            $map2['c_chemicals'] = $q;
        }
        $data = $this->model->reactionList($map);
        $data2 = $this->model->getCompound($map2);
		$product1 = array_column($data,'r_product1');
		$product2 = array_column($data,'r_product2');
		$product3 = array_column($data,'r_product3');
		$tmp = array_merge($product1,$product2);
		$tmp = array_values(array_filter(array_merge($tmp,$product3)));
		
        $loop_arr = $this->model->hasloop($tmp);//取出还有下一步反应的物质
        
        if(empty($loop_arr)){
        	$loop_arr = array();
        }else{
        	$loop_arr = array_column($loop_arr, 'r_reactant1');
        }
        if(!empty($data)){
        	foreach ($data as $k=>&$v){
        		if(!in_array($v['r_product1'], $loop_arr)){
        			$v['p_1'] = 0;
        		}else{
        			$v['p_1'] = 1;//显示链接点击
        		}
        		if(!in_array($v['r_product2'], $loop_arr)){
        			$v['p_2'] = 0;
        		}else{
        			$v['p_2'] = 1;//显示链接点击
        		}
        		if(!in_array($v['r_product3'], $loop_arr)){
        			$v['p_3'] = 0;
        		}else{
        			$v['p_3'] = 1;//显示链接点击
        		}
        		$v['r_document'] = C('PDF_HTTP_DOMAIN').$v['r_document'];
        	}
        }
        
        if(!empty($data2)){
        	foreach ($data2 as $k=>&$v){
        		if(!empty($v['c_img'])){
        			$v['c_img'] = C('IMG_HTTP_DOMAIN').$v['c_img'];
        		}
        	}
        }
        
        if(!empty($data)){
            $data = array('data'=>$data,'status'=>1);
        }else{
            $data = array('data'=>array(),'status'=>-1);
        }
        $arr = array(
            'data'=>$data,
            'data2'=>$data2
        );
        exit_json($arr);
    }

    /**
     * 获取化合反应,列表
     */
    public function get_reaction(){
        $marks = cookie('marks');
        if(empty($marks)){
            $data = array();
            exit_json($data);
        }
        if(!S('ch_data')){
            $data = $this->model->getAllData();
        }else{
            $data = S('ch_data');//从缓存里面去数据
        }
        if(!empty($data)){
            S('ch_data',$data,3600);//设置缓存
            $arr = array();
            foreach ($data as $k=>$v){
                $arr[$v['r_reactant1']][] = $v;
            }
        }
        $result = $this->deal_data($arr,$marks);
        $result = array_values($result);

        if(!empty($result)){
            $tmp = array();
            foreach ($result as $k=>&$v){
                if(!empty($v)){
                    foreach ($v as $k2=>&$v2){
                        if($k2 == 0){
                            $v2['is_sel'] = 1;
                        }else{
                            $v2['is_sel'] = 0;
                        }
                        $tmp[] = $v2;
                    }
                }
            }
        }else{
        	$tmp = array();
        }
        exit_json($tmp);
    }

    /**
     * 循环处理数据
     */
    function deal_data($data = array(),$selectData = array(),&$resArr = array()){
        if(empty($data) || empty($selectData)){return array();}
        foreach ($selectData as $k=>$v){
            if(!empty($data[$v])){
                $arr1 = array_unique(array_column($data[$v], "r_product1"));
                $arr2 = array_unique(array_column($data[$v], "r_product2"));
                $arr3 = array_unique(array_column($data[$v], "r_product3"));
                $data2 = array_merge($arr1, $arr2);
                $data2 = array_merge($data2, $arr3);
                $data2 = array_filter($data2);
                $data2 = array_values(array_unique($data2));

                $resArr[$v] = $data[$v];
                unset($data[$v]);
                self::deal_data($data, $data2, $resArr);
            }
        }
        $resArr = (array)$resArr;
        return $resArr;
    }
}