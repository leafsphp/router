<!-- markdownlint-disable no-inline-html -->
<!-- markdownlint-disable no-inline-html -->
<p align="center">
  <br><br>
  <img src="https://leafphp.netlify.app/assets/img/leaf3-logo.png" height="100"/>
  <h1 align="center">Leaf Router Module</h1>
  <br><br>
</p>

# Leaf Router

[![Latest Stable Version](https://poser.pugx.org/leafs/router/v/stable)](https://packagist.org/packages/leafs/router)
[![Total Downloads](https://poser.pugx.org/leafs/router/downloads)](https://packagist.org/packages/leafs/router)
[![License](https://poser.pugx.org/leafs/router/license)](https://packagist.org/packages/leafs/router)

Leaf router is the core routing engine which powers the Leaf PHP framework. Leaf router is now served as a serve-yourself module which can even be used outside the Leaf ecosystem.

**Leaf Router is still built into Leaf Core and doesn't need to be installed separately.**

## Installation

You can easily install Leaf using [Composer](https://getcomposer.org/).

```bash
composer require leafs/router
```

## Basic Usage

If you are using leaf router with Leaf, you can build your leaf apps just as you've always done:

```php
<?php
require __DIR__ . "vendor/autoload.php";

// GET example
app()->get("/", function () {
  response()->json([
    "message" => "Welcome!"
  ]);
});

// MATCH example
app()->match("GET", "/test", function () {
  response()->json([
    "message" => "Test!"
  ]);
});

app()->run();
```

If however, you are using leaf router outside of the leaf framework, you simply need to call these methods on the `Leaf\Router` object:

```php
<?php

use Leaf\Router;

require __DIR__ . "vendor/autoload.php";

// GET example
Router::get("/", function () {
  echo json_encode([
    "message" => "Welcome!"
  ]);
});

// MATCH example
Router::match("GET", "/test", function () {
  echo json_encode([
    "message" => "Test!"
  ]);
});

Router::run();
```

You may quickly test this using the built-in PHP server:

```bash
php -S localhost:8000
```

## View temporary docs [here](https://www.leafphp.dev/docs/routing/#router-class)

Built with ❤ by [**Mychi Darko**](https://mychi.netlify.app)
