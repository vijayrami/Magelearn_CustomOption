<?php

namespace Magelearn\CustomOption\Model\Product\Option\Type;

use Magento\Catalog\Model\Product\Option\Type\DefaultType;

class Datepicker extends DefaultType
{
    /**
     * @var string
     */
    protected $_formattedOptionValue = '';

    /**
     * @inheritdoc
     */
    public function isCustomizedView()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function getOptionTypeId()
    {
        return 'datepicker';
    }
}