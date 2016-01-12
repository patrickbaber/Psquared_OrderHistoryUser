<?php

class Psquared_OrderHistoryUser_Model_Observer
{
	public function orderStatusHistorySaveBefore($observer) {
		$session = Mage::getSingleton('admin/session');
		if ($session->isLoggedIn()) {
			$user = $session->getUser();
			$history = $observer->getEvent()->getStatusHistory();
			if (!$history->getId()) {
				$history->setData('username', $user->getUsername());
			}
		}
	}

	public function orderCommentSaveBefore($observer) {
		$event = $observer->getEvent();
		$object = $event->getObject();

		if ($object instanceof Mage_Sales_Model_Order_Invoice_Comment
		    || $object instanceof Mage_Sales_Model_Order_Shipment_Comment
		    || $object instanceof Mage_Sales_Model_Order_Creditmemo_Comment) {
			$session = Mage::getSingleton('admin/session');
			if ($session->isLoggedIn()) {
				$user = $session->getUser();
				if (!$object->getId()) {
					$object->setData('username', $user->getUsername());
				}
			}
		}
	}
}