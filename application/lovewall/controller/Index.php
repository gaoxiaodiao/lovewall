<?php
namespace app\lovewall\controller;
use think\Controller;
use app\lovewall\model\Love;	//模型
use app\lovewall\model\Admin;	//模型
use think\Session;
use app\lovewall\validate;		//验证器
use think\Cookie;

class Index extends Controller
{
	//首页
	public function Index($id=0){
		$model = new Love();									//实例化模型对象
		$list = $model->where("display","1")->select();			//查询所有字条信息
		$this->assign('list',$list);							//将变量输出到模板
		$this->assign('id',$id);
		return $this->fetch('index');							//渲染模板输出
    }
	
	//贴字条
	public function add(){
		return $this->fetch('add');		//渲染模板输出
	}
	
	//保存字条
	public function save(){
		$model = new Love();
		$data = array(
			'receiver' => input('post.receiver'),
			'info' => htmlentities(input('post.info')),
			'name' => input('post.name'),
			'time' => time(),
			'icon' => input('post.icon'),
			'face' => input('post.face')
		);
		
		if(Cookie::get('isAdd','think_') == true){
			$this->success('不要重复添加!');
		}else{
			$result = $model->validate(true)->save($data);
			if(false === $result){
				// 验证失败 输出错误信息
				$this->success('失败:'.$model->getError());
			}else{
				cookie(['prefix' => 'think_', 'expire' => 3600 ,'path' => '/']);
				cookie('isAdd', 'true', 60*3);
				$this->success('添加成功!', 'index/index');
			}
		}
		
	}
	
	//字条列表
	public function lists(){
		$model = new Love();
		$list = $model->where("display","1")->order("id desc")->select();
		$this->assign('list',$list);
		
		$islogin = Session::get('admin');
		if($islogin!=NULL){
			$this->assign('islogin',true);
		}else{
			$this->assign('islogin',false);
		}
		return $this->fetch('list');
	}
	
	
	public function donate(){
		//echo "此处是捐献!";
		$model = new Admin();
		$list = $model->where("id","1")->select();
		//dump($list);die;
		$this->assign('list',$list);
		
		return $this->fetch('donate');
	}
	
}
