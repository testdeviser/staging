<?php
namespace SR\ModifiedSalesOrderGrid\Block\Adminhtml;

class Gridcolors extends \Magento\Backend\Block\Widget\Container
{
    /**
     * @var string
     */
    protected $_template = 'custom.phtml';


    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param array $data
     */
    public function __construct(\Magento\Backend\Block\Widget\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    // Add whatever functions you want to use in your phtml

}