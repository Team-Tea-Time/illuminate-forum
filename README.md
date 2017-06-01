## Introduction

## Requirements

+ PHP 7 or above
+ Laravel 5.4 or above

## Installation

Add `andreaselia/laravel-forum` to `composer.json`.

```json
{
    "require": {
        "andreaselia/laravel-forum": "1.*"
    }
}
```

Run `composer update` to pull down the latest version of Laravel Forum.

Alternatively, install it directly from the command line.

```bash
composer require "andreaselia/laravel-forum:1.*"
```

Next open up `config/app.php` and add the following under the package providers section.

```php
AndreasElia\Forum\ForumServiceProvider::class,
```

## Assets

Run the following command to publish the migrations and config file.

```bash
php artisan vendor:publish --provider="AndreasElia\Forum\ForumServiceProvider"
```

## Migrations
Run the following command to migrate Laravel Forum after publishing the assets.

```bash
php artisan migrate
```

## Configuration
