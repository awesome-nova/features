## Laravel Nova Features
[![Latest Version on Github](https://img.shields.io/packagist/v/awesome-nova/features.svg?style=flat)](https://packagist.org/packages/awesome-nova/features)
[![Total Downloads](https://img.shields.io/packagist/dt/awesome-nova/features.svg?style=flat)](https://packagist.org/packages/awesome-nova/features)
[![Become a Patron!](https://img.shields.io/badge/become-a_patron!-red.svg?logo=patreon&style=flat)](https://www.patreon.com/bePatron?u=16285116)


1. [Installation](#user-content-installation)
2. [Usage](#user-content-usage)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require awesome-nova/features
```

## Usage

You need to create specified components for resource and specify replacement:

```php
class MyResource extends Resource {
    public static function additionalInformation(Request $request)
    {
        return [
            'components' => [
                'detail-header' => 'my-resource-detail-header',
                'detail-toolbar' => 'my-resource-detail-toolbar',
                'index-header' => 'my-resource-index-header',
                'index-toolbar' => 'my-resource-index-toolbar',
            ],
        ];
    }
}

```

This does not work if you replaced `custom-(detail|index)-(header|toolbar)` components.