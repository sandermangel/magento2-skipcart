<?php
/**
 * Sama_Skipcart extension
 *
 * @package   Sama_Skipcart
 * @copyright 2015 Sander Mangel
 * @license   OSL-3.0 - See LICENSE.md for license details.
 * @author    Sander Mangel <sander@sandermangel.nl>
 */
namespace Sama\Skipcart\Controller\Checkout\Cart;

class Add extends \Magento\Checkout\Controller\Cart\Add
{

    /**
     * Get resolved back url, rewritten to return checkout URL instead of cart url
     *
     * @param null $defaultUrl
     *
     * @return mixed|null|string
     */
    protected function getBackUrl($defaultUrl = null)
    {
        $shouldRedirectToCart = $this->_scopeConfig->getValue(
            'checkout/cart/redirect_to_cart',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if ($shouldRedirectToCart && !$this->getRequest()->getParam('in_cart')) {
            return $this->_url->getUrl('checkout/index/index');
        } else {
            return parent::getBackUrl($defaultUrl);
        }
    }
}