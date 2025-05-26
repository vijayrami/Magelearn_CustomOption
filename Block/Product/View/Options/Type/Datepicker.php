<?php
// app/code/Magelearn/CustomOption/Block/Product/View/Options/Type/Datepicker.php

namespace Magelearn\CustomOption\Block\Product\View\Options\Type;

use Magento\Catalog\Block\Product\View\Options\AbstractOptions;
use Magento\Framework\View\Element\Template;

class Datepicker extends AbstractOptions
{
    /**
     * @var string
     */
    protected $_template = 'Magelearn_CustomOption::product/view/options/type/datepicker.phtml';

    /**
     * Return html for control element
     *
     * @return string
     */
    public function getValuesHtml()
    {
        // Get the template from this block directly
        return $this->toHtml();
    }
    public function getOption()
    {
        return $this->_option;
    }
}