<?php
	if( !defined("APP") ){
		exit("ERROR NOT ALLOW ACCESS!");
	}
	
	/**
	  * uer_model
	**/
	class user_model
	{	
		private $conn;
		public function __construct() {
			$db = new db_model();
			$this->conn = $db->conn();
		}

		/** 获取用户所开的活动各种活动个数
		  * @param init $uid 用户id
		  * @return array 返回当前用户开的活动种类和个数
		**/
		public function get_act_count($userid) {
			$return = array(
				'status' => 0,
				'data' => ''
				);

			if( empty($userid) ){
				$return['status'] = -1;
				return $return;
			}

			//打折活动个数
			$sql = "SELECT COUNT(*) FROM act_dx_list WHERE `userid`=". $userid ." AND `state`=1 AND etime>". time();
			if( $query = mysql_query($sql, $this->conn) ){
				while( $res = mysql_fetch_assoc($query) ){
					$return['data']['dazhe'] = $res['COUNT(*)'];
				}
				$return['status'] = 1;
			}else{
				$return['status'] = -2;
				return $return;
			}

			//满就送个数
			$sql = "SELECT COUNT(*) FROM act_mjs_list WHERE `userid`=". $userid ." AND `state`=1 AND etime>". time();
			if( $query = mysql_query($sql, $this->conn) ){
				while( $res = mysql_fetch_assoc($query) ){
					$return['data']['manjiusong'] = $res['COUNT(*)'];
				}
				$return['status'] = 1;
			}else{
				$return['status'] = -3;
				return $return;
			}

			//优惠券个数
			$sql = "SELECT COUNT(*) FROM act_dxyhq_list WHERE `userid`=". $userid ." AND `state`=1 AND etime>". time();
			if( $query = mysql_query($sql, $this->conn) ){
				while( $res = mysql_fetch_assoc($query) ){
					$return['data']['youhuiquan'] = $res['COUNT(*)'];
				}
				$return['status'] = 1;
			}else{
				$return['status'] = -4;
				return $return;
			}
			return $return;
		}
	}