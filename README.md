## Introduction

## Requirements

+ PHP 7 or above
+ Laravel 5.4 or above

## Installation

Install the package directly from the command line using the following command.

```bash
composer require "andreaselia/laravel-forum"
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

After publishing, the forum config file can be found under config/forum.php where you can modify the package configuration.
