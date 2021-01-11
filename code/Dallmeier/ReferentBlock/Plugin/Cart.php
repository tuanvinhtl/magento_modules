<?php
namespace Dallmeier\ReferentBlock\Plugin;

class Cart
{
    public function __construct()
    {
        
    }


    public function beforeAddProduct(\Magento\Checkout\Model\Cart $subject, $productInfo, $requestInfo = null)
    {
        var_dump($productInfo);
        exit;
        $requestInfo['qty']=10;
        return array($productInfo,$requestInfo );

    }

}
