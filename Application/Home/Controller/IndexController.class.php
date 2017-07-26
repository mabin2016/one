<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function __construct(){
		parent::__construct();
		$this->model = new \Home\Model\MainModel();
		$marks = cookie('marks');
// 		p($marks);
	}

    public function index(){
		$this->display('home');		
    }
	
	public function browse(){
		$this->display();		
    }
	
	public function roots(){
		$this->display();
    }
	
	public function citation(){
		$this->display();		
    }
	
	public function contributors(){
		$this->display();		
    }
	
	public function download(){
		$this->display();		
    }
	
	public function extract_data(){
		$this->display();		
    }
	
	public function feedback(){
		$this->display();		
    }
	
	public function funding(){
		$this->display();		
    }
	
	public function links(){
		$this->display();		
    }
	
	public function search(){
		$this->display();
    }
	
	public function tools(){
		$this->display();		
    }
	
	public function tutorial_intro(){
		$this->display();		
    }
	
	public function project(){
		$order = "id asc";
		$list   =   $this->model->getConstatnt($order);
		$this->assign('_list', $list);
		$this->display();
    }

	/**
	 * extract反应列表页面
	 */
	public function extract_list(){
		$inorganic = get_var_value('inorganic');
		$generic = get_var_value('generic');
		$map = array();
		if(!empty($q)){
			$map['r_reactant_one'] = array("like","%$q%");
		}
		$this->assign('inorganic',$inorganic);
		$this->assign('generic',$generic);
		$this->display('extract_list');
	}

	/**
	 * cookie列出markList
	 */
	public function list_marks(){
		$marks = cookie('marks');
		$data = array_values($marks);
		exit_json($data);
	}

	/**
	 * cookie记录markList
	 */
	public function add(){
		$marks = cookie('marks');
		$name = get_var_value('marks');
		$arr = array();
		if(empty($marks)){
			$marks = array();
		}
		if(!empty($name)){
			$name2 = explode(",",$name);
			$arr = array_merge($marks,$name2);
			$arr = array_unique($arr);
			cookie('marks',$arr,3600);
			$data = array_values($arr);
		}else{
			$data = array("status"=>-1);
		}
		exit_json($data);
	}

	/**
	 * cookie删除markList
	 */
	public function del(){
		$marks = cookie('marks');
		$name = get_var_value('marks');
		if(empty($marks)){
			$marks = array();
		}
		if(!empty($name) && !empty($marks)){
			$arr = array();
			$name2 = explode(",",$name);
			foreach ($marks as $k=>$v){
				if(!in_array($v,$name2)){
					$arr[$k] = $v;
				}
			}
			cookie('marks',$arr,3600);
			$data = array_values($arr);
		}else{
			$data = array("status"=>-1);
		}
		exit_json($data);
	}
	
	/**
	 * cookie清空markList
	 */
	public function clear(){
		cookie('marks',null);
		if(empty($marks)){
			$data = array("status"=>1);
		}else{
			$data = array("status"=>-1);
		}
		exit_json($data);
	}
}