<?php
namespace app\lovewall\controller;
use think\Controller;
use think\Session;
use app\lovewall\model;	//模型
use think\Cookie;
class Admin extends Controller
{
	//登录页面
	public function login(){
		if(Session::has('admin')){
			$this->success('登录成功!','index/index');
		}
		return $this->fetch('login');
	}
	
	//验证登录
	public function admin(){
		$info['usr'] = input('post.username');
		$info['pwd'] = input('post.password');
		$model = model("Admin");
		$tmp = $model->where($info)->select();
		if(Cookie::get('isLogin','think_') == true){
			$this->success('登录太频繁,请稍后再试');
			return ;
		}
		
		if(empty($tmp)){
			// 验证失败 输出错误信息
			cookie(['prefix' => 'think_', 'expire' => 3600 ,'path' => '/']);
			cookie('isLogin', 'true', 10);
			$this->success('登录失败,账号或密码错误!');
		}else{
			Session::set('admin','true');
			$this->success('登录成功!', 'index/index');
		}

	}
	
	//删除
	public function erase($id){
		$love = model("Love");
		$tmp = $love->where("id",$id)->update(['display' => 0]);
		$this->success('删除成功!', 'index/index');
	}
	
	//注销
	public function quit(){
		Session::delete('admin');
		$this->success('注销成功!', 'index/index');
	}
	
}
