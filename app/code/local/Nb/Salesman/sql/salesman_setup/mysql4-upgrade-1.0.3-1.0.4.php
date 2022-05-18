<?php

$installer = $this;

$installer->startSetup();

$installer->addAttribute('catalog_product', 'last_name', array(
        'type'              => 'varchar',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'Last Name',
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

$installer->addAttribute('catalog_product', 'email', array(
        'type'              => 'varchar',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'Email',
        'input'             => 'multiselect',
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

$installer->addAttribute('catalog_product', 'status', array(
        'type'              => 'varchar',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'Status',
        'input'             => 'select',
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

$installer->addAttribute('catalog_product', 'mobile_number', array(
        'type'              => 'varchar',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'Mobile Number',
        'input'             => 'multiselect',
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

$installer->addAttribute('catalog_product', 'discount', array(
        'type'              => 'varchar',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'Discount',
        'input'             => 'price',
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
