<?php

namespace Omnipay\Razorpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Razorpay Purchase Response - implements RedirectResponseInterface, so the constructor is taken care of
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function getRedirectUrl(): string
    {
        return 'https://checkout.razorpay.com/integration/shopify';
    }

    public function getRedirectMethod(): string
    {
        return 'POST';
    }

    public function getRedirectData(): array
    {
        return $this->data;
    }

    public function isRedirect(): bool
    {
        return true;
    }

    public function isSuccessful(): bool
    {
        return false;
    }
}
