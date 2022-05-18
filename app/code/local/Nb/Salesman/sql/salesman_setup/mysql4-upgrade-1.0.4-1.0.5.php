<?php

$installer = $this;

$installer->startSetup();

$installer->updateAttribute('catalog_product', 'nisarg', 'scope', 'website');

$installer->endSetup();
