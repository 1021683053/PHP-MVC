<?php
	if( !defined("APP") ){
		exit("ERROR NOT ALLOW ACCESS!");
	}

	/**
	  * user_controller
	**/
	class user_controller
	{
		private $user_model;

		public function __construct() {
			$this->user_model = new user_model();
		}

		public function userHome() {
			$uid = $_POST['userid'];
			//$uid = '687179184';
			echo json_encode( $this->user_model->get_act_count($uid) );
		}
	}