# Migration Guide: Omnipay Razorpay v2 to v3

This guide helps you migrate your application from Omnipay Razorpay v2 to v3.

## Requirements

- **PHP Version**: Minimum PHP 7.1 (previously 5.6)
- **Omnipay**: Version 3.0+ (previously 2.x)

## Installation Changes

### Composer Dependencies

**Before (v2):**
```json
{
    "require": {
        "razorpay/omnipay-razorpay": "~2.0"
    }
}
```

**After (v3):**
```json
{
    "require": {
        "razorpay/omnipay-razorpay": "^3.0"
    }
}
```

## Code Changes

### Gateway Usage

The basic gateway usage remains the same:

```php
use Omnipay\Omnipay;

// This works the same in both v2 and v3
$gateway = Omnipay::create('Razorpay_Checkout');
$gateway->initialize([
    'key_id' => 'Your_Key_ID',
    'key_secret' => 'Your_Key_Secret',
]);

$request = $gateway->purchase([
    'amount' => '10.00',
    'currency' => 'INR',
    'card' => $card,
]);

$response = $request->send();
```

### Type Safety Improvements

v3 introduces strict type hints. While this shouldn't affect your application code directly, it provides better IDE support and catches errors at development time.

### Testing Changes

If you're extending or testing this gateway:

**Before (v2):**
```php
class MyTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        // setup code
    }
    
    public function testSomething()
    {
        // test code
    }
}
```

**After (v3):**
```php
class MyTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // setup code
    }
    
    public function testSomething(): void
    {
        // test code
    }
}
```

## HTTP Client Changes

While this Razorpay gateway doesn't make external HTTP requests (it's a redirect gateway), if you're creating custom request classes, note that Omnipay v3 uses HTTPlug instead of Guzzle directly.

## Potential Issues

### PHP Version
- Ensure your server runs PHP 7.1 or higher
- Check all dependencies are compatible with PHP 7.1+

### Static Analysis
- If using static analysis tools (PHPStan, Psalm), they'll now catch more potential issues due to type hints

### PHPUnit
- If running tests, ensure PHPUnit 6+ is installed
- Update any custom test classes to use void return types

## Benefits of Upgrading

1. **Better Performance**: PHP 7.1+ provides significant performance improvements
2. **Type Safety**: Strict typing catches errors at development time
3. **Modern PHP**: Uses contemporary PHP features and best practices
4. **Future Compatibility**: Prepared for upcoming Omnipay improvements
5. **Security**: Updated dependencies with latest security patches

## Testing Your Migration

1. Update your `composer.json`
2. Run `composer update`
3. Test your payment flows in development
4. Run your test suite
5. Verify signature verification still works correctly

## Support

If you encounter issues during migration:

1. Check that all dependencies support PHP 7.1+
2. Review the changelog for breaking changes
3. Test in a development environment first
4. Report bugs via GitHub issues
