<?php
// examples/usage.php

require_once __DIR__ . '/../vendor/autoload.php';

use HelloWorldPackage\HelloWorld;

// Instantiate the HelloWorld class
$helloWorld = new HelloWorld();

// Use the sayHello method
echo $helloWorld->sayHello() . PHP_EOL;
?>