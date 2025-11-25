# Alphavel Logging

> PSR-3 compliant logger with multiple channels

[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.4-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

## ✨ Features

- 📝 **PSR-3 compliant** - Standard logger interface
- 📁 **Multiple channels** - File, stdout, stderr
- 🎯 **Laravel-compatible** - Familiar API
- 🚀 **Swoole-safe** - Coroutine-compatible

## 📦 Installation

```bash
composer require alphavel/logging
```

## 🚀 Quick Start

```php
use Log;

// Log levels (PSR-3)
Log::emergency('System down');
Log::alert('Immediate action needed');
Log::critical('Critical condition');
Log::error('Runtime error');
Log::warning('Warning message');
Log::notice('Normal but significant');
Log::info('Informational message');
Log::debug('Debug information');

// With context
Log::info('User logged in', ['user_id' => 123]);
```

## 📚 Documentation

**Full documentation**: https://github.com/alphavel/documentation/blob/master/packages/logging/README.md

## 📄 License

MIT License
