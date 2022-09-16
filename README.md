# Blog

A blog made with Laravel.

## Setup

### Start environment

```bash
sail up -d
```

### Run code_sniffer

```bash
sail php vendor/bin/phpcs
sail php vendor/bin/phpcbf
```

### Install git hook

```bash
sail php artisan vendor:publish --provider="Mreduar\LaravelPhpcs\LaravelPhpcsServiceProvider" --tag="hook"
```
