<?php 
class Nb_Product_Block_Adminhtml_Product_Index_Gallery_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form(array(
			'id' => 'gallery_form',
			'action' => $this->getUrl('*/*/save',array('id' => $this->getRequest()->getParam('id'))),
			'method' => 'post',
		));
		$this->setForm($form);
		$fieldset = $form->addFieldset('product_form',array('legend' => Mage::helper('product')->__('Gallery Information')));

		$fieldset->addField('image_id','text',array(
			'label' => Mage::helper('product')->__('Image Id'),
			'class' => 'required-entry',
			'name' => 'image_id',
		));

		$fieldset->addField('product_id','text',array(
			'label' => Mage::helper('product')->__('Product Id'),
			'name' => 'product_id',
		));

		$fieldset->addField('image','text',array(
			'label' => Mage::helper('product')->__('Image'),
			'name' => 'image',
		));

		$fieldset->addField('quantity','text',array(
			'label' => Mage::helper('product')->__('Quantity'),
			'name' => 'quantity',
		));	

		$fieldset->addField('status', 'select', array(
                'name'      => 'status',
                'label'     => Mage::helper('product')->__('Status'),
                'id'        => 'status',
                'title'     => Mage::helper('product')->__('Status'),
                'class'     => 'input-select',
                'style'        => 'width: 80px',
                'options'    => array('1' => Mage::helper('salesman')->__('Enabled'), '2' => Mage::helper('salesman')->__('Disabled')),
        ));


        if ( Mage::getSingleton('adminhtml/session')->getSalesmanData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getSalesmanData());
            Mage::getSingleton('adminhtml/session')->setProData(null);
        } elseif ( Mage::registry('product_data') ) {
            $form->setValues(Mage::registry('product_data')->getData());
        }

        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
	}
}