<?php
namespace SR\ModifiedSalesOrderGrid\Block\Adminhtml\Form\Field;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Sales\Model\ResourceModel\Order\Status\CollectionFactory;

/**
 * HTML select element block with customer groups options
 */
class DropdownValues extends \Magento\Framework\View\Element\Html\Select
{
    /**
     * Customer groups cache
     *
     * @var array
     */
    private $_inputGroups;
	protected $orderStatusCollectionFactory;
	protected $_storeConfig;

    /**
     * Flag whether to add group all option or no
     *
     * @var bool
     */
    protected $_addGroupAllOption = true;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Context $context
     * @param GroupManagementInterface $groupManagement
     * @param GroupRepositoryInterface $groupRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Context $context,
		CollectionFactory $orderStatusCollectionFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
		\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
	 $this->orderStatusCollectionFactory = $orderStatusCollectionFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
		 $this->_storeConfig = $scopeConfig;
    }

    /**
     * Retrieve allowed customer groups
     *
     * @param int $groupId return name by customer group id
     * @return array|string
     */
    protected function _getInputTypes($groupId = null)
    {
		 // echo $this->_storeConfig->getValue('demomanagement/additional/customfields');die('test');
        if ($this->_inputGroups === null) {

            // Add your Dropdown values here
             //$this->_inputGroups = array('value 1', 'value 2');
			  $options = $this->orderStatusCollectionFactory->create()->toOptionArray();
        }
		 $this->_inputGroups  = array();
		foreach($options as $v) {
			
			$this->_inputGroups [$v['value']] = $v['label'];
			
		} 
		return $this->_inputGroups;
		
    }
    /**
     * @param string $value
     * @return $this
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml()
    {
        if (!$this->getOptions()) {
            foreach ($this->_getInputTypes() as $inputId => $inputLabel) {
                $this->addOption($inputId, addslashes($inputLabel));
            }
        }
        return parent::_toHtml();
    }
}