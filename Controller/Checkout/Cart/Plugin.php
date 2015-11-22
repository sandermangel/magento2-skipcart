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

class Plugin
{

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_config;

    /**
     * @var \Magento\Framework\Url
     */
    protected $_url;

    /**
     * @param ScopeConfigInterface $config
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $config,
        \Magento\Framework\Url $url
    ) {
        $this->_config = $config;
        $this->_url = $url;
    }

    /**
     * Get resolved back url, rewritten to return checkout URL instead of cart url
     *
     * @param \Magento\Checkout\Controller\Cart\Add $subject
     * @return string
     */
    public function afterExecute(
        \Magento\Checkout\Controller\Cart\Add $subject,
        \Magento\Framework\Controller\Result\Redirect $redirect
    ) {
        $shouldRedirectToCart = $this->_config->getValue(
            'checkout/cart/redirect_to_cart',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if ($shouldRedirectToCart && !$subject->getRequest()->getParam('in_cart')) {
            $redirect->setUrl($this->_url->getUrl('checkout/index/index'));
        }

        return $redirect;
    }
}