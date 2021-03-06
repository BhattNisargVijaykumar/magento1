<?php

$installer = $this;

$installer->startSetup();

$installer->addAttribute('catalog_product', 'nisarg', array(
        'type'              => 'varchar',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'Nisarg',
        'input'             => 'text',
        'class'             => '',
        'source'            => '',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => false,
        'required'          => false,
        'user_defined'      => false,
        'default'           => '',
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => '',
        'is_configurable'   => false
    ));

// $installer->run("

//     -- DROP TABLE IF EXISTS {$this->getTable('salesman')};
//     CREATE TABLE {$this->getTable('salesman')} (
//     `salesmanId` int(11) unsigned NOT NULL auto_increment,
//     `name` varchar(255) NOT NULL default '',
//     `email` varchar(255) NOT NULL default '',
//     PRIMARY KEY (`salesmanId`)
//     ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

//     ");

$installer->endSetup();
