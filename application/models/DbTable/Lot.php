<?php

class Application_Model_DbTable_Lot extends Zend_Db_Table_Abstract
{

    //protected $_name = 'commande';
	// public function get_dats(){
		// $s = $this->select()->from('commande');
		// return $this->fetchAll($s);
	// }
	// public function obtenirPli($lot_id)
    // {
        // $lot_id = (int)$lot_id;
        // $row = $this->fetchRow('lot_id = ' . $lot_id);
        // if (!$row) {
            // throw new Exception("Impossible de trouver l'enregistrement $lot_id");
        // }
        // return $row->toArray();
    // }
	public function getLot(){
		$lots 	= new Application_Model_DbTable_Connect();
		$db 	= $lots->get_db();
		$sql0 	= $db->query('SELECT * FROM lot');
		$rows 	= $sql0->fetchAll();
		return $rows;
	}
	
	public function countLot(){
		$lots 	= new Application_Model_DbTable_Connect();
		$db 	= $lots->get_db();
		$sql0 	= $db->query('SELECT count(*) as resu FROM lot');
		$rows 	= $sql0->fetchAll();
		return $rows;
	}
	
	public function getByLotID($lot_id){
		$lots 	= new Application_Model_DbTable_Connect();
		$db 	= $lots->get_db();
		$sql0	= $db->query('SELECT * FROM lot where lot_id = ?',array($lot_id));
		$rows	= $sql0->fetchAll();
		return $rows;
		// 'SELECT * FROM bugs WHERE reported_by = ? AND bug_status = ?',
        // array('goofy', 'FIXED')
	}
	
	public function updateLot($lid,$cmd_id,$dtrait_cdt,$nbp,$nlot){
		$lots 	= new Application_Model_DbTable_Connect();
		$db 	= $lots->get_db();
		
		// $datas =  array('commande_id'=>$cmd_id,'debut_traitement_cdt'=>$dtrait_cdt,'nb_plis'=>$nbp,'nom_lot'=>$nlot);
		// $where = array('lot_id'=>$lid);
		// $resus = $db->update('lot',$datas,$where);
		$sqls = "update lot set commande_id = '".$cmd_id."' where lot_id=".$lid."";
		 echo $sqls;
		$sql0 = $db->query($sqls);
		// print_r($resus);
		// return $resus;
		// $sql0	= $db->query('SELECT * FROM lot where lot_id = ?',array($lot_id));
		// $rows	= $sql0->fetchAll();
		// return $rows;
		// 'SELECT * FROM bugs WHERE reported_by = ? AND bug_status = ?',
        // array('goofy', 'FIXED')
	}


}

