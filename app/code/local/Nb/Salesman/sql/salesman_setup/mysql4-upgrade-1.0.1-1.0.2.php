<?php

$installer = $this;

$installer->startSetup();

$installer->addAttribute('catalog_product', 'first_name', array(
        'type'              => 'varchar',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'First Name',
        'input'             => 'text',
        'class'             => '',
        'source'            => '',
        'global'            => true,
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

// $installer->updateAttribute('catalog_product', 'nisarg', 'frontend_input', 'media_image');

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
