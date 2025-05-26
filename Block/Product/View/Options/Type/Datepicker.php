<?php
namespace Magelearn\CustomOption\Block\Product\View\Options\Type;

use Magento\Catalog\Block\Product\View\Options\AbstractOptions;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Helper\Data as CatalogHelper;
use Magento\Framework\Json\EncoderInterface;
use Magento\Framework\Pricing\Helper\Data as PricingHelper;

class Datepicker extends AbstractOptions
{
    /**
     * @var EncoderInterface
     */
    protected $jsonEncoder;

    /**
     * @var PricingHelper
     */
    protected $pricingHelper;

    public function __construct(
        Context $context,
        PricingHelper $pricingHelper,
        CatalogHelper $catalogData,
        EncoderInterface $jsonEncoder,
        array $data = []
    ) {
        $this->jsonEncoder = $jsonEncoder;
        $this->pricingHelper = $pricingHelper;
        parent::__construct($context, $pricingHelper, $catalogData, $data);
    }

    /**
     * Get formatted price for the option
     *
     * @return string
     */
    public function getFormattedPrice()
    {
        $option = $this->getOption();
        $price = $option->getPrice();
        
        if ($price > 0) {
            $priceType = $option->getPriceType();
            $formattedPrice = $this->pricingHelper->currency($price, true, false);
            
            if ($priceType == 'percent') {
                return '+' . $price . '%';
            } else {
                return '+' . $formattedPrice;
            }
        }
        
        return '';
    }

    /**
     * Get default value for the datepicker
     *
     * @return string
     */
    public function getDefaultValue()
    {
        $option = $this->getOption();
        $defaultValue = $option->getDefaultValue();
        
        // You can add logic here to format the default date if needed
        return $defaultValue ?: '';
    }

    /**
     * Get datepicker configuration as JSON
     *
     * @return string
     */
    public function getDatepickerConfig()
    {
        $config = [
            'dateFormat' => 'mm/dd/yy',
            'showTime' => false,
            'required' => $this->getOption()->getIsRequire(),
            'buttonText' => __('Select Date'),
            'yearRange' => 'c-10:c+10'
        ];

        return $this->jsonEncoder->encode($config);
    }
}