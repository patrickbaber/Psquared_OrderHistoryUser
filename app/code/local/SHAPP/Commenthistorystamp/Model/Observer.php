<?php
class SHAPP_Commenthistorystamp_Model_Observer {
	
	public function orderStatusHistorySaveBefore($observer)  
	{
	    $session = Mage::getSingleton('admin/session');
	    if ($session->isLoggedIn()) {
	        $user = $session->getUser();
	        $history = $observer->getEvent()->getStatusHistory();
	        if (!$history->getId()) {
	            $history->setData('username', $user->getEmail());
	        }            
	    }
	}

}
?>