<?php

namespace Omnipay\Razorpay;

use Omnipay\Common\AbstractGateway;

/**
 * Razorpay Payment Gateway
 */
class CheckoutGateway extends AbstractGateway
{
    // Gateway name
    public function getName(): string
    {
        return 'Razorpay';
    }

    public function getDefaultParameters(): array
    {
        return [
            'key_id' => '',
            'key_secret' => ''
        ];
    }

    public function getKeyID(): ?string
    {
        return $this->getParameter('key_id');
    }

    public function setKeyID(string $value): self
    {
        return $this->setParameter('key_id', $value);
    }

    public function getKeySecret(): ?string
    {
        return $this->getParameter('key_secret');
    }

    public function setKeySecret(string $value): self
    {
        return $this->setParameter('key_secret', $value);
    }

    /**
     * Creating the Purchase Request
     */
    public function purchase(array $options = []): \Omnipay\Common\Message\RequestInterface
    {
        return $this->createRequest('\Omnipay\Razorpay\Message\PurchaseRequest', $options);
    }

    /**
     * Verifying the Purchase Request
     */
    public function completePurchase(array $options = []): \Omnipay\Common\Message\RequestInterface
    {
        $options['key_secret'] = $this->getKeySecret();
        return $this->createRequest('\Omnipay\Razorpay\Message\CompletePurchaseRequest', $options);
    }
}
