<?php 
	if( !defined("APP") ){
		exit("ERROR NOT ALLOW ACCESS!");
	}

	//config
	$config = array();
	
	//DB config
	$config['db']['host'] = "jconnfvdrjkg2.mysql.rds.aliyuncs.com"; //必须
	$config['db']['user'] = "jusr67qpjfgn";		//必须
	$config['db']['pwd'] = "jus97hniu34Pix29";			//必须
	$config['db']['dbname'] = "hnmbtest";	//必须
	$config['db']['charset'] = "utf8";	//可选，默认（utf8）
	$config['db']['port'] = "3306";	//可选，默认（3306）

	/*
	+++++++++++++++++++++++++++++++++++++++++
				config backup
	+++++++++++++++++++++++++++++++++++++++++
	$config['db']['host'] = ""; //必须
	$config['db']['user'] = "";		//必须
	$config['db']['pwd'] = "";			//必须
	$config['db']['dbname'] = "";	//必须
	$config['db']['charset'] = "";	//可选，默认（utf8）
	$config['db']['port'] = ""; //可选，默认（3306）
	*/