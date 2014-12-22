<?php
	if( !defined("APP") ){
		exit("ERROR NOT ALLOW ACCESS!");
	}
	
	/** 
	  * error_controller
	**/
	class error_controller
	{
		//构造函数
		function __construct() {

		}

		//普通URL传参报错( c未传入参数 )
		function url_001() {
			exit("ERROR CONTROLLER : CODE 001");
		}

		//普通URL传参报错( m未掺入参数 )
		function url_002() {
			exit("ERROR CONTROLLER : CODE 002");
		}

	}