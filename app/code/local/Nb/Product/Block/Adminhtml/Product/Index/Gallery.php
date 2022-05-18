<?php
class Nb_Product_Block_Adminhtml_Product_Index_Gallery extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		// $this->setTemplate('product/gallery.phtml');
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
	    $this->addColumn('image_id', array(
	        'header' => Mage::helper('product')->__('Image Id'),
	        'align' => 'right',
	        'index' => 'image_id',
	    ));

	    $this->addColumn('product_id', array(
	        'header' => Mage::helper('product')->__('Product Id'),
	        'index' => 'product_id',
	    ));

	    $this->addColumn('product_picture', array(
	        'header' => Mage::helper('product')->__('Product Picture'),
	        'index' => 'product_picture',
	    ));

		$this->addColumn('name', array(
	        'header' => Mage::helper('product')->__('Name'),
	        'index' => 'name',
	    ));

		$this->addColumn('image', array(
                        'type'                       => 'varchar',
                        'label'                      => 'Base Image',
                        'input'                      => 'media_image',
                        'frontend'                   => 'catalog/product_attribute_frontend_image',
                        'required'                   => false,
                        'sort_order'                 => 1,
                        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                        'group'                      => 'Images',
                    ));
		$this->addColumn('small_image', array(
                        'type'                       => 'varchar',
                        'label'                      => 'Small Image',
                        'input'                      => 'media_image',
                        'frontend'                   => 'catalog/product_attribute_frontend_image',
                        'required'                   => false,
                        'sort_order'                 => 2,
                        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                        'used_in_product_listing'    => true,
                        'group'                      => 'Images',
                    ));
		$this->addColumn('thumbnail', array(
                        'type'                       => 'varchar',
                        'label'                      => 'Thumbnail',
                        'input'                      => 'media_image',
                        'frontend'                   => 'catalog/product_attribute_frontend_image',
                        'required'                   => false,
                        'sort_order'                 => 3,
                        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                        'used_in_product_listing'    => true,
                        'group'                      => 'Images',
                    ));
		$this->addColumn('media_gallery', array(
                        'type'                       => 'varchar',
                        'label'                      => 'Media Gallery',
                        'input'                      => 'gallery',
                        'backend'                    => 'catalog/product_attribute_backend_media',
                        'required'                   => false,
                        'sort_order'                 => 4,
                        'group'                      => 'Images',
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

	    // $this->addColumn('remove', array(
	    //     'header' => Mage::helper('product')->__('Remove'),
	    //     'index' => 'remove',
	    // ));

	    $this->addColumn(
	        'remove',
	        [
	            'type' => 'checkbox',
	            'name' => 'remove',
	            'values' => $this->_getSelectedSlide(),
	            'index' => 'slide_id',
	            'header_css_class' => 'col-select col-massaction',
	            'column_css_class' => 'col-select col-massaction'
	        ]
	    );

	    return parent::_prepareColumns();
	}

	public function _getSelectedSlide()
	{
		return null;
	}

	public function getRowUrl($row)
	{
	    return $this->getUrl('*/*/edit', array('id'=>$row->getId()));
	}

}