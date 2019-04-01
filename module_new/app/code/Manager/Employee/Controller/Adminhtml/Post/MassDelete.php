<?php
namespace Manager\Employee\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Manager\Employee\Model\ResourceModel\Post\CollectionFactory;
use Magento\Ui\Component\MassAction\Filter;

/**
 * Class MassDelete
 */
class MassDelete extends \Magento\Backend\App\Action
{
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    protected $moduleFactory;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        Filter $filter,
        CollectionFactory $module
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->moduleFactory = $module;
        $this->filter = $filter;
        parent::__construct($context);
    }


    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->moduleFactory->create());

        $count = 0;
        foreach ($collection as $child) {
            $child->delete();
            $count++;
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $count));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }
}