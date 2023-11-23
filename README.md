# HelloWorld Package

This repository contains a simple PHP package that prints "Hello, World!".

## Table of Contents

1. [Project Structure](#step-1-project-structure)
2. [HelloWorld.php](#step-2-helloworldphp)
3. [composer.json](#step-3-composerjson)
4. [Install Dependencies](#step-4-install-dependencies)
5. [Example Usage Script](#step-5-create-example-usage-script)
6. [Run Example Script](#step-6-run-example-script)
7. [Version Control](#step-7-version-control)
8. [Publish Locally](#step-8-publish-locally)
   - [Option 1: Use Local Composer Repository](#option-1-use-local-composer-repository)
   - [Option 2: Use Composer's `path` Repository Type](#option-2-use-composers-path-repository-type)
9. [Publish to Packagist](#step-9-publish-to-packagist)

## Step 1: Project Structure

Create the following project structure:

```
helloworld-package/
|-- src/
|   |-- HelloWorld.php
|-- composer.json
|-- examples/
|   |-- usage.php
|-- LICENSE
|-- README.md
```

## Step 2: HelloWorld.php

Create a simple `HelloWorld.php` class in the `src/` directory:

```php
// src/HelloWorld.php

namespace HelloWorldPackage;

class HelloWorld
{
    public function sayHello()
    {
        return "Hello, World!";
    }
}
```

## Step 3: composer.json

Create a `composer.json` file in the project root:

```json
{
    "name": "your-vendor/helloworld-package",
    "description": "A simple HelloWorld package",
    "type": "library",
    "authors": [
        {
            "name": "Your Name",
            "email": "your.email@example.com"
        }
    ],
    "minimum-stability": "dev",
    "require": {
        "php": ">=7.0.0"
    },
    "autoload": {
        "psr-4": {
            "HelloWorldPackage\\": "src/"
        }
    },
    "license": "MIT",
    "scripts": {
        "test": "phpunit"
    },
    "extra": {
        "branch-alias": {
            "dev-master": "1.0-dev"
        }
    }
}
```

Explanation:
- `"name"`: Replace `your-vendor` with your actual vendor name.
- `"authors"`: Add your name and email.
- `"autoload"`: Configures Composer's autoloader.
- `"scripts"`: This script runs PHPUnit for testing. You can customize it based on your testing needs.
- `"license"`: You can choose a license that suits your project. This example uses the MIT License.

## Step 4: Install Dependencies

In the terminal, navigate to your project directory and run:

```bash
composer install
```

## Step 5: Create Example Usage Script

Create an example script in the `examples/` directory to demonstrate the usage of the package:

```php
// examples/usage.php

require_once __DIR__ . '/../vendor/autoload.php';

use HelloWorldPackage\HelloWorld;

// Instantiate the HelloWorld class
$helloWorld = new HelloWorld();

// Use the sayHello method
echo $helloWorld->sayHello() . PHP_EOL;
```

## Step 6: Run Example Script

In the terminal, run the example script:

```bash
php examples/usage.php
```

You should see the output: "Hello, World!"

## Step 7: Version Control

Initialize version control (e.g., Git) for your project:

```bash
git init
git add .
git commit -m "Initial commit"
```

## Step 8: Publish Locally

### Option 1: Use Local Composer Repository

1. Create a directory to act as your local repository:

   ```bash
   mkdir /path/to/local-repo
   ```

2. Use Composer to initialize a new repository:

   ```bash
   composer init --name=your-vendor/helloworld-package --require=your-vendor/helloworld-package
   ```

3. Build the package:

   ```bash
   composer build
   ```

4. Add your local repository to the `composer.json` of your other project:

   ```json
   {
       "repositories": [
           {
               "type": "path",
               "url": "/path/to/local-repo"
           }
       ],
       "require": {
           "your-vendor/helloworld-package": "*"
       }
   }
   ```

   Replace `/path/to/local-repo` with the actual path to your local repository.

### Option 2: Use Composer's `path` Repository Type

1. Add the following to the `composer.json` of your other project:

   ```json
   {
       "repositories": [
           {
               "type": "path",
               "url": "/path/to/helloworld-package"
           }
       ],
       "require": {
           "your-vendor/helloworld-package": "*"
       }
   }
   ```

   Replace `/path/to/helloworld-package` with the actual path to your `helloworld-package` directory.

2. Run `composer install` in your other project.

## Step 9: Publish to Packagist

1. Create a repository on GitHub and push your code:

   ```bash
   git remote add origin https://github.com/your-username/helloworld-package.git


   git push -u origin master
   ```

2. Go to [Packagist](https://packagist.org/), log in with your GitHub account, and click "Submit" to add your GitHub repository.

Now, others can install your package using Composer:

```bash
composer require your-vendor/helloworld-package
```

Congratulations! You've created a simple package, installed it locally, and published it for others to use.