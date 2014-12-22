<?php
	//This file is all public function 

	//获取当前文件名(仅文件名，无传参)；
	function filename() {
		$dir_file = $_SERVER['SCRIPT_NAME'];
		$filename = basename($dir_file);
		return $filename;
	}