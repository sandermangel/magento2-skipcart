<?php
/**
 * Sama_Skipcart extension
 *
 * @package   Sama_Skipcart
 * @copyright 2015 Sander Mangel
 * @license   OSL-3.0 - See LICENSE.md for license details.
 * @author    Sander Mangel <sander@sandermangel.nl>
 */
namespace Sama\Skipcart\Test\Unit\Controller\Checkout\Cart;

use Sama\Skipcart\Controller\Checkout\Cart\Add;
use Magento\Framework\Url;

/**
 * Class AddTest
 *
 * @package Sama\Skipcart\Test\Unit\Controller\Checkout\Cart
 */
class AddTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var _controller
     */
    private $_controller;

    /**
     * Set up test class
     */
    public function setUp()
    {
        parent::setUp();
        $this->_controller = new Add();
    }

    /**
     * @test
     */
    public function redirectUrl()
    {
        $result = $this->_controller->getBackUrl(null);

        $url = new \Magento\Framework\Url;
        $expected = $url->getUrl('checkout/index/index');

        $this->assert($expected, $result);
    }
}