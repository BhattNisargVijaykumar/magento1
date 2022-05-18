<?php
class Nb_Vendor_Block_Adminhtml_Vendor_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
        // $this->setId('vendorGrid');
        // $this->setDefaultSort('vendorId');
        // $this->setDefaultDir('asc');
        // $this->setUseAjax(true);
        // $this->setSaveParametersInSession(true);
	}

	protected function _prepareCollection()
	{
	    $collection = Mage::getModel('vendor/vendor')->getCollection()
            ->addAttributeToSelect('first_name')
            ->addAttributeToSelect('last_name')
            ->addAttributeToSelect('email')
            ->addAttributeToSelect('mobile')
            ->addAttributeToSelect('status')
            ->addAttributeToSelect('created_date')
            ->addAttributeToSelect('updated_date');
	  $this->setCollection($collection);
	  return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
	    $this->addColumn('entity_id', array(
	        'header' => Mage::helper('vendor')->__('Vendor Id'),
	        'align' => 'right',
	        'index' => 'entity_id',
	    ));

	    $this->addColumn('first_name', array(
		  'header'    => Mage::helper('vendor')->__('First Name'),
		  'index'     => 'first_name',
		));   

		$this->addColumn('last_name', array(
		  'header'    => Mage::helper('vendor')->__('Last Name'),
		  'index'     => 'last_name',
		));

		$this->addColumn('email', array(
		  'header'    => Mage::helper('vendor')->__('Email'),
		  'index'     => 'email',
		));

		$this->addColumn('mobile', array(
		  'header'    => Mage::helper('vendor')->__('Mobile'),
		  'index'     => 'mobile',
		));   

		$this->addColumn('status', array(
          'header'    => Mage::helper('vendor')->__('Status'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'status',
          'type'      => 'options',
          'options'    => array(
                                1 => 'Enable',
                                2 => 'Disable'
                            ),
      	));    

		$this->addColumn('created_date', array(
		  'header'    => Mage::helper('vendor')->__('Created Date'),
		  'index'     => 'created_date',
		));

		$this->addColumn('updated_date', array(
		  'header'    => Mage::helper('vendor')->__('Updated Date'),
		  'index'     => 'updated_date',
		)); 
  
	    return parent::_prepareColumns();
	}

	public function getRowUrl($row)
	{
	    return $this->getUrl('*/*/edit', array('id'=>$row->getId()));
	}

}