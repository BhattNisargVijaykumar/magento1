<?php
class Nb_Vendor_Block_Adminhtml_Vendor_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
  public function __construct()
  {
    parent::__construct();
    //$this->setId('edit_tabs');
    $this->setDestElementId('edit_form');
    $this->setTitle(Mage::helper('vendor')->__('Information'));
  }

   public function getVendor()
    {
        return Mage::registry('vendor_data');
    }

  protected function _beforeToHtml()
  {
    $vendorAttributes = Mage::getResourceModel('eav/entity_attribute_collection')->setEntityTypeFilter(Mage::getModel('eav/entity')->setType('vendor')->getTypeId());
        if (!$this->getVendor()->getId()) 
        {
            foreach ($vendorAttributes as $attribute) 
            {
               /* echo "<pre>";
                print_r($attribute);*/
                $default = $attribute->getDefaultValue();
                if ($default != null) 
                {
                    $this->getVendor()->setData($attribute->getAttributeCode(), $default);
                }
            }
        }

        $attributeSetId = $this->getVendor()->getResource()->getEntityType()->getDefaultAttributeSetId();
        //echo "<pre>"; print_r($attributeSetId);  exit();

        $groupCollection = Mage::getResourceModel('eav/entity_attribute_group_collection')
                ->setAttributeSetFilter($attributeSetId)
                ->setSortOrder()
                ->load();
     
        $defaultGroupId = 0;
        foreach ($groupCollection as $group) 
        {
            if ($defaultGroupId == 0 || $group->getIsDefault())
             {
                $defaultGroupId = $group->getId();
            }
            $attributes = [];
            foreach ($vendorAttributes as $attribute) 
            {
                   /* echo "<pre>";
                    print_r($group->getId());
                    echo "<br>";*/
                    //print_r($group->getId());
                if ($this->getVendor()->checkInGroup($attribute->getId(),$attributeSetId, $group->getId())) 
                {
                    $attributes[] = $attribute;
                }
            }   
            

            if (!$attributes) {
                continue;
            }

            $active = $defaultGroupId == $group->getId();


            $block = $this->getLayout()->createBlock('vendor/adminhtml_vendor_edit_tab_attributes')
                ->setGroup($group)
                ->setAttributes($attributes)
                ->setAddHiddenFields($active)
                ->toHtml();
                    /*echo "<pre>";
                    echo "asdd";
                   print_r($attributes);*/

            $this->addTab('group_' . $group->getId(), [
                'label' => Mage::helper('vendor')->__($group->getAttributeGroupName()),
                'content' => $block,
            ]);
        }    
        return parent::_beforeToHtml();
    }
}
 