<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		//$lots = new Application_Model_DbTable_Lot();
		// echo "<pre>";
		// print_r(json_encode($lots->get_commande()));
		// echo "</pre>";
		
		//$res = $lots->get_dats();
		
		//print_r($res);
		// $rows = json_encode($lots->get_commande());
		// $this->view->com = $rows;
    }

    public function ajouterAction()
    {
        // action body
    }

    public function modifierAction()
    {
        $this->_helper->layout()->disableLayout(); 
        $this->_helper->viewRenderer->setNoRender(true);
		$lots = new Application_Model_DbTable_Lot();
		$lot_id = $this->getRequest()->getParam ('lots',null);
		$cmd = $this->getRequest()->getParam ('cmd',null);
		$debt = $this->getRequest()->getParam ('debt',null);
		$nbpli = $this->getRequest()->getParam ('nbpli',null);
		$nlot = $this->getRequest()->getParam ('nlot',null);
		//echo "---".$lot_id;
		
		$lots   = new Application_Model_DbTable_Lot();
		$rowss  = $lots->updateLot($lot_id,$cmd,$debt,$nbpli,$nlot);
		// $this->view->findlot = $rowss;
    }

    public function supprimerAction()
    {
        // action body
    }

    public function getdataAction()
    {
        $this->_helper->layout()->disableLayout(); 
        $this->_helper->viewRenderer->setNoRender(true);
		$lots = new Application_Model_DbTable_Lot();
		$rowss = $lots->countLot();
		foreach($rowss as $rs){
			$tot = $rs['resu'];
		}
		$rowss = $lots->getLot();
		$datatables = json_encode(array
            (
               "sEcho" 				   => intval($_GET['sEcho']), 
               "iTotalRecords"         => $tot,
               "iTotalDisplayRecords"  => $tot,
               "aaData" 			   => $rowss
            )
		);
		echo $datatables;
    }

    public function getbyidAction()
    {
        $this->_helper->layout()->disableLayout(); 
        //$this->_helper->viewRenderer->setNoRender(true);
		// $lot_id =$this->getRequest()->getPost('lot_id');
		$lot_id = $this->getRequest()->getParam ('lot_id',null);
		//echo "---".$lot_id;
		
		$lots   = new Application_Model_DbTable_Lot();
		$rowss  = $lots->getByLotID($lot_id);
		$this->view->findlot = $rowss;
		//print_r($rowss);
    }


}















