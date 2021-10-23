<!-- markdownlint-disable no-inline-html -->
<p align="center">
  <br><br>
  <img src="https://leaf-docs.netlify.app/images/logo.png" height="100"/>
  <h1 align="center">Leaf Router</h1>
  <br><br>
</p>

# Leaf Router (Module)

[![Latest Stable Version](https://poser.pugx.org/leafs/router/v/stable)](https://packagist.org/packages/leafs/router)
[![Total Downloads](https://poser.pugx.org/leafs/router/downloads)](https://packagist.org/packages/leafs/router)
[![License](https://poser.pugx.org/leafs/router/license)](https://packagist.org/packages/leafs/router)

Leaf router is the core routing engine which powers the Leaf PHP framework. Leaf router is now served as a serve-yourself module which can even be used outside the Leaf ecosystem.

**Leaf Router is still built into Leaf Core and doesn't need to be installed separately.**

## Installation

You can easily install Leaf router using [Composer](https://getcomposer.org/).

```bash
composer require leafs/leaf
```

This will install Leaf in your project directory.

## Basic Usage

This is a simple demonstration of Leaf's simplicity.
After [installing](#installation) Leaf, create an _index.php_ file.

```php
<?php
require __DIR__ . "vendor/autoload.php";

$app = new Leaf\App;
$auth = new Leaf\Auth;

$auth->connect("host", "user", "pass", "db name");

// Base example
$app->get("/", function() use($app) {
  $app->response()->json([
    "message" => "Welcome!"
  ]);
});

// Full login example
$app->post("/auth/login", function() use($app, $auth) {
  $credentials = $app->request()->get(["username", "password"]);

  $user = $auth->login("users", $credentials, [
    "username" => ["username", "max:15"],
    "password" => ["text", "NoSpaces", "min:8"],
  ]);

  if (!$user) {
    $app->response()->throwErr($auth->errors());
  }

  $app->response()->json($user);
});

$app->run();
```

You may quickly test this using the built-in PHP server:

```bash
php -S localhost:8000
```

**You can view the full documentation [here](https://leafphp.netlify.app/#/)**

## Our contributors

And to all our contributors, we love you all ❤️

<a href="https://github.com/leafsphp/leaf/graphs/contributors" target="_blank"><img src="https://opencollective.com/leaf/contributors.svg?width=890" /></a>

## View Leaf's docs [here](https://leafphp.netlify.app/#/)

Built with ❤ by [**Mychi Darko**](https://mychi.netlify.app)
