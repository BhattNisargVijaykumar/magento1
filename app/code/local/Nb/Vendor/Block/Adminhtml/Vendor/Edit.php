<?php
class Nb_Vendor_Block_Adminhtml_Vendor_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{

    public function __construct()
    {
        $this->_blockGroup = 'vendor';
        $this->_controller = 'adminhtml_vendor';
        $this->_headerText = 'Edit Vendor';
        parent::_construct();
    }
    
    /*public function getHeaderText()
    {
        $model = Mage::registry('current_vendor');
        if ($model->getId()) 
        {
            return Mage::helper('vendor')->__("Edit vendor");
        } 
        else 
        {
            return Mage::helper('vendor')->__("Add new vendor");
        }
    }*/
}