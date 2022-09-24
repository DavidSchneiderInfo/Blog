# Blog

A blog made with Laravel.

## Setup

You will require Docker on your system.

### Install requirements and prepare environment.

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

cp .env.example .env
sail up -d
sail artisan key:generate
sail npm install
sail npm run build
sail artisan migrate --seed
```

### Install git hook to enforce coding standards before commits

```bash
sail php artisan vendor:publish --provider="Mreduar\LaravelPhpcs\LaravelPhpcsServiceProvider" --tag="hook"
chmod +x .git/hooks/pre-commit
```

### Start environment

```bash
sail up -d
```

### Manually check/fix coding standards

```bash
sail php vendor/bin/phpcs
sail php vendor/bin/phpcbf
```