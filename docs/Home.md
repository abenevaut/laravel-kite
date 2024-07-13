- host: https://github.com/abenevaut/laravel-kite

## Project

-

## Release

Make tag `laravel-kite-<semver>` to master to:
- trigger [...]


## How to install

```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/abenevaut/laravel-kite.git"
    }
],
```

`bootstrap/providers.php`

```php
<?php

return [

    // ..
    
    abenevaut\Kite\App\Providers\KiteServiceProvider::class,
    abenevaut\Kite\App\Providers\AuthServiceProvider::class,
    abenevaut\Kite\App\Providers\RouteServiceProvider::class,
];
```
