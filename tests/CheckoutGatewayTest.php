<?php

namespace Omnipay\Razorpay\Tests;

use Omnipay\Tests\GatewayTestCase;
use Omnipay\Razorpay\CheckoutGateway;

class GatewayTest extends GatewayTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->gateway = new CheckoutGateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->setKeyID('random_key_id');
        $this->gateway->setKeySecret('random_key_secret');
    }

    public function testPurchase(): void
    {
        $request = $this->gateway->purchase(['amount' => '10.00']);

        $this->assertInstanceOf('\Omnipay\Razorpay\Message\PurchaseRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }

    public function testCompletePurchase(): void
    {
        $request = $this->gateway->completePurchase();

        $this->assertInstanceOf('\Omnipay\Razorpay\Message\CompletePurchaseRequest', $request);
    }

    public function testGetDefaultParameters(): void
    {
        $parameters = $this->gateway->getDefaultParameters();

        $this->assertSame($parameters['key_id'], '');
        $this->assertSame($parameters['key_secret'], '');
    }

    public function testGetKeyId(): void
    {
        $keyId = $this->gateway->getKeyID();

        $this->assertSame($keyId, 'random_key_id');
    }

    public function testGetKeySecret(): void
    {
        $keySecret = $this->gateway->getKeySecret();

        $this->assertSame($keySecret, 'random_key_secret');
    }
}
