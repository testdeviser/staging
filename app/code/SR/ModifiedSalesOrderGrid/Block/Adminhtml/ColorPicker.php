<?php
namespace SR\ModifiedSalesOrderGrid\Block\Adminhtml;

class ColorPicker extends \Magento\Config\Block\System\Config\Form\Field
{
    public function __construct(
    \Magento\Backend\Block\Template\Context $context, array $data = []
    ) {
        parent::__construct($context, $data);
    }

    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) {
        $html = $element->getElementHtml();
        $value = $element->getData('value');
        return $html;
    }

}