# H5P Plugin for Laravel Framework

# Download Library File from here 
https://h5p.org/sites/default/files/h5p/exports/interactive-video-2-618.h5p

Require it in the Composer.

```bash
composer require hareom284/laravel-h5p
```

Publish the Views, Config and so things.

```bash
php artisan vendor:publish --provider="Hareom284\LaravelH5p\LaravelH5pServiceProvider"
```

Migrate the Database

```bash
php artisan migrate --package=vendor/hareom284/laravel-h5p
```

Add to Composer-Classmap:

```php
'classmap': [
    "vendor/h5p/h5p-core/h5p-default-storage.class.php",
    "vendor/h5p/h5p-core/h5p-development.class.php",
    "vendor/h5p/h5p-core/h5p-event-base.class.php",
    "vendor/h5p/h5p-core/h5p-file-storage.interface.php",
    "vendor/h5p/h5p-core/h5p.classes.php",
    "vendor/h5p/h5p-editor/h5peditor-ajax.class.php",
    "vendor/h5p/h5p-editor/h5peditor-ajax.interface.php",
    "vendor/h5p/h5p-editor/h5peditor-file.class.php",
    "vendor/h5p/h5p-editor/h5peditor-storage.interface.php",
    "vendor/h5p/h5p-editor/h5peditor.class.php"
],
```

```php
'providers' => [
    Hareom284\LaravelH5p\LaravelH5pServiceProvider::class,
];
```

Link files

```
cd public/assets/vendor/h5p
ln -s public/assets/vendor/h5p ../../../../storage/app/public/h5p/libraries
```

You probably will need to add it to your `app/Http/Middleware/VerifyCsrfToken.php` due to H5P ajax requests without Laravel CSRF token:

```php
protected $except = [
    //
    'admin/h5p/ajax',
    'admin/h5p/ajax/*'
];
```

## Credits
This package is forked from [Wells Escola LMS](https://github.com/EscolaSoft/Laravel-H5P) and modified some code. 
