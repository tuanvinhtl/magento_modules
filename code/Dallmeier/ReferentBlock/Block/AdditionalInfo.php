<?php

namespace Dallmeier\ReferentBlock\Block;

use Magento\Framework\View\Element\Template;

class AdditionalInfo extends Template
{

    protected $customerSession;
    protected $customerRepositoryInterface;
        /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\Http\Context $httpContext
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
        array $data = []
    ) {

        parent::__construct($context, $data);
        $this->httpContext = $httpContext;
        $this->customerRepositoryInterface = $customerRepositoryInterface;
        $this->customerSession = $customerSession;
    }

    public function _prepareLayout()
    {
        $customer = $this->customerRepositoryInterface->getById($this->customerSession->getCustomer()->getId());
        $customerAttributeData = $customer->__toArray();
        return $customerAttributeData['custom_attributes'] ;
    }
    
}

