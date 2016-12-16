<?php
namespace AdminScut\Controller;
use Think\Controller;
class BackController extends Controller {
    public function __construct(){
        parent::__construct();
        $this->model = new \AdminScut\Model\BackModel();
    }

    public function index(){
        $this->display('');
    }

    /**
     * search_result
     */
    public function search_result(){
        $q = get_var_value('q');
        $page = get_var_value('page');
        $map = array();
        if(!empty($q)){
            $map['c_chemicals'] = array("like","%$q%");
        }
        $data = $this->model->getSearch($map,$page);
        $marks = cookie('marks');
        $marks = array_values($marks);
        if(!empty($data)){
            foreach ($data['data'] as $k=>$v){
                if(in_array_case($v['c_chemicals'],$marks)){
                    $data['data'][$k]['is_sel'] = 1;
                }else{
                    $data['data'][$k]['is_sel'] = 0;
                }
            }
        }
//        p($marks);
//        p($data);die;
        exit_json($data);
    }

    /**
     * 获取化合反应
     */
    public function reaction_list(){
        $q = get_var_value('q');
        if(!empty($q)){
            $map['r_reactant_one'] = array("like","%$q%");
        }
        $data = $this->model->reactionList($map);
        if(!empty($data)){
            $data = array('data'=>$data,'status'=>1);
        }else{
            $data = array('data'=>array(),'status'=>-1);
        }
        exit_json($data);
    }

    /**
     * 获取化合反应,列表
     */
    public function get_reaction(){
        $marks = cookie('marks');
        if(empty($marks)){
            $data = array();
        }else{
            $data = $this->model->getReaction($marks);
        }
        $arr = array('data'=>$data);
        exit_json($arr);
    }



	
}