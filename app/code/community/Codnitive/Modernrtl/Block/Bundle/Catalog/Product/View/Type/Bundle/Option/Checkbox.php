<?php
/**
 * CODNITIVE
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE_EULA.html.
 * It is also available through the world-wide-web at this URL:
 * http://www.codnitive.com/en/terms-of-service-softwares/
 * http://www.codnitive.com/fa/terms-of-service-softwares/
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @category   Codnitive
 * @package    Codnitive_Modernrtl
 * @author     Hassan Barza <support@codnitive.com>
 * @copyright  Copyright (c) 2012 CODNITIVE Co. (http://www.codnitive.com)
 * @license    http://www.codnitive.com/en/terms-of-service-softwares/ End User License Agreement (EULA 1.0)
 */

/**
 * Bundle option renderer
 *
 * @category   Codnitive
 * @package    Codnitive_Modernrtl
 * @author     Hassan Barza <support@codnitive.com>
 */
class Codnitive_Modernrtl_Block_Bundle_Catalog_Product_View_Type_Bundle_Option_Checkbox 
    extends Mage_Bundle_Block_Catalog_Product_View_Type_Bundle_Option_Checkbox
{
    public function getSelectionQtyTitlePrice($_selection, $includeContainer = true)
    {
        $config = Mage::getModel('modernrtl/config');
        if (!$config->isSetTemplate()) {
            return parent::getSelectionQtyTitlePrice($_selection, $includeContainer);
        }
        
        $price = $this->getProduct()->getPriceModel()->getSelectionPreFinalPrice($this->getProduct(), $_selection);
        $this->setFormatProduct($_selection);
        $priceTitle = '<span class="bundle-option-title"><span class="bundle-option-title">' . $_selection->getSelectionQty()*1 . '&nbsp;x&nbsp;</span>' . $this->escapeHtml($_selection->getName()) . '</span>';

        $priceTitle .= ' &nbsp; ' . ($includeContainer ? '<span class="price-notice">' : '')
            . '+' . $this->formatPriceString($price, $includeContainer)
            . ($includeContainer ? '</span>' : '');

        return  $priceTitle;
    }
    
}
