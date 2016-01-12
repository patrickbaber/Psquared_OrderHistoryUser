<?php

$installer = $this;
$installer->startSetup();

/* @var $installer Mage_Sales_Model_Entity_Setup */
$installer = $this;

$installer->getConnection()
	->addColumn($installer->getTable('sales/order_status_history'), 'entity_name', array(
		'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
		'length'    => 32,
		'nullable'  => true,
		'comment'   => 'Shows what entity history is bind to.'
));

// Invoice Comment
$installer->getConnection()->addColumn(
	$installer->getTable('sales/invoice_comment'),
	'username',
	array(
	    'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
	    'length'    => 150,
	    'nullable'  => true,
	    'comment'   => 'Admin username'
));

// Credit Memo Comment
$installer->getConnection()->addColumn(
	$installer->getTable('sales/creditmemo_comment'),
	'username',
	array(
    'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
    'length'    => 150,
    'nullable'  => true,
    'comment'   => 'Admin username'
));

// Shipment Comment
$installer->getConnection()->addColumn(
	$installer->getTable('sales/shipment_comment'),
	'username',
	array(
    'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
    'length'    => 150,
    'nullable'  => true,
    'comment'   => 'Admin username'
));

$installer->endSetup();