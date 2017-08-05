<?php

namespace app\lovewall\validate;

use think\Validate;

class Love extends Validate
{
	protected $rule = [
		'receiver'=>'require|max:16',
        'name'  =>  'require|max:16',
        'info' =>  'require|max:255',
    ];
}