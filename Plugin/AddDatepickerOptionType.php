<?php
namespace Magelearn\CustomOption\Plugin;

class AddDatepickerOptionType
{
    public function afterGetAllTypes(
        \Magento\Catalog\Model\Product\Option\TypeFactory $subject,
        array $result
    ) {
        $result['datepicker'] = \Magelearn\CustomOption\Model\Product\Option\Type\Datepicker::class;
        return $result;
    }
}
