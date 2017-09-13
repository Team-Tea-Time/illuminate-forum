## Laravel Firefly

[![Build Status](https://travis-ci.org/bitporch/laravel-firefly.svg?branch=master)](https://travis-ci.org/bitporch/laravel-firefly)
[![Total Downloads](https://poser.pugx.org/bitporch/laravel-firefly/downloads)](https://packagist.org/packages/bitporch/laravel-firefly)
[![License](https://poser.pugx.org/bitporch/laravel-firefly/license)](https://packagist.org/packages/bitporch/laravel-firefly)

This package allows you to easily add a simple forum to your application whilst also supporting ease of use and expansion.

## Features

+ Very flexible usage, very easy to expand upon

## Installation

Install the package directly from the command line using the following command.

```bash
composer require "bitporch/laravel-firefly"
```

## Migrations
Setup your database in your `.env` file and run the migrations.

```bash
php artisan migrate
```

## Assets

Run the following command to publish the migrations and config file.

```bash
php artisan vendor:publish --provider="Bitporch\Firefly\FireflyServiceProvider"
```

## Traits

Next up you'll need to add the `FireflyUser` trait to your `User` model.

```php
<?php

namespace App;

use Bitporch\Firefly\Traits\FireflyUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use FireflyUser;
}
```

## Configuration

After publishing, the firefly config file can be found under `config/firefly.php` where you can modify the package configuration.
