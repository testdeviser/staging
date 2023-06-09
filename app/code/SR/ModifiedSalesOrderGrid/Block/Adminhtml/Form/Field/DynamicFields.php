<?php
namespace SR\ModifiedSalesOrderGrid\Block\Adminhtml\Form\Field;

class DynamicFields extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{
    /**
     * @var Inputgroup
     */
    protected $_groupRenderer;
	protected $colorRenderer;

    /**
     * Retrieve group column renderer
     *
     * @return Inputgroup
     */
    protected function _getGroupRenderer()
    {
        if (!$this->_groupRenderer) {
            $this->_groupRenderer = $this->getLayout()->createBlock(
                \SR\ModifiedSalesOrderGrid\Block\Adminhtml\Form\Field\DropdownValues::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
            $this->_groupRenderer->setClass('dropdown_group_select');
        }
        return $this->_groupRenderer;
    }
	
	private function getColorRenderer()
    {
        if (!$this->colorRenderer) {
            $this->colorRenderer = $this->getLayout()->createBlock(
                \SR\ModifiedSalesOrderGrid\Block\Adminhtml\ColorRenderer::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->colorRenderer;
}

    /**
     * Prepare to render
     *	
     * @return void
     */
    protected function _prepareToRender()
    {
		$this->addColumn(
            'order_status',
            ['label' => __('Order Status'),'size' => '200px',
                'renderer' => $this->_getGroupRenderer(),'class' => 'required-entry']
        );
		$this->addColumn('background_color', ['label' => __('Background Color'),'size' => '30px', 'renderer' => $this->getColorRenderer()]);
		$this->addColumn('text_color', ['label' => __('Text Color'),'renderer' => $this->getColorRenderer()]);
		$this->addColumn('background_color_hover', ['label' => __('Background color hover'),'renderer' => $this->getColorRenderer()]);
		$this->addColumn('text_color_hover', ['label' => __('Text color hover'),'renderer' => $this->getColorRenderer()]);        
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Order Status');
    }

    /**
     * Prepare existing row data object
     *
     * @param \Magento\Framework\DataObject $row
     * @return void
     */
    protected function _prepareArrayRow(\Magento\Framework\DataObject $row)
    {
        $optionExtraAttr = [];
        $optionExtraAttr['option_' . $this->_getGroupRenderer()->calcOptionHash($row->getData('order_status'))] =
            'selected="selected"';
        $row->setData(
            'option_extra_attrs',
            $optionExtraAttr
        );
    }
	
	
	
}