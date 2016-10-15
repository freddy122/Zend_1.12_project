<?php
	class Application_Model_DbTable_Connect
	{
		public function get_db(){
			$db = Zend_Db::factory('Pdo_Mysql', array(
				'host'     => 'localhost',
				'username' => 'root',
				'password' => '',
				'dbname'   => 'ged'
			));
			return $db;
		}
	}
