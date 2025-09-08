# Omnipay: Razorpay

[![Travis branch](https://travis-ci.org/razorpay/omnipay-razorpay.svg?branch=master)]()
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<!-- [![Packagist](https://img.shields.io/packagist/v/symfony/symfony.svg)]() -->

**Razorpay driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP. This package implements Razorpay support for Omnipay v3.

To know more about Razorpay payment flow and steps involved, please read up here:
<https://docs.razorpay.com/docs>

## Requirements
`PHP >= 7.1.0` (for PHP 5.6 support, use v2.x of this package)

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "razorpay/omnipay-razorpay": "^3.0"
    }
}
```

And run composer to update your dependencies:

	$ composer update

## Basic Usage

The following gateways are provided by this package:

* Razorpay_Checkout

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

### Example Usage

```php
use Omnipay\Omnipay;

// Create a gateway for the Razorpay Checkout Gateway
$gateway = Omnipay::create('Razorpay_Checkout');

// Initialise the gateway
$gateway->initialize([
    'key_id' => 'Your Razorpay Key ID',
    'key_secret' => 'Your Razorpay Key Secret',
]);

// Create a purchase request
$purchaseRequest = $gateway->purchase([
    'amount' => '10.00',
    'currency' => 'INR',
    'card' => $card,
]);

$response = $purchaseRequest->send();

if ($response->isRedirect()) {
    // Redirect to offsite payment gateway
    $response->redirect();
} else {
    // Payment failed
    echo $response->getMessage();
}
```

## Upgrade Notes (v2 to v3)

This version upgrades the package to support Omnipay v3, which includes:

- **PHP 7.1+ requirement**: Updated minimum PHP version for better type safety
- **Type hints**: Added strict type hints throughout the codebase
- **PSR-7 HTTP**: Better HTTP message handling (though this gateway doesn't make external HTTP calls)
- **Testing improvements**: Upgraded to PHPUnit 6+ standards

### Breaking Changes from v2

- Minimum PHP version is now 7.1
- All method signatures now include type hints
- `setUp()` methods in tests changed to `setUp(): void`
- Removed deprecated `redirect()` method override (now handled by Omnipay core)

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release announcements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/razorpay/omnipay-razorpay),
or better yet, fork the library and submit a pull request.
