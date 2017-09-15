<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

// 定义目录
define('LIB_ROOT', __DIR__ . '/../lib/');

// 定义SNS核心包目录
define('SNS_PATH', LIB_ROOT . 'sns/');

// 定义thinkphp目录
define('THINK_PATH', LIB_ROOT . 'thinkphp/');

// 加载框架引导文件
require LIB_ROOT . 'thinkphp/start.php';
