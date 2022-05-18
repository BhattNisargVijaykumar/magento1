<?php
 class Nb_Vendor_Model_Vendor extends Mage_Core_Model_Abstract
 {
 	protected $_attributes;
 	protected function _construct()
 	{
 		$this->_init('vendor/vendor');
		parent::_construct();
 	}

 	public function getAttributes() {
		if ($this->_attributes === null) {
			$this->_attributes = $this->_getResource()
				->loadAllAttributes($this)
				->getSortedAttributes();
		}
		return $this->_attributes;
	}

 	public function checkInGroup($attributeId, $setId, $groupId) {
		$resource = Mage::getSingleton('core/resource');

		/*print_r($attributeId); echo "<br>";
		print_r($setId); echo "<br>";
		print_r($groupId);*/

		$readConnection = $resource->getConnection('core_read');

		$query = "SELECT * FROM
			{$resource->getTableName('eav/entity_attribute')}
			WHERE `attribute_id` = '{$attributeId}'
			AND `attribute_group_id` = '{$groupId}'
			AND `attribute_set_id` = '{$setId}'";
		$result = $readConnection->fetchRow($query);
		/*print_r($result);
		exit();*/

		if ($result) {

			return true;
		}
		//echo "false";
		return false;
	}
 }