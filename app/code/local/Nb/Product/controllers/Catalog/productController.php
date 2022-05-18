<?php
/**
 * Product controller
 *
 * @category   Envato
 * @package    Envato_Catalog
 */
include_once("Mage/Adminhtml/controllers/Catalog/ProductController.php");

class Nb_Product_Catalog_productController extends Mage_Adminhtml_Catalog_ProductController
{
  /**
   * Product view action
   */
  public function indexAction()
  {
    echo "Nisarg Bhatt";
    die();
  }
}