<?php
class Nb_Product_Adminhtml_productController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction()
	{
		$this->loadLayout()->_setActiveMenu('product/product');
		return $this;
	}

	public function indexAction()
	{
		$this->_initAction();
		// $this->getLayout()->getBlock('content')->append();
		$this->_addContent($this->getLayout()->createBlock('product/adminhtml_product_index'));
		//Mage::dispatchEvent('dispatch_event_testing', array('product' => $model));
		// $helper = Mage::helper('catalog/data');
		// echo '<pre>';
		// print_r($helper);
		// die();
		$this->renderLayout();
	}

	public function galleryAction()
	{
		$this->_initAction();
		// $this->getLayout()->getBlock('content')->append();
		$this->_addContent($this->getLayout()->createBlock('product/adminhtml_product_index_gallery'));
		$this->renderLayout();
	}

	public function editAction()
	{
		$productId = $this->getRequest()->getParam('id');
		$productModel = Mage::getModel('product/product')->load($productId);

		if ($productModel->getId() || $productId == 0) {
			Mage::register('product_data', $productModel);
			$this->loadLayout();
			$this->_setActiveMenu('product/product');
			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
			$this->_addContent($this->getLayout()->createBlock('product/adminhtml_product_index_edit'));
			$this->renderLayout();
		} else {
			$this->_redirect('*/*/');
		}
	}

	public function newAction()
	{
		$this->_forward('edit');
	}

	public function saveAction()
	{
		if ( $this->getRequest()->getPost() ) {
			$id = $this->getRequest()->getParam('id');
			$postData = $this->getRequest()->getPost();
			$model = Mage::getModel('product/product');
			$date = date('Y-m-d H:i:s');
			if ($id) {
				$model->setData($postData)->setId($this->getRequest()->getParam('id'))->setupdatedDate($date);
			}else{
				$model->setData($postData);
				$model->setcreatedDate($date);
			}
			$model->save();
		}
		$this->_redirect('*/*/');
	}

	public function deleteAction()
	{
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$productModel = Mage::getModel('product/product');

				$productModel->setId($this->getRequest()->getParam('id'))
				->delete();

				$this->_redirect('*/*/');
			} catch (Exception $e) {
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}
}