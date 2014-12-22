<?php
	if( !defined("APP") ){
		exit("ERROR NOT ALLOW ACCESS!");
	}
	
	/**
	  *db_model
	**/
	class db_model
	{	
		//私有成员属性（ db 配置 ）
		private $host;
		private $user;
		private $pwd;
		private $dbname;
		private $charset;
		private $port;
		//接受全局变量
		public function __construct() {

			//容错
			if( !isset($GLOBALS['config']) ){
				exit("DB:ERROR -config- IS NOT FIND!");	
			}
			if( !isset($GLOBALS['config']['db']) ){
				exit("DB:ERROR -config['db']- IS NOT FIND!");
			}
			if( !isset($GLOBALS['config']['db']['host']) || !isset($GLOBALS['config']['db']['user']) || !isset($GLOBALS['config']['db']['pwd']) || !isset($GLOBALS['config']['db']['dbname']) ){
				exit("DB:ERROR -cofig['db']- IS NOT FULL!");
			}

			//引入全局变量（ config变量 ）
			$config = $GLOBALS['config'];

			//配置文件默认值
			$config['db']['port'] = empty($config['db']['port']) ? "3306" : $config['db']['port'] ;
			$config['db']['charset'] = empty($config['db']['charset']) ? "utf8"  : $config['db']['charset'] ;

			//配置当前的数据库
			$this->host = $config['db']['host'];
			$this->user = $config['db']['user'];
			$this->pwd = $config['db']['pwd'];
			$this->dbname = $config['db']['dbname'];
			$this->charset = $config['db']['charset'];
			$this->port = $config['db']['port'];
		}

		//连接数据库
		public function conn() {
			$conn = mysql_connect($this->host .":". $this->port, $this->user, $this->pwd ) or die("DB:ERROR CONNECT DB!");
			if( !mysql_select_db($this->dbname, $conn) ){
				exit("DB:ERROR NOT FOND DATEBASE!");
			}
			if( !mysql_set_charset($this->charset, $conn) ){
				exit("DB:ERROR SET CHARSET FALED!");
			}
			return $conn;
		}
	}