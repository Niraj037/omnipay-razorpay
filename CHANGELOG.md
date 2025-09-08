# Changelog

All notable changes to this project will be documented in this file.

## [3.0.0] - 2025-09-08

### Added
- Full support for Omnipay v3
- PHP 7.1+ type hints throughout the codebase
- Improved type safety with strict typing
- Enhanced documentation with upgrade notes

### Changed
- **BREAKING**: Minimum PHP version increased to 7.1
- **BREAKING**: All method signatures now include type hints
- **BREAKING**: Test methods now use `setUp(): void` instead of `setUp()`
- Updated all classes to use modern PHP syntax (short array syntax, etc.)
- Upgraded PHPUnit to version 6+ compatibility
- Improved signature verification with better error handling
- Updated README with v3 usage examples

### Removed
- **BREAKING**: Removed deprecated `redirect()` method override in PurchaseResponse
- Removed Mockery test listener from PHPUnit configuration (no longer needed in PHPUnit 6+)
- Removed `syntaxCheck` from PHPUnit configuration (deprecated)

### Fixed
- Fixed array index access bug in CompletePurchaseResponse::hash_equals()
- Improved secure string comparison implementation
- Better PSR-7 compliance preparation

### Dependencies
- Updated `omnipay/common` to `^3.0`
- Updated `omnipay/tests` to `^3.0`
- Updated `razorpay/razorpay` to `^2.0`
- Added `phpunit/phpunit` version constraints for better compatibility

## [2.x] - Previous Versions
- See Git history for changes in v2.x series
