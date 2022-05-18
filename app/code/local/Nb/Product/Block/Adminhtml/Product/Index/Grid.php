<?php
class Nb_Product_Block_Adminhtml_Product_Index_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
        $this->setId('productGrid');
        $this->setDefaultSort('productId');
        $this->setDefaultDir('asc');
        $this->setUseAjax(true);
        $this->setSaveParametersInSession(true);
	}

	protected function _prepareCollection()
	{
	    $collection = Mage::getModel('product/product')->getCollection();
	    $this->setCollection($collection);
	    return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
	    $this->addColumn('productId', array(
	        'header' => Mage::helper('product')->__('Product Id'),
	        'align' => 'right',
	        'index' => 'productId',
	    ));

	    $this->addColumn('name', array(
	        'header' => Mage::helper('product')->__('Name'),
	        'index' => 'name',
	    ));

	    $this->addColumn('sku', array(
	        'header' => Mage::helper('product')->__('Sku'),
	        'index' => 'sku',
	    ));

		$this->addColumn('price', array(
	        'header' => Mage::helper('product')->__('Price'),
	        'index' => 'price',
	    ));

	    $this->addColumn('quantity', array(
	        'header' => Mage::helper('product')->__('Quantity'),
	        'index' => 'quantity',
	    ));

	    $this->addColumn('status', array(
	        'header' => Mage::helper('product')->__('Status'),
	        'index' => 'status',
	        'type'      => 'options',
	        'options'   => array(
                1 => Mage::helper('product')->__('Enabled'),
                2 => Mage::helper('product')->__('Disabled')
            ),
	    ));

	    $this->addColumn('created_date', array(
	        'header' => Mage::helper('product')->__('Created Date'),
	        'index' => 'created_date',
	    ));

	    $this->addColumn('updated_date', array(
	        'header' => Mage::helper('product')->__('Updated Date'),
	        'index' => 'updated_date',
	    ));

        $this->addColumn('action',array(
        		'header'    =>  Mage::helper('product')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('product')->__('Gallery'),
                        'url'       => array('base'=> '*/*/gallery'),
                        'field'     => 'id')
                   )));

	    return parent::_prepareColumns();
	}

	public function getRowUrl($row)
	{
	    return $this->getUrl('*/*/edit', array('id'=>$row->getId()));
	}

}