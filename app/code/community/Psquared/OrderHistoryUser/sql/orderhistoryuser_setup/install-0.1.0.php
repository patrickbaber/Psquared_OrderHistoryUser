<?php

$installer = $this;
$installer->startSetup();
$installer->getConnection()
          ->addColumn(
	          $installer->getTable('sales/order_status_history'),
	          'username',
	          array(
		          'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
		          'length'    => 150,
		          'nullable'  => true,
		          'comment'   => 'Admin username'
	          ));
$installer->endSetup();