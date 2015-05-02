<?php
	define("APP", "true");
	define("PATH", dirname(__FILE__));
	$c = empty($_GET['c']) ? '' : $_GET['c'];
	$m = empty($_GET['m']) ? '' : $_GET['m'];

	//加载配置文件
	if( !file_exists( PATH."/app/conf/conf.php" ) ){
		exit("CONFIG IS NOT FOND!");
	}
	require_once( PATH."/app/conf/conf.php" );

	//加载公共函数
	if( !file_exists( PATH."/app/common/func.php" ) ){
		exit("BASE:ERROR -func.php- NOT FIND!");
	}
	require_once( PATH."/app/common/func.php" );

	//自动加载类文件
	function __autoload($class) {
		$arr = explode("_", $class);
		$type = empty($arr[1]) ? "" : $arr[1];
		if( $type == "controller"){
			if( !file_exists( PATH ."/app/controller/". $class .".php") ){
				exit("ERROR COTROLLER CLASS NOT FOND!");
			}
			require_once( PATH ."/app/controller/". $class .".php" );
		}elseif( $type == "model" ){
			if( !file_exists( PATH ."/app/model/". $class .".php") ){
				exit("ERROR COTROLLER CLASS NOT FOND!");
			}
			require_once( PATH ."/app/model/". $class .".php" );
		}else{
			exit("ERROR CLASS IS`NT MODEL OR CONTROLLER!");
		}
	}
	
	//hhhhhhhhhhhhhhhhhhhhhhhhhhhh

	//判断是否有此方法
	if( !method_exists($c ."_controller", $m) ){
		exit("BASE:ERROR IN THIS CONTROLLER NOT FIND THIS METHOD!");
	}

	//通过URL自动装载控制器
	if( $c ){
		$controller = $c ."_controller";
		$controller = new $controller();
	}else{
		$error_controller = new error_controller();
		$error_controller->url_001();
		exit();
	}

	if( $m ){
		$controller->$m();
	}else{
		$error_controller = new error_controller();
		$error_controller->url_002();
		exit();
	}
	
	//world11111
